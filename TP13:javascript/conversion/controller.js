//////////////// Partie Contrôleur /////////////////

import {view} from "./view.js";
import {model} from "./model.js";

function onConversion(){
    let inp = view.read();
    let out = model.conversion(inp);
    view.update(out);
}

view.addEventListener(onConversion);
