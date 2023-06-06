<?php
require_once './inc/init.inc.php';
require_once './inc/haut.inc.php';
//-------------------------------- TRAITEMENTS PHP ------------------------------//
if($_POST)
{

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    // // preg_match verifier les caractères utilisés dans le pseudo
    // $verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo']);
    // // Si le pseudo contient des mauvais caractère ou si le pseudo ne respacte pas une certainer longeur = erreur 
    // if(!$verif_caractere || iconv_strlen($_POST['pseudo']) < 3 || iconv_strlen($_POST['pseudo']) > 30)
    // {
    //     $contenu .= "<div class='alert alert-danger text-center'>🛑 Une erreur s'est produite ! Le Pseudo doit contenir entre 3 et 30 caractères inclus.<br> Caractères acceptés : lettres de A à Z et chiffres de 0 à 9</div>";
    // }
    // else
    // {
    //     // On fait une requete de sélection pour voir si le pseudo existe déja en bdd
    //     $membre = executeRequete("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");
    //     // si num_rows supérieur a 0 un pseudo à été trouvé en base dc erreur
    //     if($membre->num_rows > 0)
    //     {
    //         $contenu .= "<div class='alert alert-danger text-center'>🛑 Le Pseudo est déjà utilisé ! Veuillez choisir un autre Pseudo svp. </div>";
    //     }
    //     else
    //     {
    //         // on boucle sur le tableau $_POST et on applique un addslashes et un htmlentities sur les valeurs
    //         foreach($_POST AS $indice => $valeur)
    //         {
    //             $_POST[$indice] = htmlentities(addslashes($valeur));  
    //         }
    //         // ici on crypte le mot de passe
    //         // doc mdp = https://www.php.net/manual/fr/faq.passwords.php
    //         $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    //         // ici on exécute la requête d'insertion du membre en bdd
    //         executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse) VALUES ('$_POST[pseudo]', '$_POST[mdp]', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[civilite]', '$_POST[ville]', '$_POST[code_postal]', '$_POST[adresse]')");
    //         // ici on félicite l'utilisateur et on l'informe que l'inscription est un succès
    //         $contenu .= "<div class='alert alert-success text-center'>✅ Félicitation ! Vous êtes maintenant inscrit sur le site. Vous pouvez vous connecter en     <a href=\"connexion.php\" class=\"btn btn-warning\">Cliquant ici</a></div>";
    //     }
    // }
    if(!empty($_POST['email']) && !empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['lastname']) && !empty($_POST['firstname']))
    {
    // on place les informations de $_POST dans des variables plus simple d'écriture et on applique au passage un trim() pour enlever les espaces en début et en fin de chaine.
    $email = trim($_POST['email']);
    $pseudo = trim($_POST['pseudo']);
    $password = $_POST['password'];
    $lastname = trim($_POST['lastname']);
    $firstname = trim($_POST['firstname']);

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $resultat = $pdo->prepare("INSERT INTO user (nickname, lastname, firstname, email, password, createdAt) VALUES (:marqueur, :marqueur2, :marqueur3, :marqueur4, :marqueur5,  NOW())");
    $resultat->bindParam(':marqueur', $pseudo, PDO::PARAM_STR);
    $resultat->bindParam(':marqueur2', $lastname, PDO::PARAM_STR);
    $resultat->bindParam(':marqueur3', $firstname, PDO::PARAM_STR);
    $resultat->bindParam(':marqueur4', $email, PDO::PARAM_STR);
    $resultat->bindParam(':marqueur5', $passwordHash, PDO::PARAM_STR);
    $resultat->execute();


    // si on rafraichit la page, les données seront re envoyées par l'html et multiplie les enregistrements.
    // Pour éviter ce souci, on va demander à PHP de recharger la page ce qui permettra de ne pas resoumettre le formulaire.
    // header('location:url); fonction prédéfinie permettant de rediriger vers une page (qui peut etre la même)
    // Attention !! comme pour setcookie() & session_start(), cette fonction doit être exécutée AVANT le moindre affichage dans la page sinon erreur !
    $contenu .= "<div class='alert alert-success text-center'>✅ Félicitation ! Vous êtes maintenant inscrit sur le site. Vous pouvez vous connecter en     <a href=\"connexion.php\" class=\"btn btn-warning\">Cliquant ici</a></div>";
    }
}
?>


<div class="jumbotron text-center mt-4">
    <h2>Inscription</h2>
</div>

<div class="container mt-5">
    <?php
        echo $contenu;
    ?>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form action="" method="POST">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
                    <div class="form-floating">
                        <input type="email" class="form-control" name="email" id="floatingInputGroup1" placeholder="E-mail" required>
                        <label for="floatingInputGroup1">E-mail</label>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="pseudo" id="floatingInputGroup1" placeholder="Username">
                        <label for="floatingInputGroup1">Pseudo</label>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="floatingInputGroup1" placeholder="Username">
                        <label for="floatingInputGroup1">Mot de passe</label>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-circle-info"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="lastname" id="floatingInputGroup1" placeholder="Username">
                        <label for="floatingInputGroup1">Nom</label>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-circle-info"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="firstname" id="floatingInputGroup1" placeholder="Username">
                        <label for="floatingInputGroup1">Prénom</label>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-warning">✅ Confirmer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once './inc/bas.inc.php';