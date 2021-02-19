<?php
        require_once dirname(__FILE__) . '/dbConnect.php';
        
        $db = new DbConnect();
        $con = $db->connect();
        if(isset($_POST["submit"])) { 
          if (empty($_POST["username"]) or empty($_POST["password"])){
              $idfErr="Champ(s) vide(s)!";
          }else{
                      $stmt = $con->prepare('SELECT * FROM user WHERE Nom_user = ?');
                            $stmt->bind_param('s', $_POST['username']);
                             if ($stmt->execute()){
                  $stmt->bind_result($Username, $Password);
                  while($stmt->fetch()){
                  $user = array();
                  $user["Username"] = $Username;
                  $user["Password"] = $Password;
                  }
                if ($Password == $_POST['password']) {
                  // Verification success! User has loggedin!
                  // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
                  session_regenerate_id();
                  $_SESSION['loggedin'] = TRUE;
                  $_SESSION['name'] = $_POST['username'];
                header('Location: index.php'); 
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