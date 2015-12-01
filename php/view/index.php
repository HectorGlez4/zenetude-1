<?php
	session_start();
ini_set('display_errors', 1);
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
			$pageView -> showHead();
		 	$pageController -> controlHeader();
		    $pageController -> controlDynamicMenu();
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
    	<!-- FIN CONTAINER -->

 		<?php
	     	$pageView->showFooter();
	     	$pageView->showjavaLinks();
     	?>

    </body>
  </html>
