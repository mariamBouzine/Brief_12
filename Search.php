<?php //require 'conx.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Gestion employes</title>
</head>
<body>
    <?php 
        require 'db_conx.php';
        if(isset($_POST["submit"]) ){
            $radio = $_POST["radio"];
            echo 'The credit card you want to use is ' . $radio ;
            echo "<script> 
                var search = document.getElementById('Search');
                search.style.display = block;
             </script>";
        }
        else {
            echo "No Button Selected";
        }
       
       
    ?>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php require 'config.php' ?>
            <div class="col py-3">
                <form action="Search.php" method="post" enctype="multipart/form-data">
                    <br><br>
                    <h3 id="Title">Search employee</h3>
                    <br><br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio" id="id" value="ID">
                        <label class="form-check-label" for="flexRadioDefault1">ID</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio" id="name" value="Name">
                        <label class="form-check-label" for="flexRadioDefault2">Name</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio" id="department" value="Department">
                        <label class="form-check-label" for="flexRadioDefault2">Department</label>
                    </div>
                    <br><br>
                    <div class="input-group" id="search">
                        <div class="form-outline">
                            <input id="search-input" type="search" id="form1" placeholder="Search" id="Search"  class="form-control" />
                        </div>
                        <button id="search-button" type="button" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search text-light" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg> 
                        </button>
                    </div>
                    <br><br>
                    <select class="form-select" id="select" aria-label="Default select example">
                        <option>Dep1</option>
                        <option>Dep2</option>
                        <option>Dep3</option>
                        <option>Dep4</option>
                        <option>Dep5</option>
                    </select>
                    <input type="submit" name="submit"/>
                </form>
            </div>
        </div>    
    </div>
</body>
</html>