<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport"
        content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
  <title>Pinch Zoom</title>
</head>

<body>

  <div>



    <style>

 .outer {
  margin: 1em;
  display: flex;
  justify-content: center;
  height: 100vh;
}

.container {
        background: #222;
        border: 2px solid #ccc;
        border-radius: 5px;
        height: 70%;
        width: 85%;
        padding: 1em;
        overflow: hidden;
        font-family: "Trebuchet Ms", helvetica, sans-serif;
        
        a:link,
        a:visited {
          position: absolute;
          top: 70%;
          left: 80%;
          color: #ddd;
          text-decoration: none;
        }

        img {
            width: 200px;
        }
    }

    </style>

    <script src="https://hammerjs.github.io/dist/hammer.js"></script>

    <script>
      document.body.addEventListener('touchmove', function(event) {
        event.preventDefault();
      }, false);

      var stage = document.getElementById('stage');
      var mc = new Hammer.Manager(stage);

      var rotate = new Hammer.Rotate();
      var pinch = new Hammer.Pinch();
      var pan = new Hammer.Pan();

      mc.add([pinch, pan, rotate]);
      mc.get('pinch').set({ enable: true })
      mc.get('rotate').set({ enable: true })

      var adjustScale = 1;
      var currentScale = null;
      var currentRotation = null;
      var adjustRotation = 0;

      var adjustDeltaX = 0;
      var adjustDeltaY = 0;
      var currentDeltaX = null;
      var currentDeltaY = null;

      mc.on("pinch pan rotate", function(e) {
        var transforms = [];
        // var rotation = currentRotation + Math.round(e.rotation);

        currentRotation = adjustRotation + Math.round(e.rotation);
        currentScale = adjustScale * e.scale;
        currentDeltaX = adjustDeltaX + (e.deltaX / currentScale);
        currentDeltaY = adjustDeltaY + (e.deltaY / currentScale);

        transforms.push('scale(' + currentScale + ')');
        transforms.push('translate(' + currentDeltaX + 'px,' + currentDeltaY + 'px)');
        transforms.push('rotate('+currentRotation+'deg)');
        stage.style.transform = transforms.join(' ');

      })

      mc.on("panend pinchend rotateend", function(e) {
        adjustScale = currentScale;
        adjustRotation = currentRotation;
        adjustDeltaX = currentDeltaX;
        adjustDeltaY = currentDeltaY;

      })  
    

    </script>

    <div class="outer">
      <div class="container">
        <div>
          <div class="border">
            <img id="stage"
              src="1.jpg"
              class="image" width='100'>
          </div>
        </div>
      </div>
    </div>


  </div>

</body>
</html>