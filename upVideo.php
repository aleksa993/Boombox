<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    include("config.php");
 
    if(isset($_POST['upload'])){
      $maxsize = 2000000000; // 2GB
     
       $name = $_FILES['file']['name'];
       $target_dir = "uploads/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("jpg","png", "jpeg", "mp4","avi","3gp","mov","mpeg","dvix","mpeg-4");

       // Check extension
       if( in_array($videoFileType,$extensions_arr) ){
        
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            echo "File too large. File must be less than 2GB.";
          }else{
            // Upload
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
              // Insert record
              $query = "INSERT INTO videos(name,location) VALUES('".$name."','".$target_file."')";

              mysqli_query($con,$query);
              
              
              header("location: admin.php?=upload_successful");
            }
          }

       }else{
        header("Location: admin.php?=error_nije_izabran_fajl");

      }
 
     } 
     ?>
</head>
<body>
    
</body>
</html>