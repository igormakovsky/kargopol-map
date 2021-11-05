<?php   
$id = 'kargopol';
$title = 'Каргополь — фамильные истории';
require dirname(__FILE__).'/vars.php';
require $docroot . 'includes/top.php';
?>

<style>
	html,
	body {
		background-color: white;
	}
</style>

<article>
	<iframe width="100%" height="100%" src="https://maphub.net/embed/166440?panel=1&panel_closed=1" frameborder="0"></iframe>
</article>

<!-- <article>
	<pinch-zoom class="absolute" min-scale='0.25' max-scale='1.5'>
		<div style="height:4746px; width:8993px;">
			<img src="/img/kargopol-map-opt.webp" alt="">
			<div class="absolute object" style="top:1578px; left:3692px;">
				<img style="height:110px;" src="/img/kargopol-house-1.svg" alt="">
			</div>

		</div>
	</pinch-zoom>
</article> -->

<?php
require $docroot . 'includes/bottom.php';
?>