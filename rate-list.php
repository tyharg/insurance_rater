<?php
/*
rater-list.php: Calculates insurance quotes for values 10 -> 1000 (Multiples of 10).

Author: Tyler Hargreaves
Updated on: 12/13/19
*/

    include 'rater.php';
    $rater = new Rater; 
    for($i = 10; $i <= 1000; $i += 10){
        $val = $rater->rate($i);
        echo($i . " -> " . $val . "\n");
    }
?>