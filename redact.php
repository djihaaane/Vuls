<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>
<body>
<?php
$idfErr="";
require_once dirname(__FILE__) . '/dbConnect.php';
                    echo ' <h1 >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Realisee Par</h1> ';

              $db = new DbConnect();
              $con = $db->connect();
              $result1=$con->query("SELECT * FROM owners WHERE id_news =".$_GET["id_news"]);
                while($row = mysqli_fetch_array($result1))
                {
                    
                   echo '
                   <div  style="padding-left:80px">
                   <img width="350dp"  src="./images/ano.jpg">
                   <h2>'.$row[1].'</h2>
                   <p>'.$row[3].' </p>
                   </div>';
                }             
?>

</body>
</html>