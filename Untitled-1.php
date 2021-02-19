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
                    <button style="width: auto;" class="btn" >Plus</button>
                   </td>
                   <td>
                    <img width="350dp" src="./images/cybersecurite.jpg">
                    <button style="width: auto;" class="btn" >Plus</button>
                   </td>
                   <td>
                    <img width="350dp" src="./images/mgwp.jpg">
                    <button style="width: auto;" class="btn" >Plus</button>
                   </td>
                   </tr>
                   <tr>
                   <td>
                    <img  width="350dp"  src="./images/sport.jpg">
                    <button style="width: auto;" class="btn" >Plus</button>
                   </td>
                   </tr>
                 </table> 
    </div>

    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

    <div id="id01" class="modal">

        <form class="modal-content animate" action="/action_page.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="./images/avatar.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit">Login</button>
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
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>