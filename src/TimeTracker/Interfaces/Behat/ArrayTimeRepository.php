<?php

namespace TimeTracker\Interfaces\Behat;

use TimeTracker\Domain\Recording\Project;
use TimeTracker\Domain\Recording\TimeRepository;

class ArrayTimeRepository implements TimeRepository
{
    public function __construct()
    {
        $this->logEntries = array();
    }

    function addTime(Project $project, \DateTime $start, \DateTime $end)
    {
        $this->logEntries[] = array(
            'project' => $project->getId(),
            'start' => $start,
            'end' => $end
        );
    }
}
