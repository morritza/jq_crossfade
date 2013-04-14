<!DOCTYPE html>
<html>
<head>
	<title>Crossfade more divs</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css?<?=date('sm')?>" />
<script src="jquery-1.7.1.min.js"></script>
<meta name="viewport" content="width=580">
</head>
<body>
	<div class="bg" id="level1">
		<div id="level2" class="bgdefault">
		</div>
		<div id="wrap">
			<div id="bg_layer">
				<div class="opaque img me">					
					<div class="imgclick_wrap">
						
						<img src="slide_1.png" width="" height="" alt="" data-hotspots='{"one": -2.5, "two": 41}' >	
						<a href="#1" class="ht" data-slide="1" style="top:-2.5%; left:41%"></a>
						<a href="#2" class="ht" data-slide="2" style="top:40%; left:-2.5%"></a>
					</div>

					<h2>Seite 1 ----</h2>
					<div class="copy">
						Second branch
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</div>
				</div>

				<div class="img me">
	
					<div class="imgclick_wrap" style="position:relative">
						<a href="#0" class="ht" data-slide="0" style="top:0.75%; left:41%"></a>
						<a href="#2" class="ht" data-slide="2" style="top:40%; left:50%"></a>
						<img src="slide_2.png" width="" height="" alt="" data-hotspots='{"first":-2.5,41,"second":40,-2.5}' >	
					</div>

					<h2>Seite 2</h2>
					<div class="copy">
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non dum diu dum
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
					<div class="copy">
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>

				</div>

				<div class="img me">

					<div class="imgclick_wrap" style="position:relative">
						<a href="#1" class="ht" data-slide="1" style="top:15%; left:41%"></a>
						<a href="#0" class="ht" data-slide="0" style="top:30%; left:10%"></a>
						<img src="slide_3.png" width="" height="" alt="" data-hotspots='{"first":-2.5,41,"second":40,-2.5}' >	
					</div>					

					<h2>Seite 3</h2>
					<div class="copy">
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>

				</div>


			</div>
		</div>

		<div id="ctrl">
			<a href="#" class="target selected" id="s1" >Seite 1</a>
			<a href="#" class="target" id="s2" >Seite 2</a>
			<a href="#" class="target" id="s3" >Seite 3</a>
		</div>
	</div>

	<div style="clear:both"></div>

<script type="text/javascript">
	if (typeof (console) == 'undefined') {
	    console = {
	        info: function () { },
	        dir: function () { },
	        error: function () { },
	        log: function () { }
	    };
	}

	//Initialisieren
	from = 0;
	setTimeout(function(){
	   $('#s1').click();
	}, 100);
	//IE BUG
	$('#level1').removeClass('bg');

	
	$(document).ready(function() {
		//Starten
		$('.me').animate({
				opacity : 0
		}, 100);
		$('#level1').addClass('bg');

		//Klick auf Navi -> löst aus
		$("a.target").click(function() {
			$this = $(this);


			//Altes Bild ausfaden
			$('.me').eq(from).animate({
				opacity : 0
			}, 1000);

			
			//Informationen über neues Bild sammeln
			var newImage = $this.index();
			//console.log(newImage);
			$newimage = $('.me').eq(newImage);

			json_hs_data = $newimage.find('img').data('hotspots');
				


			
			//Anzuzeigendes Bild auswählen und einblenden		    
			$newimage.animate({
				opacity : 1
			}, 1000);

		    
			//HintergrundLogo ändern		    
		    if(newImage==1){	  
		    	fadeLayer("slide_2_bg.png","bg2");
		    }else{
		    	fadeLayer("slide_1_bg.png","bg1");
		    }

		    //Herkunft speichern
		    from = newImage;

		    /*	Controlls verändern		*/
		    $("#ctrl a").removeClass("selected");
		    $(this).addClass("selected");
		});




		$('.ht').click(function(event) {
				/*
				console.log($(this).data('slide'));
				console.log($('.target').eq($(this).data('slide')).text());
				*/
				$('.target').eq($(this).data('slide')).click();
				event.stopPropagation();
		});
	});

	function fadeLayer(nr,bg){
		
		$('#level2').fadeTo('slow', 0, function()
		{
		    $(this).css('background-image', 'url(' + nr + ')');	    
		    
			$(this).attr('class', '');
			$(this).addClass(''+bg);

		}).fadeTo('slow', 1);		
	}
</script>
</body>
</html>