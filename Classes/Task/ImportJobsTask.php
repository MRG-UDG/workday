<?php
namespace MRG\Workday\Task;

use MRG\Workday\Service\WorkdayApiService;
use MRG\Workday\Domain\Repository\JobRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Scheduler\Task\AbstractTask;

class ImportJobsTask extends AbstractTask
{
    public function execute()
    {
        $apiService = GeneralUtility::makeInstance(WorkdayApiService::class);
        $jobRepository = GeneralUtility::makeInstance(JobRepository::class);

        $jobs = $apiService->fetchJobs();

        foreach ($jobs as $jobData) {
            $existingJob = $jobRepository->findByWorkdayId($jobData['id']);
            if ($existingJob) {
                // Update existing job
                // ...
            } else {
                // Create new job
                // ...
            }
        }

        // Delete jobs that are no longer in the API
        // ...

        // Clear cache for pages displaying job data
        // ...

        return true;
    }
}
