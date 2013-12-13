<?php

namespace TimeTracker\Domain\Recording;

interface TimeRepository
{
    function addTime(Project $project, \DateTime $start, \DateTime $end = null);
}
