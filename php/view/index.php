<?php

	session_start();

	if (isset($_GET['erreur'])){
		echo "<script>alert('Erreur d\'authentification !');</script>";
	}

	if (isset($_GET['refus'])){
		session_destroy();
		echo "<script>alert('Vous avez refuser l\'accès au réseau social !');</script>";
	}

    if (isset($_GET['failure'])){
        session_destroy();
        echo "<script>alert('Une erreur s\'est produite. Veuillez réessayer ultérieurement');</script>";
    }

    if (isset($_GET['incrip'])){
        echo "<script>alert('Veuillez vous inscrire avant de vous connecter avec les réseaux sociaux !');</script>";
    }


	include_once('./pageview.php');
	include_once('../controller/pagecontroller.php');

	$pageController = new PageController();
	$pageView = new PageView();
?>
  <!DOCTYPE html>
  <html>
    <body>
		
		<?php
			$pageView -> showHead("Accueil");
		 	$pageController -> controlHeader();
		    $pageController -> controlDynamicMenu();
	    ?>
        
        <div id="filtre"></div>

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
		        	<div class="card-title"> <h3>Titre</h3></div>
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
    	<!-- FIN CONTAINER -->

 		<?php
	     	$pageView->showFooter();
	     	$pageView->showjavaLinks();
     	?>

    </body>
  </html>
