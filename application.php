<?php 
    require_once "includes/functions.php";

    require_once "includes/dbh.php";
    require_once "includes/db-functions.php";
    
    include "includes/header.php";


    if(isset($_GET["application"])){
        $applicationId = $_GET["application"];

        if(!loadApplication($conn, $applicationId)){
            header("location:index.php");
            exit();
        }

        $application = loadApplication($conn, $applicationId);
        $courses = loadCourses($conn);
        $towns = loadTowns($conn);
        
        // print_r($application);
    }
?>

<header class="container-fluid bg-light border-bottom border-secondary p-4">
    <div class="row">
        <div class="col-10">
            <h1>View/Update Application</h1>
        </div>
        <div class="col-2">
            <form action="includes/deleteApplication-inc.php">
                <input type="hidden" id="deleteAppId" name="appId" value="<?php echo $application["id"]; ?>">
                <button type="submit" class="btn btn-danger w-100 p-2 fs-5">Delete Application</button>
            </form>
        </div>
    </div>
</header>

<div class="container mt-3">
    <form action="includes/updateApplication-inc.php" method="POST">
    <input type="hidden" id="updateAppId" name="appId" value="<?php echo $application["id"]; ?>">
        <!-- Main Form -->
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <!-- Personal Details -->
                <div class="border p-3 mb-3">
                    <h3>Personal Details</h3>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" 
                            id="username" name="username" required
                            value="<?php echo $application["username"]; ?>">
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
                        <input type="email" class="form-control" 
                        id="email" name="email" required
                        value="<?php echo $application["email"]; ?>">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" 
                        id="firstName" name="firstName" required
                        value="<?php echo $application["firstName"]; ?>">
                        <label for="firstName">First Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" 
                        id="lastName" name="lastName" required
                        value="<?php echo $application["lastName"]; ?>">
                        <label for="lastName">Last Name</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <!-- Residence -->
                <div class="border p-3 mb-3">
                    <h3>Residence</h3>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" 
                        id="address" name="address" required
                        value="<?php echo $application["address"]; ?>">
                        <label for="address">Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" 
                        id="street" name="street" required
                        value="<?php echo $application["street"]; ?>">
                        <label for="street">Street</label>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="town" name="town" required>
                            <option disabled selected>Select a Town</option>
                            <?php 
                                foreach($towns as $row):
                                    ?>
                                        <option 
                                            value="<?php echo $row["id"]; ?>"
                                            <?php if($row["id"]==$application["town"]){echo "selected";}?>>
                                            <?php echo $row["name"]; ?>
                                        </option>
                                    <?php
                                endforeach;
                            ?>
                        </select>
                    </div>
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
                                        <option value="<?php echo $row["id"]; ?>"
                                        <?php if($row["id"]==$application["course"]){echo "selected";}?>>
                                        <?php echo $row["title"]; ?>
                                    </option>
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
                <button type="submit" class="btn btn-primary w-100 p-2 fs-5">Update Application</button>
            </div>
            <div class="col-12">
                <button type="reset" class="btn btn-secondary w-100 p-2 fs-5">Reset Form</button>
            </div>
        </div>
    </form>
</div>







<?php include "includes/footer.php" ?>