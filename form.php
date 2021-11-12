<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Enter SCP</title>
  </head>
  <body class="container">
    <h1>Enter SCP Record Below...</h1>
    
    <form class="form-group" method="post" action="connection.php">
        
        <label>SCP Number*</label>
        <br>
        <textarea class="form-control" name="SCPno" placeholder="Type the SCP Number" required></textarea>
        <br>
        <label>Object Class*</label>
        <br>
        <input type="text" class="form-control" name="SCPclass" placeholder="Type the SCP Object Class" required>
        <br>
        <label>SCP Name</label>
        <br>
        <textarea class="form-control" name="SCPname" placeholder="Type the SCP Name if applicable"></textarea>
        <br>

        <label>Add image address</label>
        <br>
        <input type="text" name="img" class="form-control" placeholder="Images/name-of-image...">
        <br>        
        <label>Special Containment Procedures*</label>
        <textarea class="form-control" name="Containment" rows="5" required></textarea>
        <br>
        <label>Description*</label>
        <textarea class="form-control" name="Description" rows="5" required></textarea>
        <br>
        <label>Any other relevant information</label>
        <textarea class="form-control" name="Other" rows="5"></textarea>
       <br><br>
       <input type="submit" class="btn btn-primary" name="submit" value="Submit SCP Record">
        
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