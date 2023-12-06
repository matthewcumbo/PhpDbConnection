<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
<?php 
    require_once "includes/functions.php";

    require_once "includes/dbh.php";
    require_once "includes/db-functions.php";
    

    $courseLevels = loadCourseLevels($conn);
    $courses = loadCourses($conn);
    // $regions = loadRegions($conn);
    $towns = loadTowns($conn);
?>

<header class="container-fluid bg-light border-bottom border-secondary p-4">
    <div class="row">
        <div class="col-12">
            <h1>Course Registration</h1>
        </div>
    </div>
</header>

<div class="container mt-3">
    <form action="includes/registration-inc.php" method="POST">
        <!-- Main Form -->
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <!-- Personal Details -->
                <div class="border p-3 mb-3">
                    <h3>Personal Details</h3>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="username" name="username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="confPassword" name="confPassword" required>
                        <label for="confPassword">Confirm Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="firstName" name="firstName" required>
                        <label for="firstName">First Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="lastName" name="lastName" required>
                        <label for="lastName">Last Name</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <!-- Residence -->
                <div class="border p-3 mb-3">
                    <h3>Residence</h3>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="address" name="address" required>
                        <label for="address">Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="street" name="street" required>
                        <label for="street">Street</label>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="town" name="town" required>
                            <option disabled selected>Select a Town</option>
                            <?php 
                                foreach($towns as $row):
                                    ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                                    <?php
                                endforeach;
                            ?>
                        </select>
                    </div>
                    <!-- <div class="mb-3">
                        <select class="form-select" id="region" name="region" required>
                            <option disabled selected>Select a Region</option>
                            <?php 
                                foreach($regions as $row):
                                    ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                                    <?php
                                endforeach;
                            ?>
                        </select>
                    </div> -->
                </div>
                <!-- Course Selection -->
                <div class="border p-3 mb-3">
                    <h3>Course Selection</h3>
                    <div class="mb-3">
                        <select class="form-select" id="course" name="course" required>
                            <option disabled selected>Select a Course</option>
                            <?php 
                                foreach($courses as $row):
                                    ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?></option>
                                    <?php
                                endforeach;
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Buttons -->
        <div class="row">
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-success w-100 p-2 fs-5">Submit Application</button>
            </div>
            <div class="col-12">
                <button type="reset" class="btn btn-danger w-100 p-2 fs-5">Reset Form</button>
            </div>
        </div>
    </form>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-3"></div>
        <?php if (isset($_GET["error"])): ?>
            <div class="col-6 text-center border border-danger-subtle bg-danger-subtle text-danger p-2">
            <?php
                $error = $_GET["error"];
                if ($error == "emptyInputs") {
                    echo "Please fill in all fields.";
                }
                elseif ($error == "invalidUsername"){
                    echo "Please choose a proper username.";
                }
                elseif ($error == "invalidEmail"){
                    echo "Please choose a proper email.";
                }
                elseif ($error == "passwordsDoNotMatch"){
                    echo "Passwords do not match.";
                }
                elseif ($error == "usernameTaken"){
                    echo "Username already in use.";
                }
                elseif ($error == "stmtfailed"){
                    echo "Something went wrong, please try again.";
                }

                echo "</div>";
            endif;

            if(isset($_GET["success"])){
                if($_GET["success"] == true){
                    ?> 
                        <div class="col-6 text-center border border-success-subtle bg-success-subtle text-success p-2">
                            Application Registration completed successfully.
                        </div>
                    <?php
                }
            }
        ?>
        
        <div class="col-3"></div>
    </div>
</div>

<footer class="container-fluid bg-light border-top border-secondary p-4 fixed-bottom">
    <div class="row">
        <div class="col-12">
            <h4>&copy; Matt | MCAST - Course Registration Page</h4>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>