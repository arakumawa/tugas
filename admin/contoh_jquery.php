<html>
	<head>
		<script type="text/javascript" src="jquery.js"></script>
		<style type="text/css">
			#objek{ width:700px; height:100px; border:2px solid black; background-color:gold;}
		</style>		
	</head>
	<body>
		<button type="button" onclick="javascript: $('#objek').hide(750);">Hide
		</button>
		<button type="button" onclick="javascript: $('#objek').show(750);">Show
		</button>
		<button type="button" onclick="javascript: $('#objek').slideUp(750);">Slide Up</button>
		<button type="button" onclick="javascript: $('#objek').slideDown(750);">Slide Down</button>
		<button type="button" onclick="javascript: $('#objek').slideToggle(750);">Slide Toggle</button>
		<button type="button" onclick="javascript: $('#objek').fadeOut(750);">Fade Out</button>
		<button type="button" onclick="javascript: $('#objek').fadeIn(750);">Fade In
		</button>
		<button type="button" onclick="javascript: $('#objek').fadeTo(750, 0.2);">Fade To
		</button>
		<button type="button" onclick="javascript: $('#objek').fadeTo(750, 0.9);">Fade to Again</button>
		<button type="button" onclick="javascript: 
		for(i=0; i<10; i++){
		$('#objek').animate({width:800}, 200);
		$('#objek').animate({height:80}, 400);
		$('#objek').animate({width:1}, 200);
		$('#objek').animate({height:1}, 200);
		}
		">Animasi</button>
		
		<div id="objek"></div>
	</body>
</html>