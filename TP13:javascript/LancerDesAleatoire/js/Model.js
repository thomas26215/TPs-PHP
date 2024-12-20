let model = {
    generate: function(min, max){
        return Math.random() * (max - min) + min;
    }
}

export {model}
