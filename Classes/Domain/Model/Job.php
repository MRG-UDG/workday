<?php
namespace MRG\Workday\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Job extends AbstractEntity
{
    protected string $title = '';
    protected string $description = '';
    protected string $location = '';
    protected string $salary = '';
    protected string $jobType = '';
    protected string $workdayId = '';
    protected string $applicationLink = '';

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getSalary(): string
    {
        return $this->salary;
    }

    public function setSalary(string $salary): void
    {
        $this->salary = $salary;
    }

    public function getJobType(): string
    {
        return $this->jobType;
    }

    public function setJobType(string $jobType): void
    {
        $this->jobType = $jobType;
    }

    public function getWorkdayId(): string
    {
        return $this->workdayId;
    }

    public function setWorkdayId(string $workdayId): void
    {
        $this->workdayId = $workdayId;
    }

    public function getApplicationLink(): string
    {
        return $this->applicationLink;
    }

    public function setApplicationLink(string $applicationLink): void
    {
        $this->applicationLink = $applicationLink;
    }
}
