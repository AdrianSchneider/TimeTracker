<?php

use Behat\Behat\Context\BehatContext;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use TimeTracker\Interfaces\Behat\ReportingContext;
use TimeTracker\Interfaces\Behat\RecordingContext;

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    public function __construct(array $parameters)
    {
        $this->useContext('reporting', new ReportingContext());
        $this->useContext('recording', new RecordingContext());
    }
}
