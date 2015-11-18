<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Nekrofilth</title>
        <meta name="description" content="Nekrofilth">
        <meta name="author" content="Zack Rose">
        <link rel="stylesheet" href="style.css">
        <script src="js/jquery-2.1.4.js"></script>
        <script>
		$(document).ready(function() { 
			$('a.siteintro').click(function(e){
				e.preventDefault();
				var urlBase = window.location.href.substring(0, location.href.lastIndexOf("/")+1)
				var gotolink = urlBase + $(this).attr('href');

				$("body").animate({backgroundColor: "#000000", opacity: 0 }, 1500, function() {
				  window.location = gotolink
				});

			});
		});
    </script>

</head>
<body class="siteintro">

<main>
	<a class="siteintro" href="main.php">
		<img src="images/backgrounds/devilsbreath-logo.jpg" />
	</a>
</main>

</body>
</html>