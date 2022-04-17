<?php

class ManagerJoueurs{
    private $con;

    public function __construct($con){
        $this->setDb($con);
    }

    public function ajouter(Joueur $jou){
            $q = $this->con->prepare('INSERT INTO joueur(nom,prenom,score) VALUES(:nom,:prenom,:score)');
        $q->bindvalue(':nom',$jou->getNom());
        $q->bindValue(':prenom',$jou->getPrenom());
        $q->bindValue(':score',$jou->getsc());
        $q->execute();
    }

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

    public function update_score(Joueur $jou,$c){
     
        if($c==1){
       
               $q = $this->con->prepare('UPDATE joueur SET score=score+:sc 
               where nom=:nom AND prenom=:prenom');   echo $c;
        }
        else{
          
               $q = $this->con->prepare('UPDATE joueur SET score=score-:sc 
               where nom=:nom AND prenom=:prenom');
               echo $c;
        }
     
        $q->bindvalue(':nom',$jou->getNom());
        $q->bindValue(':prenom',$jou->getPrenom());
        //echo $jou->getSc();
        $q->bindValue(':sc',10);
        $q->execute();
    }



    public function res(Joueur $jou){

               $q = $this->con->prepare('UPDATE joueur SET score=:sc 
               where nom=:nom AND prenom=:prenom');
   
        $q->bindvalue(':nom',$jou->getNom());
        $q->bindValue(':prenom',$jou->getPrenom());
        //echo $jou->getSc();
        $q->bindValue(':sc',0);
        $q->execute();
    }

  
public function recup($info){
    $q = $this->con->prepare('SELECT id, nom, prenom FROM joueur WHERE nom=:nom');
    $q->execute(array(':nom'=> $info)); 
  return new Joueur ($q->fetch (PDO :: FETCH_ASSOC));
}


    public function setDb(PDO $con){
        $this->con = $con;
    }
}
?>