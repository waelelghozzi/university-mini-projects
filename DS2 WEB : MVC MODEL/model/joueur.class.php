
<?php

/** Classe Joueur en PHP */


class Joueur{

protected $id;
protected $nom;
protected $prenom;
public $sc;

public function __construct(array $donnees)
 {$this->hydrate($donnees);}
              
 public function hydrate(array $donnees) {
    foreach ($donnees as $key => $value){ 
        
      $method = 'set'.ucfirst($key);
    
      if (method_exists($this, $method)){
        $this->$method($value);}
      }}


    public function setld($id){ $this->id = $id; }
    public function setNom($nom){ $this->nom =$nom; }
    public function setPrenom($prenom){ $this->prenom = $prenom; }
    public function setSc($sc){ $this->sc = $sc; }

    public function getld(){ return $this->id;}
    public function getNom(){ return $this->nom;}
    public function getPrenom(){ return $this->prenom;}
    public function getSc(){ return $this->sc;}

    public function equals(joueur $out){
if($out instanceof joueur){
if(($this->nom==$out->nom)&&($this->prenom==$out->prenom)){
   return true;
}else{
  return false;
}}}


    public function afficheJoueur(){
    echo "Le joeur numéro:" .$this->getld(). "appelé " .$this->getPrenom(). " " . $this->getNom();
    }}

?>