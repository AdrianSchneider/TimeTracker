Feature: Log Time
  Scenario: Log Time
    When I log "2012-01-01 00:00" to "2012-01-01 04:00:00" for "Project X"
    Then "Project X" should have 5 hours"
