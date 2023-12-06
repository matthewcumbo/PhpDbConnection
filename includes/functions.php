<?php 

function passwordsMatch($password, $confPassword){

    $result = false;
    if($password == $confPassword){
        $result = true;
    }
    return $result; 
}

function emptyInputs($inputs){
    foreach($inputs as $input){
        if(empty($input)){
            return true;
        }
    }
}

function invalidEmail($email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    else{
        return false;
    }
}

function invalidUsername($username){
    $result = false;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }

    return $result;
}