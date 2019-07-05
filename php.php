<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <?php
    
    echo "Hello world, ceci est le cours php de Thibault et Julie va tout déchirer!!!!!"
    ?>

</head>

<body>
    <form name="formContact" onsubmit="return validationFormulaire()">
        <!-- après validation, mon fichier sera envoyer dans la page php indiqué dans cette action-->

        <label for="nom">Nom :</label>&nbsp;&nbsp;&nbsp;
        <input type="text" name="nom" placeholder="Quel est votre nom?" autofocus /><br><br>

        <label for="prenom">Prénom :</label>&nbsp;&nbsp;&nbsp;
        <input type="text" name="nom" placeholder="Quel est votre prénom?" /><br><br>

        <label for="mail">Mail :</label>&nbsp;&nbsp;&nbsp;
        <input type="mail" name="nom" placeholder="Quel est votre mail?" /><br><br>

        <label for="téléphone">Téléphone : </label>&nbsp;&nbsp;&nbsp;
        <input type="tel" name="nom" placeholder="Quel est votre numéro de téléphone?" size="30px" /><br><br>

        <label for="messages">Messages :</label>&nbsp;&nbsp;&nbsp;
        <textarea cols="50" rows="20" name="messageContact" placeholder="Un truc à me dire?"></textarea><br><br>

        <label for="donnees"> Vous nous autorisez à conserver vos données?</label>
        <input type="checkbox" name="donnees" value="oui"> oui
        <input type="checkbox" name="donnees" value="non"> non


        <br><br><br><br>
        <input type="submit" value="Valider" />
    </form>
</body>

</html>
