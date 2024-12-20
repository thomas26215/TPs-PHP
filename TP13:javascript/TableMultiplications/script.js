let nombre = prompt("Choisissez un nombre");
nombre = parseInt(nombre);



function genererTable(n){
    let resultat = ""
    for(let i = 1; i < 11; i++){
        resultat += `${n} x ${i} = ${n*i}\n`;
    }return resultat;
}

let tableMultiplication = genererTable(nombre);

let preElement = document.getElementsByTagName("pre")[0];

preElement.textContent = tableMultiplication;
