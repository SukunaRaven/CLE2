<?php

function filterTime($date, $db)
{
    $query = "SELECT * FROM reservations WHERE selected_date = '$date'";
    $result = mysqli_query($db, $query);
    if ($result) {
        $reservations = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $reservations[] = $row;
        }
    }

    $times = [];
    $month = date('n', strtotime($date));

    if ($month >= 5 && $month <= 9) {
        $time = strtotime('12:00');
    } else {
        $time = strtotime('15:00');
    }

    $last_time_to_reserve = '20:00';

    $query = "SELECT * FROM closed_days WHERE date_to_close = '$date'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        $dayDate = mysqli_fetch_assoc($result);
        if ($dayDate['closed_day_parts'] == 1) {
            $time = strtotime('17:00');
        }
        if ($dayDate['closed_day_parts'] == 2) {
            $last_time_to_reserve = '16:30';
        }
    }


    $end_time = $time + (4 * 60 * 60);
    $timeToAdd = 30;

    while ($time <= strtotime($last_time_to_reserve)) {
        $times[] = date('H:i', $time);

        $time = $time + $timeToAdd * 60;
    }

    $availableTimes = [];

    foreach ($times as $time) {
        $time = strtotime($time);
        $occurs = false;
        $reservation_counter = 1;

        foreach ($reservations as $reservation) {
            $startTime = strtotime($reservation['selected_time']);
            $endTime = strtotime($reservation['selected_time']) + (4 * 60 * 60);

            if ($time >= $startTime && $time <= $endTime) {
                $occurs = true;
                $reservation_counter++;
            }

        }
        if (!$occurs || $reservation_counter <= 4) {
            $availableTimes[] = date('H:i', $time);
        }
    }

    return $availableTimes;
}