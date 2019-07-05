<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    
    
    <?php 
if ($_GET['Email']){
    $adressemail = $_GET['Email'];
    $db = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8','exmachinefmci','carp310M');
    
    $selectall = $db->query('SELECT * FROM delhayeMail WHERE mail="'.$adressemail.'"');
    $result = $selectall->fetch();
    $counttable = (count($result));
    
if ($counttable>=1){
    $delete=$db->prepare('DELETE FROM delhayeMail WHERE mail="'.$adressemail.'"');
$delete->execute();
    
}
echo('Vous êtes bien désabonné de notre liste de diffusion');
}
    
    
    






?>

</head>

<body>
    
</body>
</html>




