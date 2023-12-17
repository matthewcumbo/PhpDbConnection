<?php 
    require_once "includes/functions.php";

    require_once "includes/dbh.php";
    require_once "includes/db-functions.php";
    
    include "includes/header.php";


    $applications = loadAllApplications($conn);
    // print_r($applications);

    session_start();
    if(!isset($_SESSION["username"])){
        header("location:login.php");
        exit();
    }
?>

<header class="container-fluid bg-light border-bottom border-secondary p-4">
    <div class="row">
        <div class="col-10">
            <h1>Application List</h1>
        </div>
        <div class="col-2">
            <form action="includes/logout-inc.php">
                <button type="submit" class="btn btn-danger w-100 p-2 fs-5">Logout</button>
            </form>
        </div>
    </div>
</header>


<div class="container mt-3">
    <div class="row">
        <?php 
            foreach($applications as $app):
                ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $app["firstName"]." ".$app["lastName"]; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $app["email"];?></h6>
                            <span><?php echo $app["applicationDate"];?></span>
                            <a href="application.php?application=<?php echo $app["id"] ;?>" class="card-link">Details</a>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
        ?>
    </div>
</div>





<?php include "includes/footer.php" ?>