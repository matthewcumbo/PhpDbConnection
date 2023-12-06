<?php 
    require_once "includes/functions.php";

    require_once "includes/dbh.php";
    require_once "includes/db-functions.php";
    
    include "includes/header.php";

    $courseLevels = loadCourseLevels($conn);
    // $courses = loadCourses($conn);
?>

<header class="container-fluid bg-light border-bottom border-secondary p-4">
    <div class="row">
        <div class="col-12">
            <h1>Course List</h1>
        </div>
    </div>
</header>


<div class="container-fluid py-3 border-bottom">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-3">
            <form method="GET">
                <select class="form-select" id="courseLevel" name="courseLevel" onChange="this.form.submit();">
                    <option disabled selected>Select a Course Level</option>
                    <?php 
                        foreach($courseLevels as $row):
                            ?>
                                <option value="<?php echo $row["id"]; ?>">
                                    <?php echo $row["name"]; echo "(MQF Level ".$row["level"].")";?> 
                                </option>
                            <?php
                        endforeach;
                    ?>
                </select>
            </form>
        </div>
        <div class="col-5">
        <?php
        // echo $_GET["courselevel"];
        if(isset($_GET["courseLevel"])){
            $courses = loadCoursesByLevel($conn, $_GET["courseLevel"]);
            echo "<ul class='list-group'>";
            foreach($courses as $row):
                ?>
                    <li class="list-group-item">
                        <a href="course.php?id=<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?></a>
                    </li>
                <?php
            endforeach;
            echo "</ul>";
        }
            
        ?>
        </div>
        <div class="col-2"></div>
    </div>
</div>


<?php
include "includes/footer.php";
?>

