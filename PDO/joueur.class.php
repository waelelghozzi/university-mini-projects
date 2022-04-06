
<?php

/** Classe Joueur en PHP */


class Joueur{

protected $id;
protected $nom;
protected $prenom;

public function __construct(array $donnees)
 {$this->hydrate($donnees);}
              
 public function hydrate(array $donnees) {
    foreach ($donnees as $key => $value){ 
        $method = 'set'.ucfirst($key);
    if (method_exists($this, $method)){$this->$method($value);}
      }}


    public function setld($id) { $this->id = $id; }
    public function setNom($nom) { $this->nom =$nom; }
    public function setPrenom($prenom) { $this->prenom = $prenom; }

    public function getld(){ return $this->id;}
    public function getNom(){ return $this->nom;}
    public function getPrenom(){ return $this->prenom;}

    public function afficheJoueur(){
    echo "Le joeur numéro:" .$this->getld(). "appelé " .$this->getPrenom(). " " . $this->getNom();
    }}

?>