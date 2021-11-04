<?php   
$id = 'index';
$title = 'scrollable';
require dirname(__FILE__).'/vars.php';
require $docroot . 'includes/top.php';
?>

<style>
	html,
	body {
		background-color: white;
	}
</style>

<div class="absolute rotates" style="left:3rem; top:3rem; width: 1rem; height: 4rem; background-color:blue;">
</div>

<article>
	<pinch-zoom class="absolute" min-scale='0.25' max-scale='1.5'>
		<div style="height:4746px; width:8993px;">
			<img src="/img/kargopol-map-opt.webp" alt="">
			<div class="absolute object" style="top:2155px; left:4834px;">
				<img src="/img/kargopol-house-1.svg" alt="">
			</div>

		</div>
	</pinch-zoom>
</article>

<?php
require $docroot . 'includes/bottom.php';
?>