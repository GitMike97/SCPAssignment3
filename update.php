<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Update SCP Record</title>
  </head>
  <body class="container">
    <h1>Update SCP Record Below...</h1>
    <?php include "connection.php"; ?>
    <?php
    
            include "connection.php";
            $id = $_GET['update'];
            $record = $connection->query("SELECT * FROM SCPpages WHERE id=$id") or die($connection->error);
            $row = $record->fetch_assoc();
            
    
    ?>
    
    <form class="form-group" method="post" action="connection.php">
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
       
        
        <label>Edit SCP Number</label>
        <br>
        <textarea class="form-control" name="SCPno" required><?php echo $row['SCPno'];?></textarea>
        <br>
        <label>Edit Object Class</label>
        <br>
        <textarea class="form-control" name="SCPclass" required><?php echo $row['SCPclass'];?></textarea>
        <br>
        <label>Edit SCP Name</label>
        <br>
        <textarea class="form-control" name="SCPname"><?php echo $row['SCPname'];?></textarea>
        <br>

        <label>Edit Image Address</label>
        <br>
        <input type="text" name="img" class="form-control" value="<?php echo $row['img'];?>">
        <br>        
        <label>Edit Special Containment Procedures</label>
        <textarea class="form-control" name="Containment" rows="20" required><?php echo $row['Containment'];?></textarea>
        <br>
        <label>Edit Description</label>
        <textarea class="form-control" name="Description" rows="20" required><?php echo $row['Description'];?></textarea>
        <br>
        <label>Edit The Other Relevant Information</label>
        <textarea class="form-control" name="Other" rows="20"><?php echo $row['Other'];?></textarea>
        <br>
       
       <br><br>
       <input type="submit" class="btn btn-primary" name="update" value="Update SCP Record">
        
    </form>
    <br>
    <p><a href="index.php" class="btn btn-dark">Back to index page</a></p>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>