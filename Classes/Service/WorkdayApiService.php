<?php
namespace MRG\Workday\Service;

use TYPO3\CMS\Core\Http\RequestFactory;

class WorkdayApiService
{
    protected RequestFactory $requestFactory;

    public function __construct(RequestFactory $requestFactory)
    {
        $this->requestFactory = $requestFactory;
    }

    public function fetchJobs(): array
    {
        // Implement the API call to Workday here
        // This is a placeholder implementation
        $apiUrl = 'https://api.workday.com/jobs';  // Replace with actual Workday API endpoint
        $response = $this->requestFactory->request($apiUrl, 'GET', [
            'headers' => [
                'Authorization' => 'Bearer YOUR_API_TOKEN',
                'Accept' => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody()->getContents(), true);
        }

        return [];
    }
}
