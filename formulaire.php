<?php
    $serveur = "localhost";
    $dbname = "jadoo";
    $user = "root";
    $pass = "";
    $Nom = utf8_decode (valid_donnees($_POST["nom"]));
    $Prenom = utf8_decode (valid_donnees($_POST["prenom"]));
    $Email = valid_donnees($_POST["email"]);
    $Message = utf8_decode (valid_donnees($_POST["message"]));
    function valid_donnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //On insère les données reçues
        $sth = $dbco->prepare("
            INSERT INTO messages(Nom, Prenom, Email, Message)
            VALUES(:nom, :prenom, :email, :message)");
        $sth->bindParam(':nom',$Nom);
        $sth->bindParam(':prenom',$Prenom);
        $sth->bindParam(':email',$Email);
        $sth->bindParam(':message',$Message);
        $sth->execute();
       
    setcookie('cookie_form', 1, time()+60);
    header("location:index.php#section-5");
        //On renvoie l'utilisateur vers la page de remerciement <script type="text/javascript">alert('Votre message a bien était envoyé')</script>
    }
    catch(PDOException $e){
        echo 'Erreur : '.$e->getMessage();
    }
    

?>
