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
        if(isset($_GET["class"])){
            $_SESSION["class"] = $_GET["class"];            
        }

        if(isset($_POST["save"])){
            $name = $_POST["name"] ;
            $lastname = $_POST["lastname"] ;
            $class = $_POST["class"];

            $query = mysqli_query($conn , "INSERT into student(name , lastname , class_id) value ('$name','$lastname','$class')");
        }

        if(isset($_GET["del"])){
            $del = $_GET["del"];

            $delq = mysqli_query($conn , "DELETE from student where id = '$del'");

        }

        if(isset($_POST["update"])){
            $upid = $_POST["upclass"];
            $upname = $_POST["upname"];
            $uplastname = $_POST["uplastname"];

            $up = mysqli_query($conn , "UPDATE student set name = '$upname', lastname = '$uplastname' where id = '$upid'");

        }

        if(isset($_GET["ch"])){

            $ch_id = $_GET["ch"];
            $all = mysqli_query($conn , "SELECT * from student where id = '$ch_id'");
            $ch = mysqli_fetch_array($all);
            $ch_name = $ch["name"];
            $ch_lname = $ch["lastname"];
            $today = date("D M j");

            $check = mysqli_query($conn , "INSERT into checkstudent (name , lastname , st_check,date) 
            value ('$ch_name','$ch_lname ','check','$today')");

        }

        $class = $_SESSION["class"];
        $show = mysqli_query($conn , "SELECT * from student where class_id = '$class'")
    ?>
    <div class="d-flex justify-content-center mt-5">
    <a class="btn btn-primary w-25" href="addstudent.php?id=<?php echo $_SESSION["class"] ;?>">Add Student</a><br>
    <a class="btn btn-primary w-25" href="class.php">Back</a>
    </div>
    <br><input class="form-control w-50 mx-auto d-3 mt-3" type="date" name="date">

    <table class="table mt-3">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Name</th>
        <th scope="col">Lastname</th>
        <th scope="col">Action</th>
        <th scope="col">Action2</th>
        <th scope="col">Action3</th>
        </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_assoc($show)) { ?>

        <tr>
            <th><?php echo $row["name"] ; ?></th>
            <td><?php echo $row["lastname"] ; ?></td>
            <td><a href="student.php?ch=<?php echo $row["id"];?>">Check</a></td>
            <td><a href="st_edit.php?ed=<?php echo $row["id"];?>">Edit</a></td>
            <td><a href="student.php?del=<?php echo $row["id"];?>">Delete</a></td>
        </tr>
    <?php } ?>
    </tbody>
    </table>

</body>
</html>