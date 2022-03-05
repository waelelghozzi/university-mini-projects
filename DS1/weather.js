
//le code de selection des villes depuis la map
var k=document.querySelectorAll('.sec2 svg path');

let longm;
let latm;
let cord;
var c=document.querySelectorAll('.close-c');
var aff=document.querySelector('.cli_c');
var minia=document.querySelector('.cli_c2');
    for (let j in k) {
        


        k[j].addEventListener('mouseover', ()=>{
            minia.innerHTML=k[j].getAttribute("name");
        });    

    k[j].addEventListener('click', ()=>{
        

        for (let i=0;i<23;i++) {
            
 
                if(k[i].style.fill=="rgba(24, 24, 24, 0.89)"){
                k[i].style.fill="";}}
                ser.value="Search for a location";



aff.innerHTML=k[j].getAttribute("name");
s1_t.innerHTML=k[j].getAttribute("name");

cord = get_cord(k[j].getAttribute("name"));
longm=cord.substr(0,cord.indexOf(','));
latm=cord.substr(cord.indexOf(',')+1,cord.length);

//appel api
AppelAPI(longm,latm);


if(j==0){
    c[0].innerHTML=k[j++].getAttribute("name");
    c[1].innerHTML=k[j+2].getAttribute("name");
    c[2].innerHTML=k[j+3].getAttribute("name");
}
else if(j==21){
    c[0].innerHTML=k[j--].getAttribute("name");
    c[1].innerHTML=k[j-2].getAttribute("name");
    c[2].innerHTML=k[j-3].getAttribute("name");
}
else if((j<23)&&(j>0)){
    c[0].innerHTML=k[j++].getAttribute("name");
    c[1].innerHTML=k[j--].getAttribute("name");
    c[2].innerHTML=k[j-2].getAttribute("name");
}});}

