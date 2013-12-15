<?php

namespace TimeTracker\Domain\Recording\Services;

use TimeTracker\Domain\Recording\Project;
use TimeTracker\Domain\Recording\Services\StartWork;

class StartWorkTest extends \PHPUnit_Framework_TestCase
{
    public function testAddsTimerToRepository()
    {
        $project = new Project('a', 'b');

        $repository = $this->getMock('TimeTracker\Domain\Recording\TimeRepository');
        $repository
            ->expects($this->once())
            ->method('getRunningTimer')
            ->with($project)
            ->will($this->returnValue(null))
        ;
        $repository
            ->expects($this->once())
            ->method('addRunningTimer')
            ->with($project, $this->callback(function($date) {
                return $date instanceof \DateTime;
            }))
        ;

        $service = new StartWork($repository);
        $date = $service($project);

        $this->assertInstanceOf('DateTime', $date);
    }

    public function testThrowsExceptionIfRunning()
    {
        $project = new Project('a', 'b');

        $repository = $this->getMock('TimeTracker\Domain\Recording\TimeRepository');
        $repository
            ->expects($this->once())
            ->method('getRunningTimer')
            ->with($project)
            ->will($this->returnValue(new \DateTime))
        ;

        $this->setExpectedException('TimeTracker\Domain\Recording\Exceptions\AlreadyRunningException');

        $service = new StartWork($repository);
        $service($project);
    }
}
