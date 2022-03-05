

//le code de selection des villes de bar des villes
for (let s in c) {
    c[s].addEventListener('click', ()=>{
        aff.innerHTML=c[s].innerHTML;
        s1_t.innerHTML=c[s].innerHTML;
cord = get_cord(c[s].innerHTML);
longm=cord.substr(0,cord.indexOf(','));
latm=cord.substr(cord.indexOf(',')+1,cord.length);
AppelAPI(longm,latm);
       
        for (let i in k) {
            if(k[i].style.fill=="rgba(24, 24, 24, 0.89)"){
                k[i].style.fill="";
            }


            if(k[i].getAttribute("name")==c[s].innerHTML){
                k[i].style.fill="rgba(24, 24, 24, 0.89)";
            }
        }
    });}