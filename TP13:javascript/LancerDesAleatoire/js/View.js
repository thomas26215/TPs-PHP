let button = document.getElementsByTagName("button")[0];
let output = document.getElementsByTagName("output")[0];

let view = {
    update: function(value){output.textContent = value.toString()},
    addEventListener: function(callback){button.addEventListener("click", callback)}
}

export {view}
