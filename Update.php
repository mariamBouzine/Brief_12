<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php 
        require 'db_conx.php';
 
        if(isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $sqlSelect = "SELECT * FROM `employe` WHERE id = '$id' ";  
            $result = $conn->query($sqlSelect);
            $row = $result -> fetch_array(MYSQLI_ASSOC);
        }
        if(isset($_POST['update'])){

            $Matricule = $_POST["id"];
            $image_backup = $_REQUEST["photo"];
            $photo="";
            $Fname = $_POST["nom"];
            $Lname = $_POST["prenom"];
            $DateBirth = $_POST["date"];
            $Department = $_POST["depart"];
            $Salary = $_POST["salary"];
            $Function = $_POST["founction"];
            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            // echo $target_dir ."<br>" . $target_file . "<br>". $image_backup;
            if($target_file =="img/"){
                $photo = $image_backup;
            }
            else{
                $photo = $target_file;
            }
            $sqlUpdate = "UPDATE `employe` SET `nom`='$Fname',`prenom`=' $Lname',`date_n`='$DateBirth',`depar`='$Department',`salaire`='$Salary',`fonction`='$Function',`image`='$photo' WHERE id = '$Matricule' ";
            $conn->query($sqlUpdate);
            
            header('location: select.php');
        }
       
    ?>
        <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php require 'config.php' ?>
            <div class="col py-3">
                <form action="Update.php?id=<?php echo $row["id"] ."&photo=". $row["image"] ; ?>" method="post" enctype="multipart/form-data" >
                    <br><br>
                    <h3 id="Title">Add an employee</h3>
                    <br><br>
                    <!-- Matricule input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="id" id="IDfileToUpload" placeholder="ID" class="form-control" value="<?php echo $id ?>"/>
                    </div>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" name="nom" id="NomfileToUpload" placeholder="First name" class="form-control" value="<?php echo $row["nom"] ?>"/>
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-outline">
                                <input type="text" name="prenom" id="PrenomfileToUpload" placeholder="Last name" class="form-control" value="<?php echo $row['prenom'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- Date of Birth input -->
                    <div class="form-outline mb-4">
                        <input type="date" name="date" id="DatefileToUpload" placeholder="Date of Birth" class="form-control" value="<?php echo $row['date_n'] ?>"/>                    
                    </div>
                    <!-- department input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="depart" id="DepartfileToUpload" placeholder="Department" class="form-control"  value="<?php echo $row['depar'] ?>"/>
                    </div>
                    <!-- salary input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="salary" id="SalairefileToUpload" placeholder="Salary" class="form-control"   value="<?php echo $row['salaire'] ?>"/>
                    </div>
                    <!-- function input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="founction" id="FuncfileToUpload" placeholder="Function" class="form-control" value="<?php echo $row['fonction'] ?>"/>
                    </div>
                    <!-- photo input -->
                    <div class="form-outline mb-4">
                    <img src="<?php echo $row['image']?>" id="img" />
                        <input type="file" name="fileToUpload" id="fileToUpload"  value="<?php echo $row['image']?>"/>
                    </div>
                    <br>
                    <!-- Submit button -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
                        <!-- <input type="submit" value="Upload Image" name="submit" class="btn btn-dark btn-lg"> -->
                        <input type="submit" value="Save" name="update" class="btn btn-dark btn-lg">
                    </div>
                </form>
            </div>
        </div>    
    </div>
    <?php
            // }
      $conn->close();
    ?>
</body>
</html>