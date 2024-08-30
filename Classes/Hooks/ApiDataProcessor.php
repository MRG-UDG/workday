<?php
namespace MRG\Workday\Hooks;

use TYPO3\CMS\Core\SingletonInterface;

class ApiDataProcessor implements SingletonInterface
{
    /**
     * Process the API data
     *
     * @param array $params Parameters passed to the hook
     * @param object $obj Reference to the calling object
     * @return void
     */
    public function process(array $params, $obj): void
    {
        // Hier können Sie die API-Daten verarbeiten
        if (isset($params['apiData'])) {
            $apiData = $params['apiData'];

            // Beispiel: Fügen Sie zusätzliche Informationen hinzu
            foreach ($apiData as &$job) {
                $job['processed'] = true;
                $job['processedTimestamp'] = time();
            }

            // Aktualisierte Daten zurück in die Parameter schreiben
            $params['apiData'] = $apiData;
        }

        // Logging (optional)
        $this->log('API data processed', $params);
    }

    /**
     * Log messages for debugging
     *
     * @param string $message
     * @param array $data
     */
    protected function log(string $message, array $data = []): void
    {
        // Implementieren Sie hier Ihre Logging-Logik
        // Beispiel:
        // \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Log\LogManager::class)
        //     ->getLogger(__CLASS__)
        //     ->info($message, $data);
    }
}
