<?php

namespace TimeTracker\Domain\Recording\Services;

use TimeTracker\Domain\Recording\TimeRepository;

class CurrentlyWorking
{
    protected $repository;

    public function __construct(TimeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Project $project)
    {
        $this->repository->logWorkEvent($project, new DateTime);
    }
}
