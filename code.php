 <?php
    $password=$_GET["password"];
$encrypted = base64_encode(sha1($password));
echo $encrypted;
$dec= base64_decode($encrypted);
$hash = array("encrypted" => $encrypted, "dec" => $dec);
        print_r ($hash);
        ?>
       public function hashSSHA($password) {
 
 $salt = sha1(rand());
 $salt = substr($salt, 0, 10);
 $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
 $hash = array("salt" => $salt, "encrypted" => $encrypted);
 return $hash;
}

/**
* Decrypting password
* @param salt, password
* returns hash string
*/
public function checkhashSSHA($salt, $password) {

 $hash = base64_encode(sha1($password . $salt, true) . $salt);

 return $hash;
}
