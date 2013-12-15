<?php

namespace TimeTracker\Domain\Recording\Services;

use TimeTracker\Domain\Recording\Project;
use TimeTracker\Domain\Recording\TimeRepository;
use TimeTracker\Domain\Recording\Exceptions\AlreadyRunningException;

class StartWork
{
    protected $repository;

    public function __construct(TimeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Starts a new [sadfasdf]
     *
     * @param Project $project
     * @return DateTime
     * @throws AlreadyRunningException when timer is already started
     */
    public function __invoke(Project $project)
    {
        if ($this->repository->getRunningTimer($project)) {
            throw new AlreadyRunningException();
        }

        $this->repository->addRunningTimer($project, $date = new \DateTime);
        return $date;
    }
}
