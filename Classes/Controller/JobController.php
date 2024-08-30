<?php
namespace MRG\Workday\Controller;

use MRG\Workday\Domain\Repository\JobRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Psr\Http\Message\ResponseInterface;

class JobController extends ActionController
{
    protected JobRepository $jobRepository;

    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function listAction(): ResponseInterface
    {
        $jobs = $this->jobRepository->findAll();
        $this->view->assign('jobs', $jobs);
        return $this->htmlResponse();
    }

    public function showAction(int $job = null): ResponseInterface
    {
        if ($job === null) {
            return $this->redirect('list');
        }

        $job = $this->jobRepository->findByUid($job);
        if ($job === null) {
            return $this->redirect('list');
        }

        $this->view->assign('job', $job);
        return $this->htmlResponse();
    }
}
