<?php
namespace MRG\Workday\Controller;

use MRG\Workday\Service\WorkdayService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class JobController extends ActionController
{
    /**
     * @var WorkdayService
     */
    protected $workdayService;

    /**
     * Inject the Workday service
     *
     * @param WorkdayService $workdayService
     */
    public function injectWorkdayService(WorkdayService $workdayService)
    {
        $this->workdayService = $workdayService;
    }

    /**
     * List action
     *
     * @return ResponseInterface
     */
    public function listAction(): ResponseInterface
    {
        try {
            $jobs = $this->workdayService->getJobs();

            // Process data with hook
            $this->processApiDataWithHook($jobs);

            $this->view->assign('jobs', $jobs);
        } catch (\Exception $e) {
            $this->addFlashMessage(
                'Error fetching jobs: ' . $e->getMessage(),
                'Error',
                \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR
            );
        }

        return $this->htmlResponse();
    }

    /**
     * Show action
     *
     * @param string $jobId
     * @return ResponseInterface
     */
    public function showAction(string $jobId): ResponseInterface
    {
        try {
            $job = $this->workdayService->getJobDetails($jobId);

            // Process data with hook
            $this->processApiDataWithHook([$job]);

            $this->view->assign('job', $job);
        } catch (\Exception $e) {
            $this->addFlashMessage(
                'Error fetching job details: ' . $e->getMessage(),
                'Error',
                \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR
            );
        }

        return $this->htmlResponse();
    }

    /**
     * Process API data with registered hooks
     *
     * @param array $apiData
     */
    protected function processApiDataWithHook(array &$apiData): void
    {
        if (isset($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/workday']['processApiData'])
            && is_array($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/workday']['processApiData'])
        ) {
            foreach ($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/workday']['processApiData'] as $className) {
                $hookObject = GeneralUtility::makeInstance($className);
                if (method_exists($hookObject, 'process')) {
                    $params = ['apiData' => $apiData];
                    $hookObject->process($params, $this);
                    $apiData = $params['apiData'];
                }
            }
        }
    }
}
