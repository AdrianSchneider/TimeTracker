<?php

namespace TimeTracker\Domain\Recording\Services;

use TimeTracker\Domain\Recording\Request\LogEntry;
use TimeTracker\Domain\Recording\TimeRepository;

class LogTime
{
    protected $repository;

    public function __construct(TimeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(LogEntry $entry)
    {
        $this->repository->addTime(
            $entry->getProject(),
            $entry->getStart(),
            $entry->getEnd()
        );
    }
}
