<?php
if(isset($_COOKIE['cookie_form'])){
            }
        ?>
<!DOCTYPE html>
<html lang="fr"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="fonts.css">
    <link rel="stylesheet" href="style.css">
    <script src='java.js' async></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Jadoo : un voyage culinaire gourmet et gourment</title>
    <link rel="shortcut icon" type="image/ico" href="./img/favicon.ico">
</head>

<body>
    
<?php
            $servname = "localhost"; $dbname = "jadoo"; $user = "root"; $pass = "";
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sth = $dbco->prepare("
                SELECT Nom, Description,Image
                FROM plats
                JOIN categories ON (plats.Id_Categorie = categories.Id_Categorie)
                WHERE Categorie = 'plats-chaud'
                ORDER BY Id DESC
                ");
                $sth-> execute();
                $plats = $sth->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
        <?php
            $servname = "localhost"; $dbname = "jadoo"; $user = "root"; $pass = "";
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
                $sth = $dbco->prepare("
                  SELECT Nom, Description,Image
                  FROM plats
                  JOIN categories ON (plats.Id_Categorie = categories.Id_Categorie)
                  WHERE Categorie = 'makis'
                  ORDER BY Id ASC
                  ");
                $sth-> execute();
                $makis = $sth->fetchAll(PDO::FETCH_ASSOC);
            
            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    <main>
        <header>
            <div class="logo">
                <img title="Jadoo, un voyage culinaire gourmet et gourmand" src="./img/logo_jadoo_1.svg" alt="Logo jadoo" height="50px"><!--
                --><img title="Jadoo, un voyage culinaire gourmet et gourmand" src="./img/logo_jadoo_2.svg" alt="Jadoo" height="35px">
            </div>
            <nav>
                <ul>
                    <li class="menu-bouton"><a href="#">Les nouveaut??s</a></li>
                    <li class="menu-bouton"><a href="#">D??couvrir</a></li>
                    <li class="menu-bouton"><a href="#">Commander</a></li>
                    <li class="menu-bouton"><a href="#">Contactez-nous</a></li>
                    <li class="menu-bouton burger">
                        <img title="Menu" src="./img/burger_icon.svg" alt="Icone menu">
                    </li>
                </ul>
            </nav>
        </header>
        <section id="section-1">
            <article>
                <h3 class="texte-couleur-saumon">UN VOYAGE CULINAIRE GOURMET ET GOURMAND.</h3>
                <h1 class="souligne-texte-rose">Bienvenue<br>au restaurant<br>Jadoo</h1>
                <h5 class="texte-couleur-gris-1">Jadoo vous accueille
dans son ambiance zen et ??pur??e, id??ale pour d??couvrir ou red??couvrir la
 cuisine gastronomique du Chef Junichi IIDA.</h5>
                <button class="bouton jaune">D??couvrir la carte</button>

            </article>
        </section>
        <section id="section-2">
            <div class="conteneur-titres">
                <h4>D??couvrez</h4>
                <h2>Les nouveaut??s Jadoo</h2>
            </div>
            <div id="conteneur-nouveautes" class="conteneur-elements">
                <div class="conteneur-carte conteneur-carte-ligne">
                <?php
                foreach($plats as $plat){
                    ?>
                <article class="carte">
                        <figure>
                            <img title= <?php echo $plat['Nom'] ?> src="./img/<?php echo $plat['Image']?>" alt="Image <?php echo $plat['Nom'] ?>">
                            <figcaption><?php echo utf8_encode ($plat['Description'])?> </figcaption>
                        </figure>
                    </article>
                    <?php  
                }
                ?>
                   <!-- <article class="carte">
                        <figure>
                            <img title="Tsukun??" src="./img/plat_1.png" alt="Image Tsukun??">
                            <figcaption>Boulettes de poulet au gingembre sauce sucr??e sal??e "Tsukun??"</figcaption>
                        </figure>
                    </article>
                    <article class="carte">
                        <figure>
                            <img title="Udon" src="./img/plat_2.png" alt="Image Udon">
                            <figcaption>Nouilles japonaises chaudes ?? base de farine de bl?? "Udon"</figcaption>
                        </figure>
                    </article>
                    <article class="carte">
                        <figure>
                            <img title="Tonkatsu-Teishoku" src="./img/plat_3.png" alt="Image Tonkatsu-Teishoku">
                            <figcaption>??chine de porc pan??e ?? la japonaise "Tonkatsu-Teishoku"</figcaption>
                        </figure>
                    </article>
            -->
                </div>
            </div>
            <div id="conteneur-maki" class="conteneur-elements">
                <div class="conteneur-carte conteneur-carte-ligne">
                <?php
                foreach($makis as $maki){
                    ?>
                <article class="carte">
                        <figure>
                        <img title= <?php echo $maki['Nom'] ?> src="./img/<?php echo $maki['Image']?>" alt="Image <?php echo $maki['Nom'] ?>">
                            <figcaption>
                                <p class="texte-couleur-bleu texte-poppins-bold"><?php echo $maki['Nom']?></p>
                                <p><?php echo $maki['Description']?></p>
                            </figcaption>
                </figure>
                </article>
                <?php
                }
                ?>
                    <!--<article class="carte">
                        <figure>
                            <img title="California Tobiko" src="./img/maki_1.png" alt="Image Tobiko">
                            <figcaption>
                                <p class="texte-couleur-bleu texte-poppins-bold">California Tobiko</p>
                                <p>Saumon, thon, mayonnaise</p>
                            </figcaption>
                        </figure>
                    </article>
                    <article class="carte">
                        <figure>
                            <img title="California Rolls" src="./img/maki_2.png" alt="Image California Rolls">
                            <figcaption>
                                <p class="texte-couleur-bleu texte-poppins-bold">California Rolls</p>
                                <p>Saumon, avocat et mayonnaise</p>
                            </figcaption>
                        </figure>
                    </article>
                    <article class="carte">
                        <figure>
                            <img title="Ebi" src="./img/maki_3.png" alt="Image Ebi">
                            <figcaption>
                                <p class="texte-couleur-bleu texte-poppins-bold">Ebi</p>
                                <p>Crevette, avocat, menthe, coriandre</p>
                            </figcaption>
                        </figure>
                    </article>
                    <article class="carte">
                        <figure>
                            <img title="Ikura Rolls" src="./img/maki_4.png" alt="Image Ikura Rolls">
                            <figcaption>
                                <p class="texte-couleur-bleu texte-poppins-bold">Ikura Rolls</p>
                                <p>Oeufs de saumon</p>
                            </figcaption>
                        </figure>
                    </article>-->
                </div>
            </div>
            <button class="bouton jaune">D??couvrir la carte</button>
        </section>
        <section id="section-3">
            <div class="conteneur-video">
                <img src="./img/visu_video.jpg" alt="Image Pr??visualisation vid??o">
                <div class="video-lecture-bouton">
                    <img title="Lire la vid??o" src="./img/button_play.svg" alt="Bouton lecture">
                </div>
            </div>
            <article>
                <h1 class="souligne-texte-rose">Un voyage<br>gastronomique entre le Japon et la France...</h1>
                <h5>Pass?? par des maisons ??toil??es en France, le
cuisinier japonais s'est forg?? une solide exp??rience dans l'Hexagone :
aujourd'hui franc-comtois d'adoption, il ma??trise aujourd'hui les
m??langes de cultures et de saveurs chaque jour au sein de
                    son restaurant gastronomique.</h5>
            </article>
            <div class="conteneur-illustrations conteneur-carte-ligne">
                <figure class="mobile-illustration">
                    <img src="./img/illustration_chef.jpg" alt="Image chef">
                </figure><!--
                -->
                <figure>
                    <img src="./img/wrapper_illustration_1.jpg" alt="Image plat maki">
                </figure><!--
                --><figure>
                    <img src="./img/wrapper_illustration_2.jpg" alt="Image salle de restauration">
                </figure>
            </div>
        </section>
        <section id="section-4">
            <article>
                <h4>RAPIDE ET PRATIQUE</h4>
                <h2><span class="texte-couleur-saumon">Commandez</span> sur le site Jadoo</h2>
                <div class="conteneur-elements">
                    <div class="conteneur-arguments">
                        <a class="argument" href="#" target="_blank">
                            <figure>
                                <img title="UberEats" src="./img/logo_uberEats.png" alt="Logo UberEats"><!--
                                --><figcaption>
                                    <p class="texte-couleur-sombre texte-poppins-bold">UberEats</p>
                                    <p class="texte-couleur-gris-3">Commandez tous vos plats depuis UberEats</p>
                                </figcaption>
                            </figure>
                        </a>
                        <a class="argument" href="#" target="_blank">
                            <figure>
                                <img title="Jadoo" src="./img/logo_jadoo_1.svg" alt="Logo Jadoo"><!--
                                --><figcaption>
                                    <p class="texte-couleur-sombre texte-poppins-bold">Jadoo.fr</p>
                                    <p class="texte-couleur-gris-3">Ou commandez en ligne sur le site officiel de Jadoo</p>
                                </figcaption>
                            </figure>
                        </a>
                        <figure class="argument">
                            <img title="Livraison rapide" src="./img/logo_transport.png" alt="Logo livreur"><!--
                            --><figcaption>
                                <p class="texte-couleur-sombre texte-poppins-bold">Livraison ultra rapide</p>
                                <p class="texte-couleur-gris-3">Soyez livr?? en 20 minutes maximum</p>
                            </figcaption>
                        </figure>
                    </div>
                    <button  class="bouton jaune" >D??couvrir la carte</button>
                </div>
            </article>
        </section>
        <section id="section-5">
            <h4>PRENDRE RENDEZ-VOUS</h4>
            <h2>Contactez-nous<br>pour r??server au restaurant</h2>
            <div class="conteneur-form">
            
            
                <div class="form-gauche">
                    <h4 class="texte-couleur-noir">Formulaire de contact</h4>
                    <h5 class="texte-couleur-gris-2">Remplissez le formulaire ci-dessous<br>pour nous contacter</h5>
                    <form method="post" action="formulaire.php" >

                        <div class="formulaire-deux-champs-inline">
                            <div class="formulaire-contact-champ">
                                <label for="nom">Nom</label>
                                <input name="nom" type="text" placeholder="Nom" required  maxlenght="40">
                            </div><!--
                            --><div class="formulaire-contact-champ">
                                <label for="prenom">Pr??nom</label>
                                <input name="prenom" type="text" placeholder="Pr??nom" required  maxlenght="40">
                            </div>
                        </div>
                        <div class="formulaire-contact-champ">
                            <label for="mail">Adresse e-mail</label>
                            <input name="email" type="mail" placeholder="monAdresseMail@gmail.com" required  maxlenght="255">
                        </div>
                        <div class="formulaire-contact-champ">
                            <label for="prenom">Message</label>
                            <input name="message" type="text" placeholder="Votre message/demande de r??servation" required min="18" >
                        </div>
                        
                        <button id='b1' class="bouton bleu formulaire-boutton-envoyer" value="Submit">
                            <img src="./img/bouton_formulaire_coche.svg" alt="Icon coche">
                            <span>Envoyer</span>
                        </button>
                        
                    </form>
                </div><!--
                --><div class="form-droite"></div>
            </div>
        </section>
        <footer>
            <div class="conteneur-elements">
                <section id="footer-logo" class="footer-part">
                    <div class="logo complet">
                        <img title="Jadoo, un voyage culinaire gourmet et gourmand" src="./img/logo_jadoo_1.svg" alt="Logo jadoo"><!--
                        --><img title="Jadoo, un voyage culinaire gourmet et gourmand" src="./img/logo_jadoo_2.svg" alt="Jadoo">
                    </div>
                    <p class="texte-couleur-gris-bleu">Un voyage gastronomique entre<br>le Japon et la France</p>
                </section><!--
                --><section id="footer-plan" class="footer-part">
                    <div class="plan-restaurant">
                        <p class="texte-poppins-bold plan-title">Restaurant</p>
                        <p class="texte-couleur-gris-bleu"><a href="#">Nouveaut??s</a></p>
                        <p class="texte-couleur-gris-bleu"><a href="#">D??couvrir</a></p>
                        <p class="texte-couleur-gris-bleu"><a href="#">Commander</a></p>
                    </div>
                    <div class="plan-contact">
                        <p class="texte-poppins-bold plan-title">Contact</p>
                        <p class="texte-couleur-gris-bleu"><a href="#">Prendre RDV</a></p>
                    </div>
                </section><!--
                --><section id="footer-uberEats" class="footer-part">
                    <img class="logo-ubereat" title="UberEats" src="./img/logo_uberEats_2.svg" alt="Logo UberEats">
                    <p class="texte-couleur-gris-bleu">T??l??chargez UberEats</p>
                    <button class="app-download-button bouton">
                        <img src="./img/logo_google_play.svg" alt="Logo Google Play"><!--
                        --><span>GOOGLE PLAY</span>
                    </button>
                    <button class="app-download-button bouton">
                        <img src="./img/logo_apple.svg" alt="Logo Apple"><!--
                        --><span>APPLE STORE</span>
                    </button>
                </section>
            </div>
            <p class="copyright texte-couleur-gris-bleu">Tous droits r??serv??s @jadoo.com</p>
        </footer>
    </main>


</body></html>