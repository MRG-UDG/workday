<?php
namespace MRG\Workday\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;

class JobRepository extends Repository
{
    public function findByWorkdayId(string $workdayId)
    {
        $query = $this->createQuery();
        return $query->matching(
            $query->equals('workdayId', $workdayId)
        )->execute()->getFirst();
    }
}
