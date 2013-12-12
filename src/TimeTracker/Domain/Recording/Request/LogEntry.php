<?php

namespace TimeTracker\Domain\Recording\Request;

class LogEntry
{
    protected $project;
    protected $start;
    protected $end;

    public function __construct(Project $project, \DateTime $start, \DateTime $end)
    {
        $this->project = $project;
        $this->start = $start;
        $this->end = $end;
    }
}
