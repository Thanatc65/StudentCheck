<?php 
    include("server.php");

    if(isset($_GET["ed"])){

        $id = $_GET["ed"];
        $selecte = mysqli_query($conn , "SELECT * from student where id = $id");
        $sel = mysqli_fetch_assoc($selecte);

        $name = $sel["name"];
        $lastname = $sel["lastname"];

    }
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
    <form class="mx-auto d-3 w-50 mt-5" action="student.php" method="POST">
        <input type="hidden" name="upclass" value="<?php echo $id ;?>">
        <label class="h2" for="">Update Student</label><br>
        <label class="h4 mt-5" for="">Name</label>
        <input class="form-control" type="text" name="upname" value="<?php echo $name;?>"><br>
        <label class="h4" for="">Lastname</label>
        <input class="form-control" type="text" name="uplastname" value="<?php echo $lastname;?>"><br>
        <button class="btn btn-primary mx-auto d-3 w-100 mt-3" type="submit" name="update">Update</button>
    </form>
</body>
</html>