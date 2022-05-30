<?php
// $sat = 0;
// $sun = Sun;
// $2 = Mon;
// $3 = Tue;
// $4 = Wed;
// $5 = Thu;
// $6 = Fri;


function getDayOfTheWeek($year, $month, $day){
    $dayOfWeekArray = array(0 => 'Saturday', 1 => 'Sunday', 2 => 'Monday', 3 => 'Tuesday', 4 => 'Wednesday', 5 => 'Thursday', 6 => 'Friday');
    $monthNumber = [1, 4, 4, 0, 2, 5, 0, 3, 6, 1, 4, 6];
    $yearNumber = $year % 100;
    $firstValue = intdiv($yearNumber, 12);
    $secondValue = $yearNumber % 12;
    $thirdValue = intdiv($secondValue, 4);
    $fifthValue = $monthNumber[$month - 1];
    $sumValue = $firstValue + $secondValue + $thirdValue + $day + $fifthValue;
    $offset = 0;
    $century = intdiv($year, 100);
    if (isLeapYear($year)) {
        if ($month == 1 || $month == 2) {
            $offset = -1;
        }
    }
    if ($century == 16 || $century == 20) {
        $offset += 6;
    } else if ($century == 17 || $century == 21) {
        $offset += 4;
    } else if ($century == 18) {
        $offset += 2;
    }
    $sumValue += $offset;
    $dayOfWeekIndex = $sumValue % 7;
    return $dayOfWeekArray[$dayOfWeekIndex];
}

function isLeapYear($year) {
    if ($year % 4 == 0) {
        return !($year % 100 == 0 && $year % 400 != 0);
    } else {
        return false;
    }
}

function makeCalendar() {
    $days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    $start = getDayOfTheWeek(2022, 1, 1);
    echo $start;
    $dayOfWeekValue = array_search($start, $daysOfWeek);
    for ($x = 1; $x <= 12; $x++) {
        for ($y = 1; $y <= $days[$x - 1]; $y++) {
            $dayOfWeek = $daysOfWeek[$dayOfWeekValue];
            $dayOfWeekValue = ($dayOfWeekValue + 1) % 7;
            echo "$x-$y-2022 is a $dayOfWeek\n";
        }
    }
}

makeCalendar();
?>
