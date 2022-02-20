var t = [8, 12, 9];
var n = ["tata", "tete", "titi"];
var src = ["images.jpg","pp.jpg","profil.jpg"];
window.eleve = new Array; 

// create array des eleves
let i = 0
t.forEach(function(element) {

    eleve.push({ name: n[i], note: element , photo: src[i] });
    i++
  
});

//affichage de array eleve 



eleve.forEach(function(element) {

    document.getElementById("tab").innerHTML += 
    "<tr>" + 
      
    "<th>" + 
        element.name +
         "</th>" + 

         "<th>" + 
         element.note + 
         "</th>" +

          "<th>" +
     '<img height="150px" width="150px" src=" ' + element.photo + '" >' +
      "</th>"+

    "</tr>";
});



define();
function define(){


//note sup a 3achra 
sup();
function sup(){
    let s = eleve.filter(eleve => eleve.note > 10);
document.getElementById("sup").innerHTML ='nombre de note superieures a 10: '+ s.length;
}
//calc moyenne
moy();
function moy(){
    let sum = 0;
eleve.forEach(function(element) {
    sum += element.note;
});
document.getElementById("moy").innerHTML ='moyenne des notes: '+ (sum / eleve.length);
}
// find the max 
max();
function max(){
let max = 0;
eleve.forEach(function(element) {
    if (element.note > max) { max = element.note }
});
document.getElementById("max").innerHTML ='Max: '+ max;
}
// find pos
find();
function find(){
let r = eleve.find(({ note }) => note === 9);
document.getElementById("pos").innerHTML ='9 est present dans le tableau en position  '+ (eleve.indexOf(r) + 1);
}



}







inis();
function inis(){



//trie tab by name
let tb = eleve.sort(function(a, b) {
    var nameA = a.name.toUpperCase();
    var nameB = b.name.toUpperCase();
    if (nameA < nameB) {
        return -1;
    }
    if (nameA > nameB) {
        return 1;
    }
    return 0;
});
var k="";
tb.forEach(function(element) {
   k += 
    "<tr>" + 
      
    "<th>" + 
    element.name +
         "</th>" + 

         "<th>" + 
         element.note + 
         "</th>" +

          "<th>" +
     '<img height="150px" width="150px" src=" ' + element.photo + '" >' +
      "</th>"+

    "</tr>";
});
document.getElementById("tab_trie_name").innerHTML=k;

//trie tab by note 
let tr = eleve.sort((a, b) => a.note - b.note);
k="";
tr.forEach(function(element) {
k +=  "<tr>" + 
      
    "<th>" + 
    element.name +
         "</th>" + 

         "<th>" + 
         element.note + 
         "</th>" +

          "<th>" +
     '<img height="150px" width="150px" src=" ' + element.photo + '" >' +
      "</th>"+

    "</tr>";
});
document.getElementById("tab_trie_note").innerHTML=k;
return(tr);
}
function affiche_eleve_tri(){
    tr= inis();
    var nom =prompt('saisire un nom');
    var t_n = tr.filter(element=> element.name==nom) ;
    console.log(t_n);


    
    if(t_n.length===0){
        alert('eleve ne exciste pas');
        document.getElementById("rech").innerHTML = "";
    }
    else{
        document.getElementById("rech").innerHTML = 
        
          "<tr> <th>prenome</th> <th>notes</th> <th>photos</th> </tr> " +

        "<tr>" + 
      
        "<th>" + 
            t_n[0].name +
             "</th>" + 
    
             "<th>" + 
             t_n[0].note + 
             "</th>" +
    
              "<th>" +
         '<img height="150px" width="150px" src=" ' + t_n[0].photo + '" >' +
          "</th>"+
    
        "</tr>";
    }
}

function add(){
    
    var n2=prompt('saisire nom');
    var no=parseInt(prompt('saisire note'));
    window.eleve.push({ name: n2 , note: no , photo: src[src.length-1] });
    console.log(eleve[eleve.length-1]);

    document.getElementById("tab").innerHTML += 
    "<tr>" + 
      
    "<th>" + 
        eleve[eleve.length-1].name +
         "</th>" + 

         "<th>" + 
      eleve[eleve.length-1].note + 
         "</th>" +

          "<th>" +
     '<img height="150px" width="150px" src=" ' + eleve[eleve.length-1].photo + '" >' +
      "</th>"+

    "</tr>";

  
  inis();
  define();
;}
//affivhe eleve ou total tab
function affiche_eleve(){
    alert('affichage totale ou une selle case ? 0 si total 1 si non');
    var ch =parseInt(prompt('saisie le choix'));

    if(ch==1){
 
           var name =prompt('saisie le nom');
    }
   let i=0;
     window.eleve.forEach((element)=>{
        if((ch==1)&&(element==name)){
            console.log(document.querySelectorAll('.tab')[i].innerHTML);
        }
        else if(ch==0){
            console.log(document.querySelectorAll('.tab')[i].innerHTML);
        }
        i++;
    });}
  