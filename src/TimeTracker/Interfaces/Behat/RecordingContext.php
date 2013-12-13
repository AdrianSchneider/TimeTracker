<?php

namespace TimeTracker\Interfaces\Behat;

use TimeTracker\Domain\Recording\Request\LogEntry;
use TimeTracker\Domain\Recording\Services\LogTime;
use TimeTracker\Domain\Recording\Project;
use Behat\Behat\Context\BehatContext;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

/**
 * Features context.
 */
class RecordingContext extends BehatContext
{
    protected $repository;

    /**
     * @beforeScenario
     */
    public function setup()
    {
        $this->repository = new ArrayTimeRepository();
    }

    /**
     * @When /^I log "([^"]*)" to "([^"]*)" for "([^"]*)"$/
     */
    public function iLogFor($start, $end, $projectName)
    {
        $service = new LogTime($this->repository);
        $service(new LogEntry(
            new Project($projectName, $projectName),
            new \DateTime($start),
            new \DateTime($end)
        ));
    }

    /**
     * @Then /^"([^"]*)" should have (\d+) hours"$/
     */
    public function shouldHaveHours($arg1, $arg2)
    {
        throw new PendingException();
    }
}
