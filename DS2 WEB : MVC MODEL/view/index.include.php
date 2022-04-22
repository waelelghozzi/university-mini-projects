<!DOCTYPE html>
<html lang="en">
<head>
    <link href="index.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 
  
</head>
<body>
    <form action="" method="POST">

    <section class="s1">
        <div class="d1">

<?php
session_start();
require '../controller/connect.class.php';
require '../model/joueur.class.php';
require '../controller/manager.class.php';


if(isset($_POST['c'])&&isset($_POST['n']) && isset($_POST['p'])){
    if($_POST['n']!=""){
         $_SESSION["name"]=$_POST['n'];
    }

      $m = rand(1,10);
}
echo "<span class='title'>Odd and even game ! <br>
        Try to guess ".$_SESSION["name"]. "</span><br>
";
?>



<div class="game">
   
    <div class="cont">
 <div class="g1"><img src="../images/let-me-guess-feeling.gif" alt="" class="ges"></div>
    <div class="g2">
    <input class="ine" type="submit" value="even" name="even" />
            <input class="ino" type="submit" value="odd" name="odd" />
    </div>
    </div>
</div>

    

        </div>
        <div class="d2">

               <?php  
              /* if(isset($_POST['dep'])){
                     $m = rand(1,10);}*/
 
          $manager = new ManagerJoueurs($con);

      if(isset($_POST['af'])){

          $j= $manager->rep_p();
          $e="<div class='DBc'><span class='DB1'>Les joueurs actives :</span>";
                        foreach ($j as $player) {
                            $e= $e."<span class='DB'>
                                    Player Name : ".$player['nom'].
                                    "<br> Player Lastname : ".$player['prenom'].
                                    "<br> Score : ".$player['score'].
                                    "</span><br>";}
                                     echo $e."</div>";

                                     $j= $manager->rep_r();
                                     $e="<div class='DBc'><span class='DB1'>Les joueurs non actives :</span>";
                                            foreach ($j as $player) {
                                                     $e= $e."<span class='DB'>
                                                        Player Name : ".$player['nom'].
                                                        "<br> Player Lastname : ".$player['prenom'].
                                                        "<br> Score : ".$player['score'].
                                                        "</span><br>";}
                                                         echo $e."</div>";}?>


        </div>
    </section>
    <div class="card">

        <div class="wrapper">
  <input  class="in1" type="text" name="n" maxlength="30" value="Nom"/>
        <input class="in21" type="text" name="p" maxlength="30" value="Prenom"/>
            <input class="in2" type="submit" value="Créer un joueur" name="creer"  />
            <input class="in2" type="submit" value="Effacer joueur" name="eff"     />
            <input class="in2" type="submit" value="Reset score" name="res"        />
            <div class="cb">
                <input  class="in22" type="button" value="Deparer !" name="dep"/>
                <div class="c">confirmer lacces au compte ? <input type="checkbox" name="c"></div>
            </div>
            
            <input  class="in22" type="submit" value="afficher scores !" name="af" />
            
         

        </div>

      <?php

 
  
   
 
  



          if(isset($_POST['creer']) && isset($_POST['n']) && isset($_POST['p'])&&($_POST['n']!="") && ($_POST['p']!="")&&($_POST['n']!="Nom") && ($_POST['p']!="Prenom"))
           {
        if(($_POST['n']!="")&&($_POST['p']!="")){

   $jou = new Joueur(array('nom'=>$_POST['n'],'prenom'=>$_POST['p'],'Sc'=>10));
                   $_SESSION["name"]=$_POST['n'];}

            $res= $manager->ajouter($jou);
            if($res==0){

                $nom='Nom: ';
                     $Prenom='Prenom: ';
                     echo'<div class="dr"><span class="aff2">'.$nom.$jou->getNom().'</span><br>';
                     echo'<span class="aff2">'.$Prenom.$jou->getPrenom().'</span></div>';
            }else{
                echo'<br><br><span class="aff2">joueur deja existe dans la base</span><br>';
            }
                
                     
                }

               
if(isset($_POST['dep'])&& isset($_POST['n']) && isset($_POST['p'])){  

    $_SESSION["name"]=$_POST['n'];
    $jou = $manager->recup($_POST['n']);

    $nom='Nom: ';
    $Prenom='Prenom: ';
    echo'<div class="dr"><span class="aff2">'.$nom.$jou->getNom().'</span><br>';
    echo'<span class="aff">'.$Prenom.$jou->getPrenom().'</span></div>'; 
   
   }

   if(isset($_POST['eff']) && isset($_POST['n']) && isset($_POST['p'])){
    if($manager->zero($_POST['n'])){
        $jou = $manager->recup($_POST['n']);
         $manager->eff($jou);  
         echo "
         <div class='dr'><span class='aff2'>le joueur ".$_POST['n']." etait effacé</span>";
    }else{
        echo "
        <div class='dr'><span class='aff2'>le joueur ".$_POST['n']." n'existe pas</span>";}}


if(isset($_POST['res']) && isset($_POST['n']) && isset($_POST['p'])){

    if($manager->zero($_POST['n'])){
        $jou = $manager->recup($_POST['n']);
      $manager->res($jou); 
      echo "
        <div class='dr'><span class='aff2'>le score du ".$_POST['n']." etait inisialisé</span>";
    }else{
        echo "
        <div class='dr'><span class='aff2'>le joueur ".$_POST['n']." n'existe pas</span>";}}





   if(isset($_POST['even'])){
 
    if($manager->zero($_POST['n'])){
        $jou = $manager->recup($_SESSION["name"]);
        $_SESSION["name"]=$_POST['n'];

      if(($m % 2)==0){
                     $manager->update_score($jou,1,$m);
                     echo "
                     <div class='dr'><span class='aff2'> le nombre etait : $m </span>
                     <br>
                     <span class='aff2'>le joueur ".$_SESSION["name"]." a ganer </span>
                     ";}
                     
                   else{
                    $manager->update_score($jou,0,$m);     
                    echo "
                    <div class='dr'><span class='aff2'> le nombre etait : $m </span>
                    <br>
                    <span class='aff2'>le joueur ".$_SESSION["name"]." n'a pas ganer </span>
                    ";}}}

         

   if(isset($_POST['odd'])){

    if($manager->zero($_POST['n'])){
        $jou = $manager->recup($_SESSION["name"]);
        $_SESSION["name"]=$_POST['n'];

      if(($m % 2)==1){
                     $manager->update_score($jou,1,$m);
                     echo "
                     <div class='dr'><span class='aff2'> le nombre etait : $m </span>
                     <br>
                     <span class='aff2'>le joueur ".$_SESSION["name"]." a ganer </span>
                     ";}
                     
                   else{
                    $manager->update_score($jou,0,$m);     
                    echo "
                    <div class='dr'><span class='aff2'> le nombre etait : $m </span>
                    <br>
                    <span class='aff2'>le joueur ".$_SESSION["name"]." n'a pas ganer </span>
                    ";}}}?>

    </div>
    
<?php


if(isset($_POST['get']) && isset($_POST['n']) && isset($_POST['p'])){
    $jou = $manager->recup($_POST['n']);

}

if(isset($_POST['dep']) && isset($_POST['n']) && isset($_POST['p'])){
    $jou = $manager->recup($_POST['n']);
  // echo $_SESSION["name"];
}?>


</form>
</body>    
<script src="index.js"></script>
</html>
