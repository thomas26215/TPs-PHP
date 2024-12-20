import {view} from "./View.js";
import {model} from "./Model.js";

function onGenerate(){
    let numberOut = model.generate(1, 7);
    view.update(numberOut);
}

view.addEventListener(onGenerate);
