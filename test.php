<?php   
$id = 'index';
$title = 'scrollable';
require dirname(__FILE__).'/vars.php';
require $docroot . 'includes/top.php';
?>


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
  height: 85%;
  width: 85%;
  padding: 1em;
  overflow: hidden;
  font-family: "Trebuchet Ms", helvetica, sans-serif;

  a:link,
  a:visited {
    position: absolute;
    top: 85%;
    right: 10%;
    color: #ddd;
    text-decoration: none;
  }

  img {
    width: 400px !important;
  }
}
</style>



    <script type="text/javascript">

   
    </script>


<article class="drag" id='stage'>

    <div style="height:400px; width:400px; background-color:grey;">
       
    </div>

</article>




<?php
require $docroot . 'includes/bottom.php';
?>
