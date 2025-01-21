<?php

/**
 * The actual times for our calendar view
 *
 * @return string[]
 */
function getRosterTimes(): array
{
    return ['11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00'];
}

/**
 * Retrieve the weekdays based on the given timestamp
 *
 * @param int $timestamp
 * @return array
 */
function getWeekDays(int $timestamp): array
{
    //Resolve back to the monday of the week
    $start = date('w', $timestamp) == 1 ? $timestamp : strtotime('last monday', $timestamp);
    $startDate = date('Y-m-d', $start);

    //Loop till 7 to build the days of the week
    $dates = [];
    for ($i = 0; $i < 7; $i++) {
        $dayTimestamp = strtotime($startDate . "+$i days");
        //Build array keys that are relevant to use when someone calls this function
        $dates[] = [
            'timestamp' => $dayTimestamp,
            'fullDate' => date('Y-m-d', $dayTimestamp),
            'day' => date('D', $dayTimestamp),
            'dayNumber' => date('d', $dayTimestamp),
            'current' => date('d', $dayTimestamp) === date('d')
        ];
    }
    return $dates;
}

/**
 * Format the event, so we can use it in our calendar view
 *
 * @param array $reservation
 * @return array
 */
function formatEvent(array $reservation): array
{
    //To compare times, we need the exact same values without the trailing :00 seconds
    $reservation['start_time'] = substr($reservation['start_time'], 0, -3);
    $reservation['end_time'] = substr($reservation['end_time'], 0, -3);

    //Add the day of the week (translated from the default weird start on Sunday)
    $dayNumber = (int)date('w', strtotime($reservation['date']));
    $reservation['day_number'] = $dayNumber === 0 ? 7 : $dayNumber;

    //Get the times and translate the event times to the rows in the grid
    $rosterItems = getRosterTimes();
    $reservation['row_start'] = array_search($reservation['start_time'], $rosterItems) + 2;
    $reservation['row_span'] = array_search($reservation['end_time'], $rosterItems) + 2 - $reservation['row_start'];

    return $reservation;
}

/**
 * Query the database & return events
 *
 * @param string $from
 * @param string $to
 * @return array
 */
function getEvents(string $from, string $to): array
{
    /** @var mysqli $db */
    require_once "connection/connection.php";

    //Get the result set from the database with an SQL query
    $query = "SELECT * FROM reservations WHERE date >= '$from' AND date <= '$to'";
    $result = mysqli_query($db, $query);

    //Loop through the result to create a custom array of events
    $reservations = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $reservations[] = formatEvent($row);
    }

    //Close connection
    mysqli_close($db);

    return $reservations;
}

/**
 * To prevent too much clutter of PHP-in-CSS within index.php, we'll use this function
 * This creates classes that are later used in the actual HTML
 *
 * @param array $rosterTimes
 * @param array $reservations
 * @return string
 */
function getDynamicCSS(array $rosterTimes, array $reservations): string
{
    //First make sure grid & rows are set for the total timeslots we have
    $totalRosterTimes = count($rosterTimes);
    $css = <<<CSS
        .content {
            grid-template-rows: repeat({$totalRosterTimes}, 2em);
        }

        .col {
            grid-row: 1 / span {$totalRosterTimes};
        }
CSS;

    //Create the actual row-styling based on total items we have
    foreach ($rosterTimes as $index => $rosterTime) {
        $rowNumber = $index + 1;
        $css .= <<<CSS
            .row-roster-{$rowNumber} {
                grid-row: {$rowNumber};
            }
CSS;
    }

    //Create the styling for every event to give it a unique position in the grid
    foreach ($reservations as $reservation) {
        $dayNumber = $reservation['day_number'] + 2;
        $css .= <<<CSS
            .event-item-{$reservation['id']} {
                grid-column: {$dayNumber};
                grid-row: {$reservation['row_start']} / span {$reservation['row_span']};
            }
CSS;
    }

    return $css;
}