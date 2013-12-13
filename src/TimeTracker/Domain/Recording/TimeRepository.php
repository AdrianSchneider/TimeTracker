<?php

namespace TimeTracker\Domain\Recording;

interface TimeRepository
{
    function addTime(Project $project, \DateTime $start, \DateTime $end);

    function addRunningTimer(Project $project, \DateTime $startDate);

    /**
     * Gets the running timer for project
     *
     * @return \DateTime|null if not running
     */
    function getRunningTimer(Project $project);

    function logWorkEvent(Project $project, \DateTime $date);
}
