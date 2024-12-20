//////////////// Partie Vue  ///////////////////////

let input = document.getElementsByTagName("input")[0];
let output = document.getElementsByTagName("output")[0];
let button = document.getElementsByTagName("button")[0];

let view = {
    read: function(){return Number(input.value)},
    update: function(value){output.textContent = value.toString()},
    addEventListener: function(callback){button.addEventListener("click", callback)}
}

export {view}
