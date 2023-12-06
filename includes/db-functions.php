<?php 

function loadTowns($conn){
    $sql = "SELECT * FROM Town;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Towns";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function loadRegions($conn){
    $sql = "SELECT * FROM Region;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Regions";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function loadCourses($conn){
    $sql = "SELECT * FROM Course;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Course Levels";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function createApplication($conn, $username, $password, $email, $firstName, $lastName,$address, $street, $town, $course)
{
    $sql = "INSERT INTO application
        (username, password, email, firstName, lastName, address, 
        street, town, course, applicationDate)
        VALUES(?,?,?,?,?,?,?,?,?,?);";


    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    // Automated application date - user does not insert this
    $applicationDate = date("Y-m-d");
    
    // Hashed Password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssssss", $username, $hashedPassword, $email, $firstName, $lastName,$address, $street, $town, $course,$applicationDate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // redirect back to sign up page once registration is complete
    header("location: ../index.php?success=true");
}

function loadCourseLevels($conn){
    $sql = "SELECT * FROM CourseLevel;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Course Levels";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function loadCoursesByLevel($conn, $level){
    $sql = "SELECT * FROM Course WHERE Level = {$level};";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Course Levels";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function loadCourseById($conn, $id){
    $sql = "SELECT * FROM Course WHERE id = {$id};";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Course Levels";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result->fetch_assoc();
}