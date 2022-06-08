<?php/*code de connexion a la base de donné 'jadoo'*/
            $servername = 'localhost';
            $username = 'root';
            $password = "";
            $dbname = '';
            //On essaie de se connecter
            try{
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Connexion réussie';
            }
            /*On capture les exceptions si une exception est lancée et on affiche
             
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        ?>
        <?php/*code pour incrementer des valeurs aux colonne de la table 'plat' */
            $servname = 'localhost';
            $dbname = '';
            $user = 'root';
            $pass = "";
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql1 = "INSERT INTO plats(Nom,Description,Image)
                        VALUES('Tonkatsu-Teishoku','Échine de porc panée à la japonaise \"Tonkatsu-Teishoku\"', 'plat_3.png')";
                $dbco->exec($sql1);
                $sql2 = "INSERT INTO plats(Nom,Description,Image)
                        VALUES('Udon', 'Nouilles japonaises chaudes à base de farine de blé \"Udon\"','plat_2.png')";
                $dbco->exec($sql2);
                $sql3 = "INSERT INTO plats(Nom,Description,Image)
                        VALUES( 'Tsukuné','Boulettes de poulet au gingembre sauce sucrée salée \"Tsukuné\"','plat_1.png')";
                $dbco->exec($sql3);
                echo 'Entrée ajoutée dans la table';
            }
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        ?>
        <?php /*code ou on creer une table avec ses entrées, puis requete et on lie les paramètre et on fini par inserer nos valeurs aux colonnes*/
            $servname = "localhost"; $dbname = "pdodb"; $user = "root"; $pass = "root";
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //Crée la table Users
                $sql = "CREATE TABLE Users (
                  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                  Prenom VARCHAR(30) NOT NULL,
                  Nom VARCHAR(30) NOT NULL,
                  Mail VARCHAR(50) NOT NULL
                )";
                $dbco->exec($sql);
                //On prépare la requête et on lie les paramètres
                $sth = $dbco->prepare("
                  INSERT INTO Users (Prenom, Nom, Mail)
                  VALUES (:prenom, :nom, :mail)
                ");
                $sth->bindParam(':prenom', $prenom);
                $sth->bindParam(':nom', $nom);
                $sh->bindParam(':mail', $mail);
                //Insère une première entrée
                $prenom = "Pierre"; $nom = "Martin"; $mail = "pierre@pierre-martin.com";
                $sth->execute();
                //Insère une deuxième entrée
                $prenom = "Victor"; $nom = "Durand"; $mail = "v.durandd@gmail.com";
                $sth->execute();
                //Insère une troisième entrée
                $prenom = "Julia"; $nom = "Joly"; $mail = "july@gmail.com";
                $sth->execute();
                echo "Parfait, tout s'est bien passé";
            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>