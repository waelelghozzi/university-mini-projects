//i used node.js to get the output.. no html needed
let v="chanter";
let ac="eur";
let acteur= v.replace("er",ac);
let ver=v.substr(0,5)+"e";

let text=v+" : "+" le "+acteur+" "+ver;
console.log(text);