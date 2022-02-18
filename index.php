<?php require 'db_conx.php'?>
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
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php require 'config.php' ?>
            <div class="col py-3">
                <form action="upload.php" method="post" enctype="multipart/form-data" >
                    <br><br>
                    <h3 id="Title">Add an employee</h3>
                    <br><br>
                    <!-- Matricule input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="id" id="IDfileToUpload" placeholder="ID" class="form-control"/>
                    </div>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" name="nom" id="NomfileToUpload" placeholder="First name" class="form-control" />
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-outline">
                                <input type="text" name="prenom" id="PrenomfileToUpload" placeholder="Last name" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <!-- Date of Birth input -->
                    <div class="form-outline mb-4">
                        <input type="date" name="date" id="DatefileToUpload" placeholder="Date of Birth" class="form-control"/>                    
                    </div>
                    <!-- department input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="depart" id="DepartfileToUpload" placeholder="Department" class="form-control" />
                    </div>
                    <!-- salary input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="salary" id="SalairefileToUpload" placeholder="Salary" class="form-control" />
                    </div>
                    <!-- function input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="founction" id="FuncfileToUpload" placeholder="Function"   class="form-control"/>
                    </div>
                    <!-- photo input -->
                    <div class="form-outline mb-4">
                        <input type="file" name="fileToUpload" id="fileToUpload"/>
                    </div>
                    <br>
                    <!-- Submit button -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
                        <input type="submit" value="Save" name="submit" class="btn btn-dark btn-lg">
                    </div>
                </form>
            </div>
        </div>    
    </div>
    
</body>
</html>