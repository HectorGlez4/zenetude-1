<?php
	session_start();
	if (isset($_GET['erreur'])){
		echo "<script>alert('Erreur d\'authentification !');</script>";
	}
	include_once('./PageView.php');
	include_once('../controller/PageController.php');

	$pageController = new PageController();
	$pageView = new PageView();
?>
  <!DOCTYPE html>
  <html>
    <body>
		
		<?php
			$pageView -> showMetas();
		 	$pageController -> controlHeader();
		    $pageController -> controlScrollMenu();
	    ?>

		<div class="container">
        	<!-- Page Content goes here -->
        	<div class="row row1">

        	  <?php
        	  	$pageController -> controlIndexDescription();
		      	$pageController -> controlMenu();
		      ?>
		    </div>
        	<div class="row">
		      <div class="col s12 m8">
		        <div class="card-panel teal" id="bloc2">
		        	<div class="card-title"> <h3>Title</h3></div>
		          <p>I am a very simple card. I am good at containing small bits of information.
		          I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.I am a very simple card. I am good at containing small bits of information.
		          I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.I am a very simple card. I am good at containing small bits of information.
		          I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.I am a very simple card. I am good at containing small bits of information.
		          I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
		          </p>
		        </div>
		      </div>

		     <?php
		     	$pageView->showCalendar();
		     ?>
    		</div>

    	</div>
    </div>
    	<!-- FIN CONTAINER -->

 		<?php
	     	$pageView->showFooter();
     ?>


		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="../../js/materialize.min.js"></script>
		<script type="text/javascript" src="../../js/menu.js"></script>
		<script src="../../js/underscore-min.js"></script>
		<script src="../../js/moment-2.2.1.js"></script>
		<script src="../../js/clndr.js"></script>
		<script src="../../js/site.js"></script>
		<script type="text/javascript" src="../../js/fonctions.js"></script>
		<script type="text/javascript">

			 $(function(){
			   $(window).scroll(function () {//Au scroll dans la fenetre on déclenche la fonction
			      if ($(this).scrollTop() > 200) { //si on a défilé de plus de 200px du haut vers le bas
			      	document.getElementById('scroll-nav').style.top='0px';
			      } else{
			      	document.getElementById('scroll-nav').style.top='-200px';
			      }
			   });
			 });

			window.onload=ajuste;
				function ajuste(){
				document.getElementById('aside1').style.minHeight=document.getElementById('bloc1').offsetHeight+"px";
				document.getElementById('aside2').style.minheight=document.getElementById('calendar').offsetHeight+"px";
			}

		</script>
    </body>
  </html>
