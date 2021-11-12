<?php

    // Database Credentials
    $user = "a3005122_SCPUser";
    $pw = "ThisBetterWork";
    $db = "a3005122_SCP";
    
    // Database connection PHP object
    $connection = new mysqli('localhost', $user, $pw, $db) or die(mysqli_error($connection));

    // return all records from database and save as variable
    $result = $connection->query("select * from SCPpages") or die(mysqli_error($connection));
    
if(isset($_POST['submit']))
{
    // store values from the form here.
    //$h1 = $_POST['h1'];
    //$h2 = $_POST['h2'];
    //$h3 = $_POST['h3'];
    //$img = $_POST['img'];
    //$p1 = $_POST['p1'];
    //$p2 = $_POST['p2'];
    //$p3 = $_POST['p3'];
    $SCPno= mysqli_real_escape_string($connection,$_POST['SCPno']);
    $SCPclass= mysqli_real_escape_string($connection,$_POST['SCPclass']);
    $SCPname= mysqli_real_escape_string($connection,$_POST['SCPname']);
    $img= mysqli_real_escape_string($connection,$_POST['img']);
    $Containment= mysqli_real_escape_string($connection,$_POST['Containment']);
    $Description= mysqli_real_escape_string($connection,$_POST['Description']);
    $Other= mysqli_real_escape_string($connection,$_POST['Other']);
        
    // create insert command that will take form values and store in table
    $insert = "insert into SCPpages(SCPno,SCPclass,SCPname,img,Containment,Description,Other)
     values('$SCPno','$SCPclass','$SCPname','$img','$Containment','$Description','$Other')";
        
    // connect to database and run $insert query
    if($connection->query($insert) === TRUE)
    {
    echo "
        <style>
            body{font-family: sans-serif;}
            a {
            background-color: #008CBA;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            }
        </style>
        <h1>SCP Record SCP Added Successfully</h1>
        <p><a href='index.php'>Back to index.php</a></p>
            ";
    }
    else
        {
        echo "

                <style>
body{font-family: sans-serif;}
a {
background-color: #008CBA;
border: none;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
}
</style>
                <h1>Error Submitting SCP Record.</h1>
                <p>$connection->error</p>
                <p><a href='form.php'>Back to the Form.</a></p>
            ";
        }
    }
    
    

    
// delete record functions
if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    
    // delete sql command
    $del = "delete from SCPpages where id=$id";
    
    if($connection->query($del)=== TRUE)
    {
            echo"
                <style>
body{font-family: sans-serif;}
a {
background-color: #008CBA;
border: none;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
}
</style>
<h1>SCP Record Deleted</h1>
<p><a href='index.php'>Back to Index.</a></p>
            ";
    }
    else
    {
    echo "
                <style>
body{font-family: sans-serif;}
a {
background-color: #008CBA;
border: none;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
}
</style>
<h1>Error Deleting SCP Record</h1>
<p><a href='index.php'>Back to the Index.</a></p>
            ";
    }
    
}
if(isset($_POST['update']))
{
    //create variables from our posted form values
    $id= mysqli_real_escape_string($connection,$_POST['id']);
    $SCPno= mysqli_real_escape_string($connection,$_POST['SCPno']);
    $SCPclass= mysqli_real_escape_string($connection,$_POST['SCPclass']);
    $SCPname= mysqli_real_escape_string($connection,$_POST['SCPname']);
    $img= mysqli_real_escape_string($connection,$_POST['img']);
    $Containment= mysqli_real_escape_string($connection,$_POST['Containment']);
    $Description= mysqli_real_escape_string($connection,$_POST['Description']);
    $Other= mysqli_real_escape_string($connection,$_POST['Other']);
    
    //Update sql command
    $update = "update SCPpages set SCPno='$SCPno', SCPclass='$SCPclass', SCPname='$SCPname', img='$img', Containment='$Containment', Description='$Description', Other='$Other' where id='$id'";

    //Run update query and display success or error message
    if($connection->query($update) === TRUE)
    {
         echo "

            <style>
                body{font-family: sans-serif;}
                a {
                background-color: red;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                }
            </style>
            <h1>Updated SCP Record Successfully.</h1>
                
            <p><a href='index.php'>Back to index.</a></p>";
    }
    else
    {
                 echo "

                <style>
body{font-family: sans-serif;}
a {
background-color: red;
border: none;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
}
</style>
                <h1>Updated SCP Record Unsuccessfully.</h1>
                <p>$connection->error</p>
                <p><a href='index.php'>Back to index.</a></p>";
    }
}

?>
