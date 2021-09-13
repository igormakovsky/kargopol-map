<!-- bower -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>

<!-- greensock -->
<script src="bower_components/gsap/src/minified/TweenMax.min.js"></script>
<script src="bower_components/gsap/src/minified/utils/Draggable.min.js"></script>

<!-- custom -->
<script src="js/drag.js"></script>
<script src="js/navigation.js"></script>
<script src="js/throwpropsplugin.min.js"></script>
<script src="js/common.js"></script>
<script src="js/custom.js"></script>
<script src="js/pinch-zoom.js" type="text/javascript"></script>

<!-- hammer.js -->
<!-- <script src="http://hammerjs.github.io/dist/hammer.min.js" type="text/javascript"></script> -->
<!-- <script>

	function ignoreEvent(e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		if (e.preventManipulation) {
			e.preventManipulation();
		}
		return false;
	}

	document.addEventListener("touchstart", ignoreEvent, false);
	document.addEventListener("pointerdown", ignoreEvent, false);

	document.body.addEventListener('touchmove', function (event) {
		event.preventDefault();
	}, false);
	let stage = document.getElementById('stage');

	let mc = new Hammer.Manager(stage);
	let pan = new Hammer.Pan();
	let rotate = new Hammer.Rotate();
	let pinch = new Hammer.Pinch();

	mc.add([pan, pinch, rotate]);
	mc.get('pinch').set({
		enable: true
	});
	mc.get('rotate').set({
		enable: true
	});

	let adjustDeltaX = 0;
	let adjustDeltaY = 0;
	let adjustScale = 1;
	let adjustRotation = 0;

	let currentDeltaX = null;
	let currentDeltaY = null;
	let currentScale = null;
	let currentRotation = null;

	mc.on("panstart pinchstart rotatestart", function (e) {
		adjustRotation -= e.rotation;
	});

	mc.on("panmove pinchmove rotatemove", function (e) {
		currentRotation = adjustRotation + e.rotation;
		currentScale = adjustScale * e.scale;
		currentDeltaX = adjustDeltaX + (e.deltaX / currentScale);
		currentDeltaY = adjustDeltaY + (e.deltaY / currentScale);

		let transforms = ['scale(' + currentScale + ')'];
		transforms.push('translate(' + currentDeltaX + 'px,' + currentDeltaY + 'px)');
		transforms.push('rotate(' + Math.round(currentRotation) + 'deg)');
		stage.style.transform = transforms.join(' ');
	});

	mc.on("panend pinchend rotateend", function (e) {
		adjustScale = currentScale;
		adjustRotation = currentRotation;
		adjustDeltaX = currentDeltaX;
		adjustDeltaY = currentDeltaY;
	});
</script>  -->