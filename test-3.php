<?php   
$id = 'index';
$title = 'scrollable';
require dirname(__FILE__).'/vars.php';
require $docroot . 'includes/top.php';
?>


<script type="text/javascript" src="/pinch-zoom.umd.js"></script>

    <script type="text/javascript">
      var el = document.querySelector('.pinch-zoom');
      new PinchZoom.default(el, {});
    </script>
<style>body, html {
  text-align: center;
  color: white;
}

body {
  background-color: #333;
  font-family: "Helvetica Neue", "Helvetica", "Arial", sans-serif;
}

div.page {
  max-width: 100vw;
  text-align: left;
}

.pinch-zoom-parent {
  height: 80vh;
  width: 90vw;
}

img {
  height: 90vh;
}

div.pinch-zoom div.description h1 {
  font-size: 40px;
  margin: 0px;
  margin-bottom: 10px;
}

div.pinch-zoom div.description p {
  margin-bottom: 1em;
}

ul {
  margin: 0;
  padding: 0;
}</style>
 <div class="page pinch-zoom-parent">
        <div class="pinch-zoom">
            <div class="description">
                <h1>Pinchzoom.js</h1>
                <p>
                    Multi-touch zoom in Javascript
                </p>
            </div>
            <img src="frog.jpg"/>
        </div>
    </div>

    <script type="text/javascript">
      var el = document.querySelector('div.pinch-zoom');
      new PinchZoom.default(el, {});
    </script>
<?php
require $docroot . 'includes/bottom.php';
?>
