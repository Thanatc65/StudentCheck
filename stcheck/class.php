<?php
    include("server.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if(isset($_GET["year"])){
            $_SESSION["year"] = $_GET["year"];

        }
        if(isset($_POST["submit"])){
            $classname = $_POST["classname"];
            $cyear = $_POST["year"];

            $addclass = mysqli_query($conn , "INSERT into class(year_id , c_class) value ('$cyear','$classname')");

        }
        $year = $_SESSION["year"] ;
        $query = mysqli_query($conn , "SELECT * from class where year_id = '$year'");

    ?>
    <div class="card text-center">
        <div class="card-header">
            Class
        </div>
        <div class="card-body">
        
        <?php while($row = mysqli_fetch_assoc($query)){ ?>

            <a class="h2" href="student.php?class=<?php echo $row["c_class"];?>">ห้อง : <?php echo $row["c_class"];?></a><br><br>

        <?php } ?>
        <a class="btn btn-primary" href="addclass.php?class=<?php echo $_SESSION["year"] ;?>">Add Class</a>
        <a class="btn btn-primary" href="index.php">Back</a>
        </div>
    </div>
</body>
</html>