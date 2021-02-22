<?php
   
  
   if (isset($_POST['submit']))
   {
         $file = $_FILES['filename'];
         $fileName = $_FILES['filename']['name'];
         $fileTmpName= $_FILES['filename']['tmp_name'];
         $fileError = $_FILES['filename']['error'];
 
         $fileExt = explode('.',$fileName);
         $fileActualExt = strtolower(end($fileExt));
         $allowed = array('pdf','txt');
 
         if(in_array($fileActualExt,$allowed)){
             if($fileError === 0){
                   $fileNameNew = uniqid('',true).".".$fileActualExt;
                   $fileDestination = 'contrib/'.$fileNameNew;
                   move_uploaded_file($fileTmpName,$fileDestination);
                   header("Location detaiils.php?uploadsuccess");
             }else{
                   echo "Erreur pendant l'upload.";
             }
         }else{
               echo "Vous ne pouvez pas Uploader ces types de fichiers.";
         }
 
   }
    
   ?>