let game =document.querySelector('.cont');
let ine =document.querySelector('.ine');
let ino =document.querySelector('.ino');
let in1 =document.querySelector('.in1');
let in21 =document.querySelector('.in21');

let dr =document.querySelector('.dr');




in1.addEventListener('focus',()=>{
   
    if(in1.value=="Nom"){
        in1.value="";
   }
});
in1.addEventListener('blur',()=>{
    
    if(in1.value==""){
        in1.value="Nom";
   }
});

in21.addEventListener('focus',()=>{
    if(in21.value=="Prenom"){
        in21.value="";
   }
});
in21.addEventListener('blur',()=>{
    if(in21.value==""){
        in21.value="Prenom";
   }
});

    let card =document.querySelector('.card');

let dep=document.querySelector('.in22');
/**/
dep.addEventListener('click',()=>{

   k=false;
   for(i=0;i<=1;i++){
       if(((in1.value)=="")|| ( (in21.value)=="" )||((in1.value)=="Nom")|| ( (in21.value)=="Prenom" )){
           k=true;
       }}
   
    if((k==false)||(dr.value!="")){
         card.style.display="none";
game.style.display="flex";
    }
    else{
        for(i=0;i<=1;i++){
            if((in1[i].value)==""){
               in1.style.border='dashed red';
            }}
    }
       
    

});