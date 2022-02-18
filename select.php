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
            <?php require 'Config.php' ?>
            <div class="col py-3">
                <br><br>
                <h3 id="Title">Manage employee</h3>
                <br><br>
                <table class="table table-hover table-responsive">
                    <thead class="table-dark">
                        <th>id</th>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>date_n</th>
                        <th>depart</th>
                        <th>salaire</th>
                        <th>fonction</th>
                        <th>image</th>
                        <th>Update/Delete</th>
                    </thead> 
                    <tbody class="table-light">
                    <?php 
                        require 'db_conx.php';
                        $SqlSelect = "SELECT * FROM `employe`;";
                        $result = $conn->query($SqlSelect);
                        if(isset($_REQUEST['Id'])) {
                            $id = $_REQUEST['Id'];
                            $sqlDelete = "DELETE FROM `employe` WHERE id = '$id' ";
                            $conn->query($sqlDelete);
                            // header("Location: select.php");
                        }                       
                        foreach ( $result as $row ) {                           
                    ?>
                        <tr>
                            <td><?php echo $row["id"]?> </td>
                            <td><?php echo $row["nom"]?> </td>
                            <td><?php echo $row["prenom"]?> </td>
                            <td><?php echo $row["date_n"]?> </td>
                            <td><?php echo $row["depar"]?> </td>
                            <td><?php echo $row["salaire"]?> </td>
                            <td><?php echo $row["fonction"]?> </td>
                            <td><img src="<?php echo $row["image"]?>" alt="error" id="img"> </td>
                            <td>
                                <a href="Update.php?id=<?php echo $row["id"] ."&photo=". $row["image"]; ?>" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                                <a href="Select.php?Id=<?php echo $row["id"]; ?>" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php
                        }
                        $conn->close();
                    ?>
                    </tbody>       
                </table>
            </div>
        </div>        
    </div>
</body>
</html>