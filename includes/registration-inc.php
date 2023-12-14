<?php 

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

if(empty($_POST)){
    header("location: ../index.php");
    exit();
}
else{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confPassword = $_POST["confPassword"];
    $email = $_POST["email"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    
    $address = $_POST["address"];
    $street = $_POST["street"];
    $town = $_POST["town"];
    // $region = $_POST["region"];

    $course = $_POST["course"];
    
    
    // Validations
    $passwordsMatch = passwordsMatch($password, $confPassword);
    if (!$passwordsMatch)
    {
        header("location:../index.php?error=passwordsDoNotMatch");
        exit();
    }

    $invalidUsername = invalidUsername($username);
    if ($invalidUsername){
        header("location:../index.php?error=invalidUsername");
        exit();
    }

    $emptyInputs = emptyInputs([$username, $password, $confPassword, $email, $firstName,$lastName, $address, $street, $town, $course]);
    if ($emptyInputs){
        header("location:../index.php?error=emptyInputs");
        exit();
    }

    $invalidEmail = invalidEmail($email);
    if($invalidEmail){
        header("location:../index.php?error=invalidEmail");
        exit();
    }

    createApplication($conn, $username, $password, $email, $firstName, $lastName,$address, $street, $town, $course);
}