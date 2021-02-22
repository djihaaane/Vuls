<?php
if(isset($_GET['pic']))
{
    //Only strip slashes if magic quotes is enabled.
    $pic = (get_magic_quotes_gpc()) ? stripslashes($_GET['pic']) : $_GET['pic'];

    //Change this to the correct path for your file on the server.
    $pic = 'C:/wamp64/www/elvul/images/'.$pic;
   //because it does much more than that.
    $size = getimagesize($pic);

    //Now that you know the mime type, include it in the header.
    header('Content-type: '.$size['mime']);

    //Read the image and send it directly to the output.
    echo readfile($pic);
}
?>