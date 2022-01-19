<?php

    for($i = 0; $i <= 10; $i++){
        get_http_code("https://www.google.com/");
        get_http_code("https://edition.cnn.com/");
        get_http_code("https://intl.startrek.com/");
    }

    function get_http_code($url) {
        $options = array(
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_AUTOREFERER    => true,
            CURLOPT_CONNECTTIMEOUT => 120,
            CURLOPT_TIMEOUT        => 120,
            CURLOPT_MAXREDIRS      => 10,
        );

        $handle = curl_init();

        curl_setopt_array($handle, $options);
        $response = curl_exec($handle);
        $http_code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        curl_close($handle);

        $http_code_stat = intval($http_code) == 200 ? "NEW" : "DONE";

        $result = db_action($url, $http_code_stat, $http_code);

        echo  $result;
    }
    

    function db_action($url, $url_stat, $url_repsond){
        $result = "";
        $link = mysqli_connect("localhost", "root", "", "worker");

        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $url = mysqli_real_escape_string($link, $url);
        $url_stat = mysqli_real_escape_string($link, $url_stat);
        $url_repsond = mysqli_real_escape_string($link, $url_repsond);
        
        $query = "UPDATE url_tbl SET `status` = ?, response = ? WHERE `url` = ?";

        if($stmt = mysqli_prepare($link, $query)){
            
            mysqli_stmt_bind_param($stmt, "sss", $url_stat, $url_repsond, $url);

            mysqli_stmt_execute($stmt);

            $result = $url . " was successfully updated <br/>";
        } 
        else {
            $result = $url . " could not be updated <br/>";
        }
    
        // Close connection
        mysqli_close($link);

        return $result;
    }
