<?php

namespace TimeTracker\Domain\Recording\Services;

class StopWork
{
    /**
     * Completes a log entry currently running
     *
     * @param Project
     * @return LogEntry
     * @throws NoActiveProjectException when not active
     */
    public function __invoke(Project $project)
    {
        if (!$runningEntry = $this->repository->fetchActiveFor($project)) {
            throw new NoActiveProjectException();
        }

        // clean

        $this->repository->addTime(
            $project,
            $runningEntry->getStart(),
            new \DateTime
        );
    }
}
