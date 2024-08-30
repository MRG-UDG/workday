<?php
defined('TYPO3') or die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'MrgWorkday',
        'JobListing',
        [
            \MRG\Workday\Controller\JobController::class => 'list, show'
        ],
        // non-cacheable actions
        [
            \MRG\Workday\Controller\JobController::class => ''
        ]
    );

    // Register ImportJobsTask
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\MRG\Workday\Task\ImportJobsTask::class] = [
        'extension' => 'mrg_workday',
        'title' => 'LLL:EXT:mrg_workday/Resources/Private/Language/locallang.xlf:importJobsTask.name',
        'description' => 'LLL:EXT:mrg_workday/Resources/Private/Language/locallang.xlf:importJobsTask.description',
        'additionalFields' => ''
    ];
})();
