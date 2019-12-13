<?php
    include 'rater.php';
    $rater = new Rater; 

    $raw_data = utf8_encode(file_get_contents('php://input'));
    $data = json_decode($raw_data, true);
    
    $amt = $data["amt"];
    $name = $data["name"];
    $quote = $rater->rate($amt);

    $error = "None";
    if(!is_numeric($quote)){
        if($quote == "ERROR_INVALID"){
            $error = "Please check your insurance amount and try again.";
        }
        else if($quote == "ERROR_AMOUNT"){
            $error = "Please make sure your insurance amount is between 1 and 1000.";
        }
        else{
            $error = "An unknown error occured.";
        }
    }

    $output = [
        "name" => $name,
        "quote" => $quote,
        "error" => $error

    ];

    echo(json_encode($output));

?>