<?php
        require_once dirname(__FILE__) . '/dbConnect.php';

          if(isset($_POST["submit"])) { 
        if (empty($_POST["search"])){
           $idfErr="chercher quoi???";
            }else{
        $db = new DbConnect();
              $this->con = $db->connect();
              $stmt = $this->con->prepare("SELECT *
                FROM news
                WHERE news_name = ? ");
             $stmt->bind_param("s", $);
             $stmt->execute();
             $stmt->bind_result($id_news, $text_news,$id_cat);
             $row = array();
              while($stmt->fetch()){
                     $news = array();
                     $news["id_news"] = $id_news;
                    $news["text_news"] = $text_news;
                     $news["id_cat"] = $id_cat;

         array_push($row, $news);
        }      
          $response->getBody()->write(json_encode($responseData));
}
 if ($idfErr != "") {
echo '<div class="error"><strong>Erreur: </strong> ' . $idfErr . '</div>';
    }else
    {
        echo($response);
    }

?>