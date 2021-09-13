$(function () {

    Draggable.create(".drag", {
        type: "x,y",
        edgeResistance: 0.65,
        bounds: "body",
        //zIndexBoost: false,
        throwProps: true
    });

    Draggable.create(".spin", {
        type: "rotation",
        ease: Strong.easeOut,
        throwProps: true
    });

    Draggable.create(".scrollvert", {
        type: "scrollTop",
        edgeResistance: 0.5,
        throwProps: true
    });

    Draggable.create(".scrollhor", {
        type: "scrollLeft",
        edgeResistance: 0.5,
        throwProps: true
    });

    Draggable.create(".scroll", {
        type: "scroll",
        edgeResistance: 0.5,
        throwProps: true,
        allowNativeTouchScrolling:false 
        
    });
    
    
    /*var myElement = document.getElementById('myElement');

var mc = new Hammer.Manager(myElement);

// create a pinch and rotate recognizer
// these require 2 pointers
var pinch = new Hammer.Pinch();
var rotate = new Hammer.Rotate();

// we want to detect both the same time
pinch.recognizeWith(rotate);

// add to the Manager
mc.add([pinch, rotate]);


mc.on("pinch rotate", function(ev) {
    myElement.textContent += ev.type +" ";
});*/


});


