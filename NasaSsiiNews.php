<?php
session_start();
if ($_SESSION['loggedin']) {
  $_SESSION['loggedin']=TRUE;
}
else
{
  header('Location: NasaSsiNews.php');
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>5 vul</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>

    </div>
    <div class="landing" id="home">
    <p class="hello"> HACKING NASA </p>
        <p class="m">
        <br> Loading 20%
        <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Loading 40%
        <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Loading 60%
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Loading 80%</p>
        <p class="s"> HACKED SUCCESSFLY </p>
    </div> 
    <p class="mm">Les nouveautés</p>
    <div class="row" id="news">
            <table style="width:auto;">
                   <tr>
                   <td>
                    <img width="350dp"  src="./images/covid.jpg">
                    <button style="width: auto;" class="btn" id="p1" >Plus</button>
                   </td>
                   <td>
                    <img width="350dp" src="./images/cybersecurite.jpg">
                    <button style="width: auto;" class="btn"   id="p2">Plus</button>
                   </td>
                   <td>
                    <img width="350dp" src="./images/mgwp.jpg">
                    <button style="width: auto;" class="btn"  id="p3" >Plus</button>
                   </td>
                   </tr>
                   <tr>
                   <td>
                    <img  width="350dp"  src="./images/sport.jpg">
                    <button style="width: auto;" class="btn"  id="p4">Plus</button>
                   </td>
                   </tr>
                 </table> 
    </div>
</body>

</html>

<script>

    var btn1 = document.getElementById('p1');
    btn1.addEventListener('click', function() {
      document.location.href = "/berbar/detaiils.php?id_cat=1";
    });
    var btn2 = document.getElementById('p2');
    btn2.addEventListener('click', function() {
      document.location.href = "/berbar/detaiils.php?id_cat=2";
    });
    var btn3 = document.getElementById('p3');
    btn3.addEventListener('click', function() {
      document.location.href = "/berbar/detaiils.php?id_cat=3";
    });
    var btn4 = document.getElementById('p4');
    btn4.addEventListener('click', function() {
      document.location.href = "/berbar/detaiils.php?id_cat=4";
    });
</script>