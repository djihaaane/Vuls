<?php
session_start();
$_SESSION['loggedin'] = FALSE;
echo $_SESSION['loggedin'];
        require_once dirname(__FILE__) . '/dbConnect.php';
        $db = new DbConnect();
        $con = $db->connect();
        if(isset($_POST["submit"])) { 
          if (empty($_POST["username"]) or empty($_POST["password"])){
              $idfErr="Champ(s) vide(s)!";
          }else{
                echo $_POST["username"];
                      $stmt = $con->prepare('SELECT user_username,user_password  FROM user WHERE user_username = ?');
                            $stmt->bind_param('s', $_POST['username']);
                             if ($stmt->execute()){
                  $stmt->bind_result($Username, $Password);
                  while($stmt->fetch()){
                  $user = array();
                  $user["user_username"] = $Username;
                  $user["user_password"] = $Password;
                  print_r($Username);

                  }
                  $encrypted = base64_encode(sha1($_POST["password"]));      
                if ($Password == $encrypted) {
                  echo "loggeddd baabeee";
                  // Verification success! User has loggedin!
                  // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
                  session_regenerate_id();
                  $_SESSION['loggedin'] = TRUE;
                  $_SESSION['name'] = $_POST['username'];
                header('Location: NasaSsiiNews.php'); 
                          exit;
          
                      } else {
                  $idfErr="Identifiants incorrects!"; 
              }
                                $stmt->close();
          }else {
               $idfErr="Identifiants incorrects"; 
          }
          }
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

    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

    <div id="id01" class="modal">

        <form class="modal-content animate"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="./images/avatar.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit" name="submit">Login</button>
                <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
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

  var btn = document.getElementById('p1');
    btn.addEventListener('click', function() {
      document.location.href = "/berbar/details.php?id_cat=1";
    });
    var btn2 = document.getElementById('p2');
    btn2.addEventListener('click', function() {
      document.location.href = "/berbar/details.php?id_cat=2";
    });
    var btn3 = document.getElementById('p3');
    btn3.addEventListener('click', function() {
      document.location.href = "/berbar/details.php?id_cat=3";
    });
    var btn4 = document.getElementById('p4');
    btn4.addEventListener('click', function() {
      document.location.href = "/berbar/details.php?id_cat=4";
    });
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>