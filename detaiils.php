<?php
session_start();
if ($_SESSION['loggedin']) {
}
else
{
 header('Location: details.php');
  exit;
} 
?>
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

/* Full-width input fields */

input[type=text],
input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}


/* Set a style for all buttons */

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}


/* Extra styles for the cancel button */

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.btn {
    background-color: white;
    color: black;
    border: 0px;
    padding: 15px;
    text-align: center;
    text-decoration: none;
    display: block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}


/* Center the image and position the close button */

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 20%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

.modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
    padding-top: 0px;
}


/* Modal Content/Box */

.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto;
    /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 50%;
    margin-top: 0%;
    /* Could be more or less, depending on screen size */
}


/* The Close Button (x) */

.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}


/* Add Zoom Animation */

.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {
        -webkit-transform: scale(0)
    }
    to {
        -webkit-transform: scale(1)
    }
}

@keyframes animatezoom {
    from {
        transform: scale(0)
    }
    to {
        transform: scale(1)
    }
}



</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#about">About</a>
  <a href="#contact">Contact</a>
  <div class="search-container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
      <input  type="text" placeholder="Search.." name="search">
      <button type="submit" name="submit">Search</button>
    </form>
  </div>

</div>

<?php
$idfErr="";
require_once dirname(__FILE__) . '/dbConnect.php';   
$db = new DbConnect();
              $con = $db->connect();
             $stmt=$con->prepare("SELECT * FROM news where id_cat=?");
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
                  echo ' <div  id="contenue"
                   style="padding-left:16px">
                   <h2>'.$news_name.'</h2>
                   <p>'.$text_news.' </p>
                   </div>';
              }
          if(isset($_POST["submit"])) { 
            echo '<style type="text/css">
            #contenue {
                 display: none;}
             </style>';

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
}?>
  <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Contribuer</button>

  <div id="id01" class="modal">

  <form class="modal-content animate" action="/elvul/action.php" method="post" enctype="multipart/form-data">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <input type="file" id="myFile" name="filename">
                <button type="submit" name="submit">Contribuer</button>
                <label>
          </label>
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
</div>
</body>
</html>


<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>