<?php

namespace TimeTracker\Domain\Recording\Request;

use TimeTracker\Domain\Recording\Project;

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


    public function getProject()
    {
        return $this->project;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }
}
