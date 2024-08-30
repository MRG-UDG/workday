<?php
defined('TYPO3') or die();

(function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Workday',
        'JobList',
        [
            \MRG\Workday\Controller\JobController::class => 'list, show'
        ],
        // non-cacheable actions
        [
            \MRG\Workday\Controller\JobController::class => 'list, show'
        ]
    );

    // Register custom content elements
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '@import "EXT:workday/Configuration/TsConfig/Page/Mod/Wizards/NewContentElement.tsconfig"'
    );

    // Register cache for API responses
    if (!is_array($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['workday_apicache'] ?? null)) {
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['workday_apicache'] = [
            'frontend' => \TYPO3\CMS\Core\Cache\Frontend\VariableFrontend::class,
            'backend' => \TYPO3\CMS\Core\Cache\Backend\FileBackend::class,
            'options' => [
                'defaultLifetime' => 3600 // 1 hour
            ],
        ];
    }

    // Register custom logger
    $GLOBALS['TYPO3_CONF_VARS']['LOG']['MRG']['Workday']['writerConfiguration'] = [
        \TYPO3\CMS\Core\Log\LogLevel::DEBUG => [
            \TYPO3\CMS\Core\Log\Writer\FileWriter::class => [
                'logFile' => 'typo3temp/logs/workday.log'
            ]
        ]
    ];

    // Register hook for additional processing
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/workday']['processApiData'][] =
        \MRG\Workday\Hooks\ApiDataProcessor::class . '->process';
})();
