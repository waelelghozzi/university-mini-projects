<!DOCTYPE html>
<html>
    <head> <title>Ajout POO</title>
    <met content="text/html; charset=iso-8859-1"/>
</head>

<body>

    <form action="" method="post">
        <p>
            Nom:<input type="text" name="n" maxlength="30"/>
            Prenom:<input type="text" name="p" maxlength="30"/>
            <input type="submit" value="Créer un joueur" name="creer"/>
            <input type="submit" value="effacer un joueur" name="eff"/>
</p>


<?php

require 'connect.class.php';
require 'joueur.class.php';
require 'manager.class.php';


/*function chargerClasse($classname)
{require $classname.'.class.php';}
spl_autoload_register('chargerClasse');
*/

$manager = new ManagerJoueurs($con);
if(isset($_POST['creer']) && isset($_POST['n']) && isset($_POST['p']))
{
    $jou = new Joueur(array('nom'=>$_POST['n'],'prenom'=>$_POST['p']));
    $manager->ajouter($jou);
}
else if(isset($_POST['eff']) && isset($_POST['n']) && isset($_POST['p'])){
    $jou = new Joueur(array('nom'=>$_POST['n'],'prenom'=>$_POST['p']));
    $manager->eff($jou);
}
?>

</form> 
</body>
</html>