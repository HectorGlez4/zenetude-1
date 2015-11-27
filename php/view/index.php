<?php

ini_set('display_errors', 1);

	if (isset($_GET['erreur'])){
		echo "<script>alert('Erreur d\'authentification !');</script>";
	}

	if (isset($_GET['logout'])){
		session_destroy();
		echo "<script>alert('Déconnexion !');</script>";
	}


?>
  <!DOCTYPE html>
  <html>
    <head>
    	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<!--Import Roboto Font-->
    	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>
		<!--Import style.css-->
		<link type="text/css" rel="stylesheet" href="../../css/style.css"/>
		<!--Import menu.css-->
		<link type="text/css" rel="stylesheet" href="../../css/menu.css"/>

		<!-- CALENDAR -->
	  <link rel="stylesheet" href="../../css/clndr.css" type="text/css" />
		<link type="text/css" rel="stylesheet" href="../../css/calendar.css"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

		<nav>
		  <div class="nav-wrapper">
		    <a href="" class="brand-logo"><img src="../../img/logo.png" alt="logo du site"></a>
		    <img src="../../img/name.png" alt="Zenetude, titre du site">
		    <div id="hamburger2" class="hamburglar is-closed">

			    <div class="burger-icon">
			      <div class="burger-container">
			        <span class="burger-bun-top"></span>
			        <span class="burger-filling"></span>
			        <span class="burger-bun-bot"></span>
			      </div>
			    </div>
			    
			    <!-- svg ring containter -->
			    <div class="burger-ring">
			      <svg class="svg-ring">
				      <path class="path" fill="none" stroke="#7BBA42" stroke-miterlimit="10" stroke-width="4" d="M 34 2 C 16.3 2 2 16.3 2 34 s 14.3 32 32 32 s 32 -14.3 32 -32 S 51.7 2 34 2" />
			      </svg>
			    </div>
			    <!-- the masked path that animates the fill to the ring -->
			    
			 		<svg width="0" height="0">
			       <mask id="mask">
			    <path xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#ff0000" stroke-miterlimit="10" stroke-width="4" d="M 34 2 c 11.6 0 21.8 6.2 27.4 15.5 c 2.9 4.8 5 16.5 -9.4 16.5 h -4" />
			       </mask>
			     </svg>
			    <div class="path-burger">
			      <div class="animate-path">
			        <div class="path-rotation"></div>
			      </div>
			    </div>
			      
			  </div>
		  </div>
		</nav>

		<nav id="menu" class="center-align">
			<ul>
				<img src="../../../img/avatar.png" alt="avatar.png" class="circle responsive-img"/><br/>Vous n'êtes pas connecté(e)
				<li><a class="color" href="">Se connecter</a></li>
				<li><a class="color" href="">S'inscrire</a></li>
			</ul>
		</nav>

		<nav id="scroll-nav">
		  <div class="nav-wrapper">
		    <a href="" class="brand-logo"><img src="../../img/logo.png" alt="logo du site"></a>
		    <img src="../../img/name.png" alt="Zenetude, titre du site">
		    <div id="hamburger" class="hamburglar is-closed">

			    <div class="burger-icon">
			      <div class="burger-container">
			        <span class="burger-bun-top"></span>
			        <span class="burger-filling"></span>
			        <span class="burger-bun-bot"></span>
			      </div>
			    </div>
			    
			    <!-- svg ring containter -->
			    <div class="burger-ring">
			      <svg class="svg-ring">
				      <path class="path" fill="none" stroke="#7BBA42" stroke-miterlimit="10" stroke-width="4" d="M 34 2 C 16.3 2 2 16.3 2 34 s 14.3 32 32 32 s 32 -14.3 32 -32 S 51.7 2 34 2" />
			      </svg>
			    </div>
			    <!-- the masked path that animates the fill to the ring -->
			    
			 		<svg width="0" height="0">
			       <mask id="mask">
			    <path xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#ff0000" stroke-miterlimit="10" stroke-width="4" d="M 34 2 c 11.6 0 21.8 6.2 27.4 15.5 c 2.9 4.8 5 16.5 -9.4 16.5 h -4" />
			       </mask>
			     </svg>
			    <div class="path-burger">
			      <div class="animate-path">
			        <div class="path-rotation"></div>
			      </div>
			    </div>
			      
			  </div>
		  </div>
		</nav>


		<div class="container">
        	<!-- Page Content goes here -->


        	<div class="row row1">
		      <div class="col s12 m8">
		        <div class="card-panel teal" id="bloc1">
		        	<div class="card-header"> <h2>Accueil</h2></div>
		          <p>I am a very simple card. I am good at containing small bits of information.
		          I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.I am a very simple card. I am good at containing small bits of information.<br/><br/>

		          I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.I am a very simple card. I am good at containing small bits of information.<br/><br/>

		          I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.I am a very simple card. I am good at containing small bits of information.
		          </p>
		        </div>
		      </div>


		      <div class="col s12 m4">
		        <div class="card-panel teal" id="aside1">
		          <div class="card-header"> <h2>Connexion</h2></div>

                  <!-- Formulaire -->
			        <form class="col s10 push-s1" action="connexion.php" method="POST">
			
			
			          <!-- Contenu card -->
			          <div class="card-content">
			
			          <!-- email -->
			          <div class="row">
			            <div class="input-field col s12">
			              <input id="email" type="email" class="validate" name="EMAIL">
			              <label for="email">Email</label>
			            </div>
			          </div><!-- fin email -->
			
			          <!-- mot de passe -->
			          <div class="row">
			            <div class="input-field col s12">
			              <input id="passe" type="password" class="validate" name="PASSE">
			              <label for="passe">Mot de passe</label>
			            </div>
			          </div><!-- fin mot de passe -->
			
			        </div><!-- Fin contenu card -->
			
			        	<div class="card-action  center-align bouton-connection">
				          
				          <input class="btn connexion" type="submit" value="Se connecter" />
			            </div>
			<?php
				include('socialmedia.php');

			?>
			        </form><!-- Fin formulaire -->
			        <p class="connexion"><a href="inscription.php" class="left">S'inscrire</a><a href="recuperation.php" class="right">Mot de passe oublié</a></p>
		      </div>
    		</div>
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

		      <div class="col s12 m4">
		        <div class="card-panel teal" id="aside2">

					<div class="mini-cal" id="calendar">
						<div class="calender">
							<div class="column_right_grid calender">
								<div class="cal1"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">September 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day past adjacent-month last-month calendar-day-2015-08-30"><div class="day-contents">30</div></td><td class="day past adjacent-month last-month calendar-day-2015-08-31"><div class="day-contents">31</div></td><td class="day past calendar-day-2015-09-01"><div class="day-contents">1</div></td><td class="day past calendar-day-2015-09-02"><div class="day-contents">2</div></td><td class="day past calendar-day-2015-09-03"><div class="day-contents">3</div></td><td class="day past calendar-day-2015-09-04"><div class="day-contents">4</div></td><td class="day past calendar-day-2015-09-05"><div class="day-contents">5</div></td></tr><tr><td class="day past calendar-day-2015-09-06"><div class="day-contents">6</div></td><td class="day past calendar-day-2015-09-07"><div class="day-contents">7</div></td><td class="day past calendar-day-2015-09-08"><div class="day-contents">8</div></td><td class="day past calendar-day-2015-09-09"><div class="day-contents">9</div></td><td class="day past event calendar-day-2015-09-10"><div class="day-contents">10</div></td><td class="day past event calendar-day-2015-09-11"><div class="day-contents">11</div></td><td class="day past event calendar-day-2015-09-12"><div class="day-contents">12</div></td></tr><tr><td class="day past event calendar-day-2015-09-13"><div class="day-contents">13</div></td><td class="day past event calendar-day-2015-09-14"><div class="day-contents">14</div></td><td class="day past calendar-day-2015-09-15"><div class="day-contents">15</div></td><td class="day past calendar-day-2015-09-16"><div class="day-contents">16</div></td><td class="day past calendar-day-2015-09-17"><div class="day-contents">17</div></td><td class="day past calendar-day-2015-09-18"><div class="day-contents">18</div></td><td class="day past calendar-day-2015-09-19"><div class="day-contents">19</div></td></tr><tr><td class="day past calendar-day-2015-09-20"><div class="day-contents">20</div></td><td class="day past event calendar-day-2015-09-21"><div class="day-contents">21</div></td><td class="day past event calendar-day-2015-09-22"><div class="day-contents">22</div></td><td class="day past event calendar-day-2015-09-23"><div class="day-contents">23</div></td><td class="day past calendar-day-2015-09-24"><div class="day-contents">24</div></td><td class="day past calendar-day-2015-09-25"><div class="day-contents">25</div></td><td class="day today calendar-day-2015-09-26"><div class="day-contents">26</div></td></tr><tr><td class="day calendar-day-2015-09-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-09-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-09-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-09-30"><div class="day-contents">30</div></td><td class="day adjacent-month next-month calendar-day-2015-10-01"><div class="day-contents">1</div></td><td class="day adjacent-month next-month calendar-day-2015-10-02"><div class="day-contents">2</div></td><td class="day adjacent-month next-month calendar-day-2015-10-03"><div class="day-contents">3</div></td></tr></tbody></table></div></div>
							</div>
						</div>
					</div>

		        </div>
		      </div>
    		</div>

    	</div>
    </div>
    	<!-- FIN CONTAINER -->

    	<footer></footer>


		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="../../js/materialize.min.js"></script>
		<script type="text/javascript" src="../../js/menu.js"></script>
	  <script src="../../js/underscore-min.js"></script>
	  <script src="../../js/moment-2.2.1.js"></script>
	  <script src="../../js/clndr.js"></script>
	  <script src="../../js/site.js"></script>
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
