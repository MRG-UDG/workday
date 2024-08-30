<?php
namespace MRG\Workday\Service;

use TYPO3\CMS\Core\Http\RequestFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;

class WorkdayService
{
    /**
     * @var RequestFactory
     */
    protected $requestFactory;

    /**
     * @var array
     */
    protected $configuration;

    /**
     * @var \TYPO3\CMS\Core\Cache\Frontend\FrontendInterface
     */
    protected $cache;

    public function __construct(RequestFactory $requestFactory, ExtensionConfiguration $extensionConfiguration)
    {
        $this->requestFactory = $requestFactory;
        $this->configuration = $extensionConfiguration->get('workday');
        $this->cache = GeneralUtility::makeInstance(CacheManager::class)->getCache('workday_apicache');
    }

    public function syncJobs(array $workdayJobs)
    {
        foreach ($workdayJobs as $workdayJob) {
            $existingJob = $this->jobRepository->findByWorkdayId($workdayJob['id']);

            if ($existingJob) {
                // Update existing job
                $existingJob->setTitle($workdayJob['title']);
                $existingJob->setDescription($workdayJob['description']);
                // ... update other fields ...
                $this->jobRepository->update($existingJob);
            } else {
                // Create new job
                $newJob = new Job();
                $newJob->setWorkdayId($workdayJob['id']);
                $newJob->setTitle($workdayJob['title']);
                $newJob->setDescription($workdayJob['description']);
                // ... set other fields ...
                $this->jobRepository->add($newJob);
            }
        }

        $this->persistenceManager->persistAll();
    }

    /**
     * Get all jobs from Workday API
     *
     * @return array
     * @throws \Exception
     */
    public function getJobs(): array
    {
        $cacheIdentifier = 'workday_jobs';
        $cachedData = $this->cache->get($cacheIdentifier);

        if ($cachedData) {
            return $cachedData;
        }

        $url = $this->configuration['apiUrl'] . '/jobs';
        $response = $this->makeApiRequest($url);

        $jobs = json_decode($response->getBody()->getContents(), true);

        // Cache the result
        $this->cache->set($cacheIdentifier, $jobs, [], 3600); // Cache for 1 hour

        return $jobs;
    }

    /**
     * Get job details from Workday API
     *
     * @param string $jobId
     * @return array
     * @throws \Exception
     */
    public function getJobDetails(string $jobId): array
    {
        $cacheIdentifier = 'workday_job_' . $jobId;
        $cachedData = $this->cache->get($cacheIdentifier);

        if ($cachedData) {
            return $cachedData;
        }

        $url = $this->configuration['apiUrl'] . '/jobs/' . $jobId;
        $response = $this->makeApiRequest($url);

        $jobDetails = json_decode($response->getBody()->getContents(), true);

        // Cache the result
        $this->cache->set($cacheIdentifier, $jobDetails, [], 3600); // Cache for 1 hour

        return $jobDetails;
    }

    /**
     * Make an API request to Workday
     *
     * @param string $url
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    protected function makeApiRequest(string $url): \Psr\Http\Message\ResponseInterface
    {
        $options = [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->configuration['apiToken'],
                'Accept' => 'application/json',
            ],
        ];

        try {
            $response = $this->requestFactory->request($url, 'GET', $options);

            if ($response->getStatusCode() >= 300) {
                throw new \Exception('API request failed with status code: ' . $response->getStatusCode());
            }

            return $response;
        } catch (\Exception $e) {
            // Log the error
            $this->logError('API request failed: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Log an error message
     *
     * @param string $message
     */
    protected function logError(string $message): void
    {
        $logger = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Log\LogManager::class)->getLogger(__CLASS__);
        $logger->error($message);
    }
}
