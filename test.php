<?php

    function make_call($name, $amt){
        $url = 'http://54.85.9.190/insurance_rater/rater-api.php';
        $data = array('name' => $name, 'amt' => $amt);

        $options = array(
            'http' => array(
                'method'  => 'POST',
                'content' => json_encode($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) { 
            echo("Failed to connect to server.");
            die();
        }

        return json_decode($result);
    }

    $fail_count = 0;

    $result = make_call("Name", 0);
    if($result->error == "None"){
        echo("Failed on value 0, expected error, got $result->error .");
        $fail_count += 1;
    }

    $result = make_call("Name", 1);
    if($result->quote != .23){
        echo("Failed on value 1, expected .23, got $result->quote");
        $fail_count += 1;
    }

    $result = make_call("Name", 500);
    if($result->quote != 175){
        echo("Failed on value 1, expected 175, got $result->quote");
        $fail_count += 1;
    }

    echo("Failed on $fail_count tests. \n")

?>