<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    
    <script type="text/javascript">
    function validationFormulaire(){
var x = document.forms["formContact"]["messageContact"].value;
if (x==null || x== ""){
alert("Vous avez oublié d’insérer un message");
return false;
}
}
</script>
    
    
    <?php
    
    
    
    
    if (isset($_POST['envoi']))
    {if (!isset($_POST['messageContact']) || $_POST['messageContact']=='')
           {
               echo('vous n\'avez pas mis de message');
           }
    
     else {
//         assignation de la variable mail si aucun adresse mail renseignée
         if (!isset($_POST['Email']) || $_POST['Email']=='')
  //on veut savoir si le client a renseigné son adresse mail         
        {
         $_POST['Email']='';
         }
         
// veut dire que si le client ne renseigne pas son mail, notre mail part quand même, il n'y aura pas d'erreur sur la page. 
//si on voulait obligatoirement l'adresse mail du client et que de ce fait notre mail ne parte pas, on met à la place un echo vous n'avez pas rensiegne votre mail. Le mail ne partira pas tant qu'il n'aura pas renseigné son mail. 
         elseif (isset($_POST['autorisation']))
         {
             $adressemail = $_POST['Email'];
             $db = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8','exmachinefmci','carp310M');
//pour se connecter à la base de donnée
                 $result =$db->prepare('INSERT INTO delhayeMail (mail) VALUES (:adresseMail)');
//             delhayeMail = c'est le nom de ma table créée dans la base de donnée de Thibault'

             $result->execute(array('adresseMail' => $adressemail));
             //             pour insérer l'adresse mail dans la base de donnée'
             
         
         
         
        $message = 'Vous avez reçu un message via notre site internet, le voici : ;<br>' . $_POST['messageContact'];
//             Texte qui s'affiche dans le mail'
         
         $_headers = 'MIME-Version: 1.0' . "\r\n";
         $_headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
         $_headers .= 'From: '.$_POST['Email']."\r\n" . 'Reply-To: '.$_POST['Email'] . "\r\n".'X-Mailer: PHP/' . phpversion();
         
         mail('julie_delhaye@hotmail.com','Formulaire de contact',$message,$headers);
         
//         confirmation
         echo('Votre message a été envoyé;<br>');}
                   }
        }
    
  
    ?>

</head>

<body>
   <form name="formContact"  method="post" action="contact.php" onsubmit="return validationFormulaire ()">
<!--
    onsubmit... c'est pour java
    method et action... c'est pour php
-->
     
       
       <label for="nom">Nom :</label>&nbsp;&nbsp;&nbsp;
       <input type="text" name="nom" placeholder="Quel est votre nom?" autofocus/><br><br>
       
       <label for="prenom">Prénom :</label>&nbsp;&nbsp;&nbsp;
       <input type="text" name="nom" placeholder="Quel est votre prénom?"/><br><br>
       
       <label for="Email">Mail :</label>&nbsp;&nbsp;&nbsp;
       <input type="Email" name="Email" placeholder="Quel est votre mail?"/><br><br>
       
       <label for="téléphone">Téléphone : </label>&nbsp;&nbsp;&nbsp;
       <input type="tel" name="nom" placeholder="Quel est votre numéro de téléphone?" size="30px"/><br><br>
       
       <label for="message">Messages :</label>&nbsp;&nbsp;&nbsp;
       <textarea cols="50" rows="20" name="messageContact" placeholder="Un truc à me dire?"></textarea><br><br>
<!--       name="messageContact".. c'est ta variable php-->
       
       <label for="autorisation"> j'accepte que vous conserviez mes données?</label>
       <input type="checkbox" name="autorisation" value="oui"> 
<!--       name="autorisation" c'est pour que tu saches à quoi correspond le oui ou le non quand tu reçois les réponses de ton formulaires et si c'est oui le mail du client part dans la base de données-->
   

       <br><br><br><br>
       <input type="submit" name="envoi" value="Valider"/>
<!--       name="envoi" c'est pour php, pour vérifier que le client a appuyer sur le bouton valider-->
    </form>
</body>
</html>


