<?php

class ManagerJoueurs{
    private $con;

    public function __construct($con){
        $this->setDb($con);
    }

    public function ajouter(Joueur $jou){

        $qver = $this->con->prepare('SELECT id, nom, prenom FROM joueur WHERE nom=:nom'); 
       $n= $jou->getNom();
        $qver->execute(array(':nom'=>$n));  
        $rows = $qver->rowCount();

//if(!($re->equals($jou))){}

    if($rows==0){
             $q = $this->con->prepare('INSERT INTO joueur(nom,prenom,score) VALUES(:nom,:prenom,:score)');
        $q->bindvalue(':nom',$jou->getNom());
        $q->bindValue(':prenom',$jou->getPrenom());

        $q->bindValue(':score',$jou->getsc());
        $q->execute();
        return 0;
    }
    else{
        return 1;
    }
       
}

public function zero($n){
    $qver = $this->con->prepare('SELECT id, nom, prenom FROM joueur WHERE nom=:nom'); 

     $qver->execute(array(':nom'=>$n)); 
 
    $rows = $qver->rowCount();
if($rows==0){
    return false;
}else{
    return true;}} 




    public function eff(Joueur $jou){
        $q = $this->con->prepare('DELETE from joueur where nom=:nom AND prenom=:prenom');
        $q->bindvalue(':nom',$jou->getNom());
        $q->bindValue(':prenom',$jou->getPrenom());
        $q->execute();
    }
    
    public function update(Joueur $jou){
        $q = $this->con->prepare('UPDATE joueur SET nom where nom=:nom AND prenom=:prenom');
        $q->bindvalue(':nom',$jou->getNom());
        $q->bindValue(':prenom',$jou->getPrenom());
        $q->execute();
    }

    public function update_score(Joueur $jou,$c,$m){
     
        if($c==1){
       
               $q = $this->con->prepare('UPDATE joueur SET score=score+:sc 
               where nom=:nom AND prenom=:prenom');   
        }
        else{
          
               $q = $this->con->prepare('UPDATE joueur SET score=score-:sc 
               where nom=:nom AND prenom=:prenom;
               
               UPDATE joueur SET score=0
               where score<0;
               ');     
        }
     
        $q->bindvalue(':nom',$jou->getNom());
        $q->bindValue(':prenom',$jou->getPrenom());
        //echo $jou->getSc();
        $q->bindValue(':sc',$m);
        $q->execute();
    }



    public function res(Joueur $jou){

               $q = $this->con->prepare('UPDATE joueur SET score=:sc 
               where nom=:nom AND prenom=:prenom');
   
        $q->bindvalue(':nom',$jou->getNom());
        $q->bindValue(':prenom',$jou->getPrenom());
        //echo $jou->getSc();
        $q->bindValue(':sc',10);
        $q->execute();
    }

  
public function recup($info){
$q = $this->con->prepare('SELECT id, nom, prenom FROM joueur WHERE nom=:nom'); 
$q->execute(array(':nom'=> $info)); 
return new Joueur ($q->fetch (PDO :: FETCH_ASSOC));}



public function rep_p(){
    $sqlQuery = 'SELECT DISTINCT(nom), prenom, score FROM joueur WHERE score>0 ORDER BY score DESC';
    $recipesStatement = $this->con->prepare($sqlQuery);
    $recipesStatement->execute();
    $j = $recipesStatement->fetchAll();
  return $j;}
  public function rep_r(){
    $sqlQuery = 'SELECT DISTINCT(nom), prenom, score FROM joueur WHERE score=0 ';
    $recipesStatement = $this->con->prepare($sqlQuery);
    $recipesStatement->execute();
    $j = $recipesStatement->fetchAll();
  return $j;}



    public function setDb(PDO $con){
        $this->con = $con;
    }
}
?>