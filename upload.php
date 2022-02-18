<?php
 require 'db_conx.php';
 
  $target_dir = "img/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $id=$_POST["id"];
  $Fname = $_POST["nom"];
  $Lname = $_POST["prenom"];
  $DateBirth = $_POST["date"];
  $Department = $_POST["depart"];
  $Salary = $_POST["salary"];
  $Function = $_POST["founction"];

  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      echo "<script>alert(\"File is not an image.\")</script>";
      $uploadOk = 0;
    }
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "<script>alert(\"Sorry, your file is too large.\")</script>";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if(isset($_POST["submit"])) {
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "<script>alert(\"Sorry, only JPG, JPEG, PNG & GIF files are allowed..\")</script>";
      $uploadOk = 0;
    }
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "<script>alert(\"Sorry, your file was not uploaded.\")</script>";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $sql_INSERT = "INSERT INTO `employe`(`id`, `nom`, `prenom`, `date_n`, `depar`, `salaire`, `fonction`, `image`) VALUES ('$id','$Fname','$Lname','$DateBirth ','$Department','$Salary ','$Function','$target_file')";
      $conn->query($sql_INSERT);
      echo "<script>alert(\"file has been uploaded.\")</script>";
      header("Location: select.php");
    } else {
      echo "<script>alert(\"Sorry, there was an error uploading your file\")</script>";
    }
  }


  $conn->close();
?>