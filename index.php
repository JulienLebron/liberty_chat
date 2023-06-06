<?php
require_once 'inc/init.inc.php';

// print_r($pdo);


// Liberty Chat

// 01 - Créer une BDD "dialogue"
// 02 - Créer une table "commentaire" contenant les champs suivant
    // - id_commentaire PK AI INT(3)
    // - nickname VARCHAR(255)
    // - message TEXT
    // - date_enregistrement DATETIME
// 03 -  Créer un formulaire pour l'enregistrement des messages
// 04 - Controles et un enregistrement des données dans la BDD (requete d'insertion des données)
// 05 - Récupération des données pour un affichage en html  (requete SELECT)
// 06 - Mise en forme (boostrap)
// 07 - Sécurité

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

if(!empty($_POST['message']))
{
    // on place les informations de $_POST dans des variables plus simple d'écriture et on applique au passage un trim() pour enlever les espaces en début et en fin de chaine.
    $nickname = trim($_SESSION['membre']['nickname']);
    $message = trim($_POST['message']);
    $color = $_POST['exampleColorInput'];

    $message = htmlentities($message);

    $resultat = $pdo->prepare("INSERT INTO message (nickname, color, message, createdAt) VALUES (:marqueur, '$_POST[exampleColorInput]', :marqueur2, NOW())");
    $resultat->bindParam(':marqueur', $nickname, PDO::PARAM_STR);
    $resultat->bindParam(':marqueur2', $message, PDO::PARAM_STR);
    $resultat->execute();


    // si on rafraichit la page, les données seront re envoyées par l'html et multiplie les enregistrements.
    // Pour éviter ce souci, on va demander à PHP de recharger la page ce qui permettra de ne pas resoumettre le formulaire.
    // header('location:url); fonction prédéfinie permettant de rediriger vers une page (qui peut etre la même)
    // Attention !! comme pour setcookie() & session_start(), cette fonction doit être exécutée AVANT le moindre affichage dans la page sinon erreur !
    header('location: ./');
}
// 05 Récupération de tous les commentaires
$reponse_bdd = $pdo->query("SELECT * FROM message ORDER BY createdAt DESC");
require_once './inc/haut.inc.php';
?>

        <div class="container mt-5">
            <div class="container-music mb-3">
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1DX9sIqqvKsjG8?utm_source=generator&theme=0" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <h2>Les derniers messages</h2>
                    <div class="row mt-3">
                            <?php
                            while($dataMessage = $reponse_bdd->fetch(PDO::FETCH_ASSOC))
                            {
                                echo "<div class='card mb-3'><div class='card-header' style='background-color: $dataMessage[color];'>";
                                    echo "<div class='message_date'><b>$dataMessage[nickname]</b> - $dataMessage[createdAt]</div></div>";
                                    echo '<div class="card-body">';
                                    echo "<p class='card-text'>$dataMessage[message]</p>";
                                echo '</div></div>';
                            }
                            ?>
                    </div>
                </div>
                <div class="col-md-5">
                    <h2>Participer</h2>
                    <div class="row mt-3">
                        <div class="col mx-auto">
                            <?php
                            if(internauteEstConnecte())
                            {
                                ?>
                            <form action="" method="post">
                                <div class="mb-3">
                                        <label for="exampleColorInput" class="form-label">Choisir une couleur :</label>
                                        <input type="color" class="form-control form-control-color"
                                            id="exampleColorInput" value="#563d7c" title="Choose your color"
                                            name="exampleColorInput" style="height: 40px;">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Votre message :</label>
                                    <textarea name="message" id="message" rows="10" required="required"
                                        class="form-control"></textarea>
                                </div>
                                <div class="col">
                                    <input type="submit" value="Valider" class="w-100 btn btn-success">
                                </div>
                            </form>
                            <?php
                            }
                            else 
                            {
                            ?>
                                <div class="join__img">
                                    <img src="./asset/img/join.jpg" alt="">
                                </div>
                                <div class="alert alert-info" role="alert">
                                    <div class="alert__icon">
                                        <i class="fa-solid fa-circle-info fa-beat"></i>
                                    </div>
                                    <div class="alert__message">
                                        <a href="./connexion.php">Connecter vous pour envoyer un message.</a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
require_once './inc/bas.inc.php';
