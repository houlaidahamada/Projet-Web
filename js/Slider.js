var slider = document.getElementById("min");
var output = document.getElementById("value");

output.InnertHTML = slider.value;

slider.oninput = function (){
    output.innerHTML = this.value;

}

var slider2 = document.getElementById("max");
var output2 = document.getElementById("value2");

output.InnertHTML = slider2.value;

slider2.oninput = function (){
    output2.innerHTML = this.value;

}