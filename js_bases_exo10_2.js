let tab=["chanter","manger","acheter","apporter"];

let ac="eur";
let acteur;
let ver;
let text;
tab.forEach((v)=>{ 
    acteur= v.replace("er",ac);
ver=v.substr(0,v.length-2)+"e";
text=v+" : "+" le "+acteur+" "+ver;console.log(text);
});

