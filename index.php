<?php 
$name = 'лев';
$firstname = 'сергеевич';
$lastname = 'маркосьян'; 

$fullname = mb_strtoupper(mb_substr($lastname, 0, 1)) . mb_substr($lastname, 1) . ' ' .
            mb_strtoupper(mb_substr($name, 0, 1)) . '.' . 
            mb_strtoupper(mb_substr($firstname, 0, 1)) . '.';

echo $fullname;

echo "\n";

echo 'Задача 2: ';
$year = 2021;
for ($month = 1; $month <= 12; $month++) {
    for ($day = 1; $day <= 20; $day++) {
        if (checkdate($month, $day, $year)) {
            $date = DateTime::createFromFormat('Y-m-d', "$year-$month-$day");
            $dayOfWeek = $date->format('N');
            if ($dayOfWeek == 6) {
                $saturdays[] = $date->format('d.m.Y');
            }
        }
    }
}

foreach ($saturdays as $saturday) {
    echo $saturday . "\n";
}
?>
