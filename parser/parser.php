<?php


    $lines = file("config.txt");
    
    $config_arr = $result_arr = array();
        
    foreach($lines as $line) {
        if(empty(trim($line))) continue;//remove empty lines

        $result = create_assoc_array($config_arr, $line);

        if(!empty($result)){
            $result_arr[] = $result;
        }
    }

    function create_assoc_array($config_array, $line){
        if(strpos(trim($line), "=") !== false){//check line has = sign
            $brk_string = explode("=", $line);

            if(strpos(trim($brk_string[0]), ".") !== false){//check if line has .
                list($first_part, $rest_part) = array_map("trim", explode(".", $line, 2));// break line into two part
    
                // Check the array key exists in config_array
                if(!array_key_exists($first_part, $config_array)) {
                    //$config_array[$first_part] = array();
                    $config_array[$first_part] = create_assoc_array($config_array, $rest_part);//rerun
                }
            
                //Check if the rest_part is already in the array
                if(in_array($rest_part, $config_array[$first_part])) {
                    return null;
                }

                //$config_array[$first_part][] = create_assoc_array($config_array, $rest_part);//rerun
            }
            else{
                list($first_part, $rest_part) = array_map("trim", explode("=", $line, 2));// break line into two part
    
                // Check the array key exists in config_array
                if(!array_key_exists($first_part, $config_array)) {
                    $config_array[$first_part] = array();
                }
            
                //Check if the rest_part is already in the array
                if(in_array($rest_part, $config_array[$first_part])) {
                    return null;
                }

                // Add the rest_part to it
                $config_array[$first_part][] = $rest_part;
            }
        }
        else{
            return null;
        }

        return $config_array;
    }
    echo"<pre>";
    print_r($result_arr);
    echo"</pre>";
