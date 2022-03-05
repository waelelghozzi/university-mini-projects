

//api
const API = '3e3e6cd006556958dc50714768af5013';
var resApi;
// les variables du linterface
var temp=document.querySelector('.value1');
var feels=document.querySelector('.value2');
var cloud=document.querySelector('.value3');
var humidity=document.querySelector('.value4');
var wind_speed=document.querySelector('.value5');
var rain=document.querySelector('.value6');
var info=document.querySelector('.info');
var body=document.querySelector('body');
//selection des divs de interface
var s1=document.querySelector('.sec1');
var s2=document.querySelector('.sec2');
var num=document.querySelector('.num');
var s1_t=document.querySelector('.s1');
var s2_t=document.querySelector('.s2');

//selection de bouton de affichage 
var weekly_b=document.querySelector('.d1');
// selection du div de weekly weather
var weekly=document.querySelector('.details-week');
// selection du div de daily weather
var cur=document.querySelector('.details');

//inisialisation du date systeme
var today = new Date();
s2_t.innerHTML=today.getFullYear()+' /'+(today.getMonth()+1)+' /'+today.getDate();

// les variables interface des jours de la semaine (reste)
var week_n=document.querySelectorAll('.rest div span');
var week_im=document.querySelectorAll('.rest div img');

//les variables interfaces de premier jour du la semaine
var first_nv=document.querySelector('.nv');
var first_img=document.querySelector('.img');
var first_temp=document.querySelector('.temp');
var feels_img=document.querySelector('.svg');

// table de jours
var days=document.querySelectorAll('.co div span');
let t= new Array(7);
t[0]="Sunday";
t[1]="Monday";
t[2]="Tuesday";
t[3]="Wednesday";
t[4]="Thursday";
t[5]="Friday";
t[6]="Saturday";

var a = new Date();
r=a.getDay();
ik=0;
do{
    if(r==6){
        r=0;
    }
    if(r==-1){
        r=6;
    }
days[ik].innerHTML=t[r];
r++;
ik++;
}while(ik<6);

//les cordinations des villes
let tun={
    'Tozeur':'9.87,37.29',
    'Manubah':'10.10111,36.80778',
    'Béja':'9.18333,36.73333',
    'Ben Arous':'10.2222,36.75333',
    'Bizerte':'9.87,37.29',
    'Kassérine':'8.83,35.18',
    'Le Kef':'8.71,36.19',
    'Jendouba':'8.77944,36.50111',
    'Nabeul':'10.73333,36.45',
    'Tunis':'10.17972,36.80278',
    'Gabès':'10.11667,33.88333',
    'Siliana':'9.36667,36.08333',
    'Sidi Bou Zid':'9.49361,35.04028',
    'Sfax':'10.76028,34.74056',
    'Mahdia':'11.07,35.52',
    'Sousse':'10.64111,35.82556',
    'Kairouan':'10.1,35.68',
    'Kebili':'8.97361,33.70194',
    'Zaghouan':'10.14,36.4',
    'Gafsa':'8.78417,34.425',
    'Monastir':'10.82,35.79',
    'Tataouine':'10.45,32.93333',
    'Ariena':'10.19556,36.8625',
    'Médenine':'10.49,33.35'
     }
//retour de cord gov
     function get_cord(name){
return(tun[name]);
     }

if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(position =>{
       // console.log(position);
        let long = position.coords.longitude;
        let lat = position.coords.latitude;
        AppelAPI(long,lat);
    
    },()=> {
        alert( "Vous avez refusé la géolocalisation, l'application ne peur pasfonctionner, veuillez l'activer.!");

    });
}
//la fonction du api
function AppelAPI(long,lat){
  
   fetch('https://api.openweathermap.org/data/2.5/onecall?lat='+lat+'&lon='+long+'&exclude=minutely&units=metric&appid='+API).then((rep)=>{
return rep.json();
   }).then((data)=>{
    resApi = data; 
    console.log(data.daily);

temp.innerHTML=Math.trunc(data.current.temp)+"°";



//inisialisation des valeur du premier jour de semaine
num.innerHTML=Math.trunc(data.current.temp)+"°";
feels.innerHTML=data.current.weather[0].description;
cloud.innerHTML=data.current.clouds+'%';
humidity.innerHTML=data.current.humidity+'%';
wind_speed.innerHTML=data.current.wind_speed+' Km/h';

//boucle qui change les valeurs pour node list de reste des jours(images)
i=1;
j=0;
first_temp.innerHTML="Feels like "+data.daily[0].feels_like.day+"°";

if (data.daily[0].weather[0].description.indexOf('cloud')!=-1){
    first_img.src="icons8-partly-cloudy-day-64.png";
    }
    else if(data.daily[0].weather[0].description.indexOf('sun')!=-1){
        first_img.src="icons8-partly-cloudy-day-64 (2).png";
    }
    else if(data.daily[0].weather[0].description.indexOf('rain')!=-1){
        first_img.src="icons8-rain-64.png";
    }
    else{
        first_img.src="icons8-clouds-64.png";
    }

    //boucle qui change les valeurs pour node list de reste des jours(data)
week_n.forEach((v)=>{

    if (data.daily[i].weather[0].description.indexOf('cloud')!=-1){
        week_im[j].src="icons8-partly-cloudy-day-64.png";
       // body.style.background="url(paul-gilmore-KT3WlrL_bsg-unsplash.jpg)";
        }
        else if(data.daily[i].weather[0].description.indexOf('sun')!=-1){
            week_im[j].src="icons8-partly-cloudy-day-64 (2).png";
           // body.style.background="url(tom-barrett-hgGplX3PFBg-dunsplash.jpg)";
        }
        else if(data.daily[i].weather[0].description.indexOf('rain')!=-1){
            week_im[j].src="icons8-rain-64.png";
           // body.style.background="url(valentin-muller-bWtd1ZyEy6w-unsplash.jpg)";
        }
        else{
            week_im[j].src="icons8-clouds-64.png";
           // body.style.background="url(davies-designs-studio-G-6kwVnClsE-unsplash.jpg)";
        }
    v.innerHTML="temp "+data.daily[i].feels_like.day+"°<br>";
    v.innerHTML+="Rain "+data.daily[i].clouds+"% <br>";
   j++;
    i++;
});
// changer la valeur de advice selon la temp
if((data.current.temp<12)&&(data.current.temp>8)){
    rain.innerHTML="You better wear a coat ❤️";
}
else if(data.current.temp<8){
    rain.innerHTML="A worm cup of coffy should help ❤️";
}
else if((data.current.temp>19)&&(data.current.temp<23)){
    rain.innerHTML="Perfect weather for a walk 🚶";
}
else{
    rain.innerHTML="Keep being heidrated 💦";

}})}


//affichage des divs (map)
info.addEventListener("click",()=>{
if(s1.style.opacity=="1"){
    s1.style.opacity="0";
    s2.style.opacity="1";
}
else{
    s2.style.opacity="0";
    s1.style.opacity="1";
}
    
    });

//selection de bare de recherche
let ser=document.querySelector('.ser');

//manipulation de bare de recherche
ser.addEventListener("focus",()=>{
ser.value="";
});
ser.addEventListener("blur",()=>{
    if(ser.value==""){
        ser.value="Search for a location";
    }
    else{
        for (let i in k) {

            if(k[i].style.fill=="rgba(24, 24, 24, 0.89)"){
                k[i].style.fill="";
            }
            if(k[i].getAttribute("name")==ser.value){
                k[i].style.fill="rgba(24, 24, 24, 0.89)";
                aff.innerHTML=k[i].getAttribute("name");
                s1_t.innerHTML=ser.value;
                cord = get_cord(ser.value);
                longm=cord.substr(0,cord.indexOf(','));
latm=cord.substr(cord.indexOf(',')+1,cord.length);
AppelAPI(longm,latm);

            }
        }
    }

    });

//le affichage des divs (week ou day)
    weekly_b.addEventListener('click',()=>{


if(weekly.style.display=="flex"){
    weekly.style.display="none";
    cur.style.display="flex";
    weekly_b.style.color="rgba(230, 230, 230, 0.52)"; 
}
else{
    weekly_b.style.color="rgba(151, 151, 151, 0.52)";
    weekly.style.display="flex";
    cur.style.display="none";
}
    });