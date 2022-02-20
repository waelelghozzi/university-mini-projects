let tab=["chanter","manger","acheter","apporter","appauvrir","arrondir"];
let pp=["je","tu","il","nous","vous","ils"];
let mc1=["e","es","e","ons","ez","ent"];
let mc2=["is","is","it","issons","issez","issent"];
let ac="eur";
let acteur;
let ver;
let text;


function dif(ver){
    tab.forEach((v)=>{
if((v.indexOf("er")==v.length-2)&&(v==ver))
    return(1);
else if((v.indexOf("ir")==v.length-2)&&(v==ver))
    return(2);
    });}
    
    var verbe="élargir";
    tab.push(verbe);

let ppi;
let i=0;
    pp.forEach((v)=>{
ppi="";
ppi+="("+v+") la terminaison en 1er groupe: "+mc1[i]+"\n et en 2eme groupe: "+mc2[i]+"\n";
console.log(ppi);
i++;
});

var g;
let aff;
let aff1;
let j=0;
  aff="";
    aff1="";
tab.forEach((v)=>{ 
g=dif(v);

if(g===1){console.log('ok');
    acteur= v.replace("er",mc1[j]);
    ver=v.substr(0,v.length-2)+"e";
    text=v+" : "+" le "+acteur+" "+ver;
aff1="le nom du verbe: "+v+"\n le groupe de verbe: "+g+"\n"+text+"\n";
console.log(aff1);

acteur= v.replace("ir",mc1[j]);
    aff=pp[j]+" : "+acteur;
    console.log(aff);j++;
}
else{
    acteur= v.replace("ir",mc2[j]);
    aff=pp[j]+" : "+acteur;
    console.log(aff);j++;
};

});
