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
            <input type="submit" value="ajouter 10 score" name="aj"/>
            <input type="submit" value="dim 10 score" name="dic"/>
            <input type="submit" value="get score" name="get"/>
            <input type="submit" value="reset score" name="res"/>
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
    $jou = new Joueur(array('nom'=>$_POST['n'],'prenom'=>$_POST['p'],'Sc'=>0));
    $manager->ajouter($jou);
}
if(isset($_POST['eff']) && isset($_POST['n']) && isset($_POST['p'])){
    $jou = $manager->recup($_POST['n']);
    $manager->eff($jou);
}

if(isset($_POST['aj']) && isset($_POST['n']) && isset($_POST['p'])){
    $jou = $manager->recup($_POST['n']);
  
    
    $manager->update_score($jou,1);
}

if(isset($_POST['dic']) && isset($_POST['n']) && isset($_POST['p'])){
    $jou = $manager->recup($_POST['n']);
    
   
    $manager->update_score($jou,0); 
}
if(isset($_POST['res']) && isset($_POST['n']) && isset($_POST['p'])){
    $jou = $manager->recup($_POST['n']);
    $manager->res($jou); 
}

if(isset($_POST['get']) && isset($_POST['n']) && isset($_POST['p'])){
    $jou = $manager->recup($_POST['n']);

}


?>

</form> 
</body>
</html>