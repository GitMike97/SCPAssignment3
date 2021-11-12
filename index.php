<!doctype html>
<html lang="en">
  <head>
          <style>
    
      body {background-image: url("Images/SCPBackground.jpg")}
      </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="Style/style.css" rel="stylesheet">


    <title>SCP Application</title>
  </head>
  <body class="container">
    <?php
    include "connection.php";
    ?>
    <div class="container p-3"> 
    <div class="row orange rounded center p-3">
    <div class= "text-center brand-title"><h1>SCP Foundation</h1>
    </div>
    <h1 class='text-danger text-center'>Secure. Contain. Protect.</h1>
           <div class='col'>

                <img src='Images/SCP Foundation.jpg' width='50px' height='50px' class='img-fluid'/>
            </div>
    </div>
 
    </div>
 <div class="row">   
    <div class="col">
        
        <ul class="nav navbar-light text-light bg-dark">
            <!--run php loop thru db and display h1 here this will be our menu -->
            <?php foreach($result as $link): ?>
            
                <li class="nav-item active text-light">
                    
                    <a href="index.php?link='<?php echo $link['SCPno']; ?>'" class="nav-link text-light"><?php echo $link['SCPno']; ?></a>
                    
                </li>
            
            <?php endforeach; ?>
            <li class="nav-item active"><a href="form.php" class="nav-link text-light">Add a SCP Record</a></li>
        </ul>
    </div>
</div>



<!-- main content based on menu click -->


<div class="row orange font1 p-3 rounded center">
    <div class="col">
        <?php 
        if(isset($_GET['link']))
        {
            $SCPno = trim($_GET['link'], "'");
            
            
            // run sql command to select record based on the GET value
            $record = $connection->query("select * from SCPpages where SCPno='$SCPno'") or die($connection->mysqli_error($connection));
            
            // turn record into an associative array
            $array = $record->fetch_assoc();
            
            $SCPno = $array['SCPno'];
            $SCPclass = $array['SCPclass'];
            $SCPname = $array['SCPname'];
            $img = $array['img'];
            $Containment = $array['Containment'];
            $Description = $array['Description'];
            $Other = $array['Other'];
            
            
            // variables to hold our update and delete url strings
            $id = $array['id'];
            $update = "update.php?update=" . $id;
            $delete = "connection.php?delete=" . $id;
            
            if($SCPname==null&&$img==null&&$Other==null)
                {
                echo "
                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Number:</b><span class='red'> $SCPno</span></h5>                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Class:</b><span class='red'> $SCPclass</span></h5>                                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Name:</b><span class='red'> Unavailable</span></h5>                                
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Special Containment Procedures:</h5><br><p class='indent'>$Containment</p></div>
                <br>
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Description:</h5><br><p class='indent'>$Description</p></div>     
                <br>
                <p>                    
                <a href='$update' class='btn btn-warning'>Update SCP Record</a>                    
                <a href='$delete' class='btn btn-danger'>Delete SCP Record</a>                
                </p>  
                
            ";
                }
            else if($SCPname!=null&&$img!=null&&$Other==null)                
            {                                                   
                echo " 
                
                 <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Number:</b><span class='red'> $SCPno</span></h5>                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Class:</b><span class='red'> $SCPclass</span></h5>                                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Name:</b><span class='red'> $SCPname</span></h5>                                
                <p class='border border-secondary shadow rounded p-3 bg-light'><img src='$img' class='responsive'></p> 
                
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Special Containment Procedures:</h5><br><p class='indent'>$Containment</p></div>
                <br>
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Description:</h5><br><p class='indent'>$Description</p></div>     
                <br>
                <p>                    
                <a href='$update' class='btn btn-warning'>Update SCP Record</a>                    
                <a href='$delete' class='btn btn-danger'>Delete SCP Record</a>                
                </p>      
                
                ";                                 
                
            }
            else if($SCPname!=null&&$img==null&&$Other==null)                
            {                                                   
                echo "   
               
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Number:</b><span class='red'> $SCPno</span></h5>                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Class:</b><span class='red'> $SCPclass</span></h5>                                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Name:</b><span class='red'> $SCPname</span></h5>                                
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Special Containment Procedures:</h5><br><p class='indent'>$Containment</p></div>
                <br>
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Description:</h5><br><p class='indent'>$Description</p></div>     
                <br>
                <p>                    
                <a href='$update' class='btn btn-warning'>Update SCP Record</a>                    
                <a href='$delete' class='btn btn-danger'>Delete SCP Record</a>                
                </p>     
                
                ";                                 
                
            }
            else if($SCPname==null&&$img==null&&$Other!=null)                
            {                                                   
                echo " 
                
                 <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Number:</b><span class='red'> $SCPno</span></h5>                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Class:</b><span class='red'> $SCPclass</span></h5>                                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Name:</b><span class='red'> Unavailable</span></h5>                                
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Special Containment Procedures:</h5><br><p class='indent'>$Containment</p></div>
                <br>
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Description:</h5><br><p class='indent'>$Description</p></div>     
                <br>
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Other Relevant Information:</h5><br><p class='indent'>$Other</p></div>                                
                <br>
                <p>                    
                <a href='$update' class='btn btn-warning'>Update SCP Record</a>                    
                <a href='$delete' class='btn btn-danger'>Delete SCP Record</a>                
                </p>    
                
                ";                                 
                
            }
            else if($SCPname==null&&$img!=null&&$Other==null)                
            {                                                   
                echo "  
                
                 <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Number:</b><span class='red'> $SCPno</span></h5>                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Class:</b><span class='red'> $SCPclass</span></h5>                                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Name:</b><span class='red'> Unavailable</span></h5>                                
                <p class='border border-secondary shadow rounded p-3 bg-light'><img src='$img' class='responsive'></p>                               
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Special Containment Procedures:</h5><br><p class='indent'>$Containment</p></div>
                <br>
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Description:</h5><br><p class='indent'>$Description</p></div>     
                <br>
                <p>                    
                <a href='$update' class='btn btn-warning'>Update SCP Record</a>                    
                <a href='$delete' class='btn btn-danger'>Delete SCP Record</a>                
                </p>  
                ";                                 
                
            }            
            else if($SCPname!=null&&$img==null&&$Other!=null)                
            {                                                   
                echo " 
                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Number:</b><span class='red'> $SCPno</span></h5>                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Class:</b><span class='red'> $SCPclass</span></h5>                                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Name:</b><span class='red'> $SCPname</span></h5>                                
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Special Containment Procedures:</h5><br><p class='indent'>$Containment</p></div>
                <br>
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Description:</h5><br><p class='indent'>$Description</p></div>     
                <br>
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Other Relevant Information:</h5><br><p class='indent'>$Other</p></div>                                
                <br>
                <p>                    
                <a href='$update' class='btn btn-warning'>Update SCP Record</a>                    
                <a href='$delete' class='btn btn-danger'>Delete SCP Record</a>                
                </p>  
                
                ";                                 
                
            }
            else if($SCPname==null&&$img!=null&&$Other!=null)                
            {                                                   
                echo "  
                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Number:</b><span class='red'> $SCPno</span></h5>                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Class:</b><span class='red'> $SCPclass</span></h5>                                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Name:</b><span class='red'> Unavailable</span></h5>                                
                <p class='border border-secondary shadow rounded p-3 bg-light'><img src='$img' class='responsive'></p>                              
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Special Containment Procedures:</h5><br><p class='indent'>$Containment</p></div>
                <br>
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Description:</h5><br><p class='indent'>$Description</p></div>     
                <br>
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Other Relevant Information:</h5><br><p class='indent'>$Other</p></div>                                
                <br>
                <p>                    
                <a href='$update' class='btn btn-warning'>Update SCP Record</a>                    
                <a href='$delete' class='btn btn-danger'>Delete SCP Record</a>                
                </p>  
               
                ";                                 
                
            }
           
            else if($SCPname!=null&&$img!=null&&$Other!=null)                
            {                                                   
                echo "
                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Number:</b><span class='red'> $SCPno</span></h5>                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Class:</b><span class='red'> $SCPclass</span></h5>                                
                <h5 class='border border-secondary shadow rounded p-3 bg-light'><b>SCP Name:</b><span class='red'> $SCPname</span></h5>                                
                <p class='border border-secondary shadow rounded p-3 bg-light'><img src='$img' class='responsive'></p>                              
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Special Containment Procedures:</h5><br><p class='indent'>$Containment</p></div>
                <br>
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Description:</h5><br><p class='indent'>$Description</p></div>     
                <br>
                <div class='border border-secondary shadow rounded p-3 bg-light'><h5>Other Relevant Information:</h5><br><p class='indent'>$Other</p></div>                                
                <br>
                <p>                    
                <a href='$update' class='btn btn-warning'>Update SCP Record</a>                    
                <a href='$delete' class='btn btn-danger'>Delete SCP Record</a>                
                </p>  
                
                ";                                 
                
            }
        }
        else
        {
            echo "
            <div class='col border rounded shadow p-3 m-2 form-group bg-dark white'>
                <h5 class='text-danger'>Welcome to SCP</h5>
                <p class='text-danger'>Secure.Contain.Protect</p>
                <img src='Images/SCP Foundation.jpg' width='400px' height='230px' class='img-fluid'/>
            </div>
                

                
            ";
        }
        
        ?>
    </div>
    
</div>





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