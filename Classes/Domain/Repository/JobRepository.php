<?php
namespace MRG\Workday\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;

class JobRepository extends Repository
{
    public function findByWorkdayId($workdayId)
    {
        $query = $this->createQuery();
        $query->matching($query->equals('workday_id', $workdayId));
        return $query->execute()->getFirst();
    }
}
