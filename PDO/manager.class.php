<?php

class ManagerJoueurs{
    private $con;

    public function ___construct($con){
        //$this->setDb($con);
        $this->con = $con;
    }

    public function ajouter(Joueur $jou){
   /*     $q = $this->con->prepare('INSERT INTO joueur(nom,prenom) VALUES(:nom,:prenom)');
        $q->bindvalue(':nom',$jou->getNom());
        $q->bindValue(':prenom',$jou->getPrenom());
        $q->execute();*/

        $q='INSERT INTO joueur(nom,prenom) VALUES('.$jou->getNom().','.$jou->getPrenom().')';
        $q->execute();
    }

    public function eff(Joueur $jou){
        $q='DELETE from joueur where nom='.$jou->getNom().'AND prenom='.$jou->getPrenom().'';
        $st=$this->connect()->prepare($q);
        $st->execute();
    }


    public function setDb(PDO $con){
        $this->con = $con;
    }
}
?>