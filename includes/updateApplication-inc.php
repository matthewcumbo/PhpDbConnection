<?php

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

if(empty($_POST)){
    header("location: ../index.php");
    exit();
}
else{

    // print_r($_POST);
    // exit();
    $id = $_POST["appId"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confPassword = $_POST["confPassword"];
    $email = $_POST["email"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    
    $address = $_POST["address"];
    $street = $_POST["street"];
    $town = $_POST["town"];
    $course = $_POST["course"];

    // Validations would go here

    updateApplication($conn, $id, $username, $password, $email, $firstName, $lastName, $address, $street, $town, $course);
}
