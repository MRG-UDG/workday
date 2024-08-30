<?php
defined('TYPO3') or die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'MrgWorkday',
        'JobListing',
        'Job Listing'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
        'tx_mrgworkday_domain_model_job',
        'EXT:workday/Resources/Private/Language/locallang_csh_tx_mrgworkday_domain_model_job.xlf'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_mrgworkday_domain_model_job');
})();
