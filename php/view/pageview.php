<?php
include_once '../model/db.php';
	class PageView {
		/**
        * Shows the inscription's form.
		**/
		public function showInscriptionForm() {
		?>
			<!-- Debut card -->
	      	<div class="card-panel inscription col m4 push-m4 s12 center-align">
	        <!-- Formulaire -->
		        <form id="formula" class="col formulaire s10 push-s1" action="valider.php" method="POST">

		          	<!-- Titre de la carte -->
		          	<div class="card-header"> <h2>Inscription</h2></div>
		          	<!-- Fin titre -->

			          <!-- Contenu card -->
		          	<div class="card-content">

				          <!-- email -->
			          	<div class="row">
			       	 		<div class="input-field col s12">
			              		<input id="mail" type="email" class="validate" name="mail" required="required">
			             	 	<label for="mail">Adresse email universitaire <em>*</em></label>
			            	</div>
			          	</div><!-- fin email -->

			          		<!-- Nom -->
			          	<div class="row">
			       	 		<div class="input-field col s12">
			              		<input id="lastname" type="text" class="validate" name="lastname" required="required">
			             	 	<label for="lastname">Nom <em>*</em></label>
			            	</div>
			          	</div><!-- Nom -->

			          		<!-- Prenom -->
			          	<div class="row">
			       	 		<div class="input-field col s12">
			              		<input id="firstname" type="text" class="validate" name="firstname" required="required">
			             	 	<label for="firstname">Prénom <em>*</em></label>
			            	</div>
			          	</div><!-- Prenom -->

				          <!-- mot de passe -->
			          	<div class="row">
				            <div class="input-field col s12">
				              	<input id="passe" type="password" class="validate" name="passe" required="required">
				             	<label for="passe">Mot de passe <em>*</em></label>
				            </div>
			          	</div><!-- fin mot de passe -->

			      		<!-- confirmation mot de passe -->
			          	<div class="row">
				            <div class="input-field col s12">
				              	<input id="passe2" type="password" class="validate" name="passe2" required="required">
				              	<label for="passe2">Confirmer votre mot de passe <em>*</em></label>
				            </div>
			          	</div><!-- fin confirmation mot de passe -->
			          	<div id="result"></div><!-- Retour de l'erreur en json -->
		        	</div><!-- Fin contenu card -->
		        	

			          <!-- bouton s'inscrire -->
			        <div class="card-action bouton-connection">  
			            <input class="btn center-align" type="submit" value="S'inscrire"/>
			        </div>

		        </form><!-- Fin formulaire -->
	      	</div><!-- Fin card -->
		<?php
		}

		/**
        * Includes all javascript's links needed by the pages.
		**/
		public function showJavaLinks() {
		?>
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="../../js/materialize.min.js"></script>
		<script type="text/javascript" src="../../js/showmessage.js"></script>
		<script type="text/javascript" src="../../js/menu.js"></script>
		<script src="../../js/underscore-min.js"></script>
		<script src="../../js/moment-2.2.1.js"></script>
		<script src="../../js/clndr.js"></script>
		<script src="../../js/site.js"></script>
        <script src="../../js/trombi.js"></script>
		<script type="text/javascript" src="../../js/fonctions.js"></script>
		<script type="text/javascript">
		//$(document).ready(function(){showMessage();});

		$(document).ready(function() {
			$('select').material_select();
		});

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
		<?php
		}


		/**
        * Shows the first part of description in the index's page.
        * @param array $userInfos Information about the user.
		**/
		public function showIndexDescription($connect) {
			if(!$connect) {
			?>
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
    
			<?php
			}
			else {
			?>
	      	<div class="col s12 m12">
	        	<div class="card-panel teal" id="bloc1">
	        		<div class="card-header"> <h2>Accueil</h2></div>
	          		<p>I am a very simple card. I am good at containing small bits of information.
	          		   I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.I am a very simple card. I am good at containing small bits of information.<br/><br/>

	          		   I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.I am a very simple card. I am good at containing small bits of information.<br/><br/>

	          		   I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.I am a very simple card. I am good at containing small bits of information.
	          		</p>
	        	</div>
	      	</div>
			<?php
			}
		}


		/**
        * Shows the footer.
		**/
		public function showFooter() {
			?>
			<footer>
				<p>Licence Professionnelle Systèmes Informatiques et Logiciels et Développement et Administration Internet et Intranet.</p>
			</footer>
			<?php
		}


		/**
        * Shows the calendar.
		**/
		public function showCalendar() {
			?>
			<div class="col s12 m4">
		        <div class="card-panel teal" id="aside2">

					<div class="mini-cal" id="calendar">
						<div class="calender">
							<div class="column_right_grid calender">
								<div class="cal1"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">précédent</p></div><div class="month">Septembre 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">suivant</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">D</td><td class="header-day">L</td><td class="header-day">M</td><td class="header-day">M</td><td class="header-day">J</td><td class="header-day">V</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day past adjacent-month last-month calendar-day-2015-08-30"><div class="day-contents">30</div></td><td class="day past adjacent-month last-month calendar-day-2015-08-31"><div class="day-contents">31</div></td><td class="day past calendar-day-2015-09-01"><div class="day-contents">1</div></td><td class="day past calendar-day-2015-09-02"><div class="day-contents">2</div></td><td class="day past calendar-day-2015-09-03"><div class="day-contents">3</div></td><td class="day past calendar-day-2015-09-04"><div class="day-contents">4</div></td><td class="day past calendar-day-2015-09-05"><div class="day-contents">5</div></td></tr><tr><td class="day past calendar-day-2015-09-06"><div class="day-contents">6</div></td><td class="day past calendar-day-2015-09-07"><div class="day-contents">7</div></td><td class="day past calendar-day-2015-09-08"><div class="day-contents">8</div></td><td class="day past calendar-day-2015-09-09"><div class="day-contents">9</div></td><td class="day past event calendar-day-2015-09-10"><div class="day-contents">10</div></td><td class="day past event calendar-day-2015-09-11"><div class="day-contents">11</div></td><td class="day past event calendar-day-2015-09-12"><div class="day-contents">12</div></td></tr><tr><td class="day past event calendar-day-2015-09-13"><div class="day-contents">13</div></td><td class="day past event calendar-day-2015-09-14"><div class="day-contents">14</div></td><td class="day past calendar-day-2015-09-15"><div class="day-contents">15</div></td><td class="day past calendar-day-2015-09-16"><div class="day-contents">16</div></td><td class="day past calendar-day-2015-09-17"><div class="day-contents">17</div></td><td class="day past calendar-day-2015-09-18"><div class="day-contents">18</div></td><td class="day past calendar-day-2015-09-19"><div class="day-contents">19</div></td></tr><tr><td class="day past calendar-day-2015-09-20"><div class="day-contents">20</div></td><td class="day past event calendar-day-2015-09-21"><div class="day-contents">21</div></td><td class="day past event calendar-day-2015-09-22"><div class="day-contents">22</div></td><td class="day past event calendar-day-2015-09-23"><div class="day-contents">23</div></td><td class="day past calendar-day-2015-09-24"><div class="day-contents">24</div></td><td class="day past calendar-day-2015-09-25"><div class="day-contents">25</div></td><td class="day today calendar-day-2015-09-26"><div class="day-contents">26</div></td></tr><tr><td class="day calendar-day-2015-09-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-09-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-09-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-09-30"><div class="day-contents">30</div></td><td class="day adjacent-month next-month calendar-day-2015-10-01"><div class="day-contents">1</div></td><td class="day adjacent-month next-month calendar-day-2015-10-02"><div class="day-contents">2</div></td><td class="day adjacent-month next-month calendar-day-2015-10-03"><div class="day-contents">3</div></td></tr></tbody></table></div></div>
							</div>
						</div>
					</div>

		        </div>
		    </div>
			<?php
		}


		/**
        * Includes the head needed by pages
		* @param string $title title of page
		**/
		public function showHead($title) {
			?>
			<head>
		    	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
				<title><?php echo $title;?></title>

				<link rel="icon" type="image/ico" href="../../img/favicon.ico" />

				<!--Import Roboto Font-->
		    	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
				<!--Import Google Icon Font-->
				<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
				<!--Import materialize.css-->
				<link type="text/css" rel="stylesheet" href="../../vendor/css/materialize.min.css"  media="screen,projection"/>
				<!--Import style.css-->
				<link type="text/css" rel="stylesheet" href="../../css/style.css"/>
				<!--Import menu.css-->
				<link type="text/css" rel="stylesheet" href="../../css/menu.css"/>
				<!--Import profil.css-->
				<link type="text/css" rel="stylesheet" href="../../css/profil.css"/>

				<link rel="stylesheet" type="text/css" href="../../css/index.css"/>

				<!-- CALENDAR -->
			  	<link rel="stylesheet" href="../../css/clndr.css" type="text/css" />
				<link type="text/css" rel="stylesheet" href="../../css/calendar.css"/>

		     	 <!--Let browser know website is optimized for mobile-->
		      	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   			</head>
			<?php
		}


		/**
        * Shows the header.
        * @param bool $connect if the user is connected.
		**/
		public function showHeader($connect) {
			if(!$connect) {?>
			<nav id="nav">
	 		 	<div class="nav-wrapper">
				    <a href="./index.php" class="brand-logo"><img class="logo-svg" src="../../img/logo.svg" alt="logo du site"></a>
				    <a href="./index.php" class="brand-logo-responsive"><img class="logo-svg" src="../../img/logo2.svg" alt="logo du site"></a>
				    <img class="name-svg"  src="../../img/name.svg" alt="Zenetude, titre du site">
		  		</div>
			</nav>
			<?php
			}
			else {
			?>
			<nav id="nav">
	 		 	<div class="nav-wrapper">
				    <a href="./index.php" class="brand-logo"><img class="logo-svg" src="../../img/logo.svg" alt="logo du site"></a>
				    <a href="./index.php" class="brand-logo-responsive"><img class="logo-svg" src="../../img/logo2.svg" alt="logo du site"></a>
				    <img class="name-svg"  src="../../img/name.svg" alt="Zenetude, titre du site">
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
			<?php
			}
		}


		/**
        * Shows the static menu.
        * @param bool $connect if the user is connected.
		**/
		public function showMenu($connect) {
			if(!$connect) {?>
			<div class="col s12 m4">
		        <div class="card-panel teal" id="aside1">
					<div class="card-header"> <h2>Connexion</h2></div>

					<!-- Formulaire -->
					<div class="formula">
						<form id="formula" class="col s10 push-s1" action="connexion.php" method="POST">


							<!-- Contenu card -->
							<div>

								<!-- email -->
								<div class="row">
									<div class="input-field col s12">
										<input id="email" type="email" class="validate" name="mail">
										<label for="email">Email</label>
									</div>
								</div><!-- fin email -->

								<!-- mot de passe -->
								<div class="row">
									<div class="input-field col s12">
										<input id="passe" type="password" class="validate" name="pass">
										<label for="passe">Mot de passe</label>
									</div>
								</div><!-- fin mot de passe -->

							</div><!-- Fin contenu card -->
							<div id="result"></div><!-- Retour de l'erreur en json -->
							<div class="card-action  center-align bouton-connection">
								<input class="btn connexion" type="submit" value="Se connecter" />
							</div>
							<div id="socialmedia">
								<?php
								include('socialmedia.php');
								?>
							</div>
						</form>
					</div>
				    <!-- Fin formulaire -->
			        <p class="connexion"><a href="inscription.php" class="left">S'inscrire</a><a href="recuperation.php" class="right">Mot de passe oublié</a></p>
		      	</div>
    		</div>
			<?php
			}
			else {
			?>
			<?php
			}
		}


        /**
         * Shows the scroll Menu.
         * @param bool $connect If the user is connected.
         * @param array $userInfos Information about the user.
         * @param bool $rf If the user is a training manager.
         */
		public function showScrollMenu($connect, $userInfos, $rf = false) {
			if(!$connect) {?>
			<nav id="scroll-nav">
		  		<div class="nav-wrapper">
		    		<a href="index.php" class="brand-logo"><img src="../../img/logo.svg" alt="logo du site"></a>
		    		<img class="name-svg" src="../../img/name.svg" alt="Zenetude, titre du site">
		 	 	</div>
			</nav>
		<?php
			}
			else {
			?>
			<nav id="menu" class="center-align">
				<ul>
					<?php

						/*if (isset($_SESSION['image'])){
							$pic = $_SESSION['image'];
						}
						else*/ if($rf){
							$pic = "../../img/avatar/avatar.png";
						}
						else{
							$pic = $userInfos['infoStudent']['student_avatar'];
						}

					?>

					<img src="<?php echo $pic; ?>" alt="avatar" class="circle responsive-img"/><br/>
					<?php 

						if((isset($userInfos['infoUser']['user_firstname']) || $userInfos['infoUser']['user_firstname'] != "") && (isset($userInfos['infoUser']['user_name']) || $userInfos['infoUser']['user_name'] != ""))
							echo $userInfos['infoUser']['user_firstname']. ' '.$userInfos['infoUser']['user_name'].'<br />';
						else if ((isset($userInfos['infoUser']['user_firstname']) || $userInfos['infoUser']['user_firstname'] != "" ) && (!isset($userInfos['infoUser']['user_name']) || $userInfos['infoUser']['user_name'] == ""))
							echo $userInfos['infoUser']['user_firstname'].'<br />';
						else if ((isset($userInfos['infoUser']['user_name'])  || $userInfos['infoUser']['user_name'] != "") && (!isset($userInfos['infoUser']['user_firstname']) || $userInfos['infoUser']['user_firstname'] == ""))
							echo $userInfos['infoUser']['user_name'].'<br />';

						if($rf)
							echo 'Responsable de formation <br />';

						if(isset($userInfos['infoTraining']['description']) && $userInfos['infoTraining']['description'] != "")
							echo 'Formation : '.$userInfos['infoTraining']['description'].'<br />';
						if(isset($userInfos['infoStudent']['student_group']) && $userInfos['infoStudent']['student_group'] != "0")
							echo 'Groupe '.$userInfos['infoStudent']['student_group'].'<br />';
					?>
					<li><a class="color" href="profil.php">Mon compte</a></li>

					<?php
						$db=connect();
						$permission = $db->query('SELECT user_id FROM Administrator');
						$user_connect_id =  $_SESSION['infoUser']['user_id'];
						$result_permission = $permission->fetchAll();
						foreach ($result_permission as $var) {
							if ($var['user_id'] == $user_connect_id) {
								echo '<li><a class="color" href="admin.php">Administration</a></li>';
								break;
							}
						}
					?>

					<li><a class="color" href="../model/deconnect.php">Déconnexion</a></li>

				</ul>
			</nav>
			<nav id="scroll-nav">
		  		<div class="nav-wrapper">
		    		<a href="index.php" class="brand-logo"><img src="../../img/logo.svg" alt="logo du site"></a>
		    		<img src="../../img/name.svg" alt="Zenetude, titre du site">
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
			<?php
			}
		}

        /**
         * Shows the form of the recuperation of password.
         */
		public function showRecuperation(){ ?>
			<!-- CONTAINER -->
			<div class="container container-fluid">

			<div class="row">
			  <!-- Debut card -->
			  <div class="card-panel inscription col m4 push-m4 s12 center-align">
				<!-- Formulaire -->
				<form id="formula" class="col formulaire s10 push-s1" action="validationrecuperation.php" method="POST" onsubmit="">

				  <!-- Titre de la carte -->
				  <div class="card-header header-small"> <h2>Récupération de mot de passe</h2></div>
				  <!-- Fin titre -->

				  <!-- Contenu card -->
				  <div class="card-content">

				  <!-- email -->
				  <div class="row">
					<div class="input-field col s12">
					  <input id="email" type="email" class="validate" name="mail" required="required">
					  <label for="email">Entrer l'adresse email de récupération </label>
					</div>
				  </div><!-- fin email -->
				  <div id="result"></div><!-- Retour de l'erreur en json -->
				</div><!-- Fin contenu card -->

				  <!-- bouton s'inscrire -->
				  <div class="card-action bouton-connection">
					<input class="btn center-align" type="submit" value="Valider" />
				  </div>

				</form><!-- Fin formulaire -->
			  </div><!-- Fin card -->
		  </div>
		</div>
		<?php }


		/**
         * Shows the differents contacts possibles for an utilisator.
         * @param array $userInfos The informations about the user.
         * @param array $result The informations about the training manager associated with the user.
         *
         */
        public function showContact($userInfos, $result){
            if ((isset($userInfos['infoUser']['user_firstname']) && $userInfos['infoUser']['user_firstname'] != "") && (isset($userInfos['infoUser']['user_name']) && $userInfos['infoUser']['user_name'] != ""))
                echo '<div class="card-header"><h2>'.$userInfos['infoUser']['user_firstname'].' '.$userInfos['infoUser']['user_name'].'</h2></div>';
			else if((isset($userInfos['infoUser']['user_firstname']) && $userInfos['infoUser']['user_firstname'] != "") && (!isset($userInfos['infoUser']['user_name']) && $userInfos['infoUser']['user_name'] == ""))
				echo '<div class="card-header"><h2>'.$userInfos['infoUser']['user_firstname'].'</h2></div>';
			else if((!isset($userInfos['infoUser']['user_firstname']) && $userInfos['infoUser']['user_firstname'] == "") && (isset($userInfos['infoUser']['user_name']) && $userInfos['infoUser']['user_name'] != ""))
				echo '<div class="card-header"><h2>'.$userInfos['infoUser']['user_name'].'</h2></div>';

            if ((isset($result[0]) && $result[0] != "") || (isset($result[1]) && $result[1] != "") || (isset($result[2]) && $result[2] != "")){
            	echo "<ul>";
	            if(isset($result[0]) && $result[0] != "") {
	                echo '<li class="infos">Nom  : '.$result[0].'</li>';}

	            if(isset($result[1]) && $result[1] != "") {
	                echo '<li class="infos"> Prénom : '.$result[1].'</li>';}

	            if(isset($result[2]) && $result[2] != "") {
	                echo '<li class="infos">Email personnel : '.$result[2].'</li>';}
	            echo "</ul>";
	            }
	        else
	        	echo "<div id='noFormation'>Vous n'avez pas encore renseigné votre formation !</div></br><a class='right-align' href='gestion.php'>Page gestion du profil</a>";
        }


		/**
		 * Shows the management interface.
		 * @param $rf
		 * @param $result
		 * @param $result2
		 * @param $result4
		 */
		public function showGestion($rf, $result, $result2, $result4){ ?>

			<form id="formula1" action="validationgestion.php" method="POST" enctype="multipart/form-data">
				<?php if (!$rf){ ?>
				<div class="form-group">
					<input type="hidden" class="form-control" value="<?php echo $_SESSION['infoUser']['user_id']; ?>" name="user_id">
					<div class="row">
						<div class="col s6">
							<label>Civilité</label>
							<select name="user_civility">
								<option value="Monsieur" <?php if($result4[5] == "Monsieur") echo " selected='selected'";?>>Monsieur</option>
								<option value="Madame" <?php if($result4[5] == "Madame") echo " selected='selected'";?>>Madame</option>
								<option value="Mademoiselle"<?php if($result4[5] == "Mademoiselle") echo " selected='selected'";?>>Mademoiselle</option>
							</select>
						</div>
						<div class="col s6">
							<label for="">Mail personnel</label>
							<input type="email" class="form-control validate" value="<?php echo $result[4]; ?>" name="student_personalemail">
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<label for="">Telephone</label>
							<input type="tel" pattern = '[0-9]{10}' placeholder ='0412345678' maxlength = '10' class="form-control" value="<?php echo $result[5]; ?>" name="student_phone">
						</div>
						<div class="col s6">
							<label for="">Portable</label>
							<input type="tel" pattern = '[0-9]{10}' placeholder ='0612345678' maxlength = '10' class="form-control" value="<?php echo $result[6]; ?>" name="student_mobile">
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<label for="">Adresse 1</label>
							<input type="text" class="form-control" value="<?php echo $result[7]; ?>" name="student_address1">
						</div>
						<div class="col s6">
							<label for="">Adresse 2</label>
							<input type="text" class="form-control" value="<?php echo $result[8]; ?>" name="student_address2">
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<label for="">Code postal</label>
							<input type="text" class="form-control" value="<?php echo $result[9]; ?>" name="student_zipcode" maxlength="5">
						</div>
						<div class="col s6">
							<label for="">Ville</label>
							<input type="text" class="form-control" value="<?php echo $result[10]; ?>" name="student_city">
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<label for="">Pays</label>
							<input type="text" class="form-control" value="<?php echo $result[11]; ?>" name="student_country">
						</div>
						<div class="col s6">
							<label for="">Nationalité</label>
							<input type="text" class="form-control" value="<?php echo $result[12]; ?>" name="student_nationality">
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<label for="">Date de naissance</label>
							<input type="date" class="form-control datepicker" value="<?php echo $result[13]; ?>" name="student_birthday">
						</div>
						<div class="col s6">
							<label for="">Ville de naissance</label>
							<input type="text" class="form-control" value="<?php echo $result[14]; ?>" name="student_birthcity">
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<label for="">Region de naissance</label>
							<input type="text" class="form-control" value="<?php echo $result[15]; ?>" name="student_birtharea">
						</div>
						<div class="col s6">
							<label for="">Pays de naissance</label>
							<input type="text" class="form-control" value="<?php echo $result[16]; ?>" name="student_birthcountry">
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<label for="">Origine</label>
							<input type="text" class="form-control" value="<?php echo $result[20]; ?>" name="student_origin">
						</div>
						<div class="col s6">
							<label for="">Niveau d'études</label>
							<select name="student_educationallevel">
								<option value="BAC" <?php if($result[19] == "BAC") echo " selected='selected'";?>>BAC</option>
								<option value="BAC+1"<?php if($result[19] == "BAC+1") echo " selected='selected'";?>>BAC+1</option>
								<option value="BAC+2"<?php if($result[19] == "BAC+2") echo " selected='selected'";?>>BAC+2</option>
								<option value="BAC+3"<?php if($result[19] == "BAC+3") echo " selected='selected'";?>>BAC+3</option>
								<option value="BAC+4"<?php if($result[19] == "BAC4") echo " selected='selected'";?>>BAC+4</option>
								<option value="BAC+5"<?php if($result[19] == "BAC+5") echo " selected='selected'";?>>BAC+5</option>
								<option value="BAC+6"<?php if($result[19] == "BAC+6") echo " selected='selected'";?>>BAC+6</option>
								<option value="BAC+7"<?php if($result[19] == "BAC+7") echo " selected='selected'";?>>BAC+7</option>
								<option value="BAC+8"<?php if($result[19] == "BAC+8") echo " selected='selected'";?>>BAC+8</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<label>Formation actuelle</label>
							<select name="training_description">
								<?php
									foreach ($result2 as $value) {
										if ($value[0] !== NULL) {
											echo "<option value=" . $value[0];
											if( $value[1] == $result[2])
												echo " selected='selected'";
											echo ">" . $value[0] . "</option>";
										}
									}
								?>
							</select>
						</div>
						<div class="col s6">
							<label name="student_grantholder" for="">Boursier</label></br>
							<input id="oui" class="with-gap" name="student_grantholder" type="radio" value="1"<?php if($result[21] == "1") echo "checked ='ckecked'";?>/>
							<label class="button" for="oui">Oui</label>
							<input id="non" class="with-gap" name="student_grantholder" type="radio" value="0"/<?php if($result[21] == "0") echo "checked ='ckecked'";?>>
							<label class="button" for="non">Non</label> </br>
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<label for="">Groupe</label>
							<input type="text" class="form-control" value="<?php if ($result[24] != "0") echo $result[24]; ?>" name="student_group">
						</div>
						<div class="col s6">
							<label>Type de formation</label>
							<select name="student_status">
							<option value="FI" <?php if($result[18] == "FI") echo " selected='selected'";?>>FI</option>
							<option value="FA" <?php if($result[18] == "FA") echo " selected='selected'";?>>FA</option>
							<option value="FC"<?php if($result[18] == "FC") echo " selected='selected'";?>>FC</option>
							<option value="CP"<?php if($result[18] == "CP") echo " selected='selected'";?>>CP</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<label>Votre photo de profil</label>
							<div class="image-upload">
								<label for="student_avatar">
								<img src="<?php echo $_SESSION['infoStudent']['student_avatar']; ?>"/>
								</label>
								<div class="file-field input-field">
									<div class="btn">
										<span>Avatar</span>
										<input type="file">
									</div>
									<div class="file-path-wrapper">
										<input id="student_avatar" type="file" name="student_avatar"/>
										<input class="file-path validate" type="text">
									</div>
								</div>
							</div>
						</div>
						<div class="col s6">
							<label>Votre photo du trombinoscope</label>
							<div class="image-upload">
								<label for="student_trombi">
								<img src="<?php echo $_SESSION['infoStudent']['student_trombi']; ?>"/>
								</label>
								<div class="file-field input-field">
									<div class="btn">
										<span>Photo</span>
										<input type="file">
									</div>
									<div class="file-path-wrapper">
										<input id="student_trombi" type="file" name='student_trombi'/>
										<input class="file-path validate" type="text">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s12">
							 <label for="">Modifier mot de passe</label>
							<input type='password' placeholder="Ancien mot de passe" class="form-control" name='old_user_password' />
						</div>
					</div>
					<div class="row">
						<div class="col s12">
					<input type='password' placeholder="Nouveau mot de passe" class="form-control" name='new_user_password' />
						</div>
					</div>
					<div class="row">
						<div class="col s12">
							<input type='password' placeholder="Confirmer nouveau mot de passe" class="form-control" name='confirm_new_user_password' />
						</div>
					</div>
					<div class="row">
						<div class="col s12">
							<label for="">Commentaires</label>
							<textarea name="student_comment" rows="10" cols="10"><?php echo $result[23]; ?></textarea>
						</div>
					</div>
				<?php } else {?>
					<div class="form-group">
						<div class="row">
							<div class="col s12">
								<label>Civilité</label>
									<select name="user_civility">
										<option value="Monsieur" <?php if($result4[5] == "Monsieur") echo " selected='selected'";?>>Monsieur</option>
										<option value="Madame" <?php if($result4[5] == "Madame") echo " selected='selected'";?>>Madame</option>
										<option value="Mademoiselle"<?php if($result4[5] == "Mademoiselle") echo " selected='selected'";?>>Mademoiselle</option>
									</select>
							</div>
						</div>
				<?php } ?>
					<div id="result"></div><!-- Retour de l'erreur en json -->
					<input type="button" name="return" value="Retour" class="btn btn-primary btnbot" onclick="self.location.href='profil.php'">
					<button type="submit" name="student_update" class="btn btn-primary right btnbot">Enregistrer</button>
				</div>
			</form>

		<?php }


		/**
		 * Shows the differents informations about the profil of the user.
		 * @param array $userInfos The informations about the user.
		 * @param bool $rf If the user is a training manager.
		 * @param array $result Informations about educational documents associated with the user.
		 */
		public function showProfilInformations($userInfos, $rf = false, $result){
			if(!$rf) {
	    	echo '
		    	<div class="col s12 m8">
	                <div class="card-panel teal" id="bloc2">
	                    <div class="card-title"> <h3>Profil</h3></div>';
	                    if ((isset($userInfos['infoUser']['user_firstname']) && $userInfos['infoUser']['user_firstname'] != "") && (isset($userInfos['infoUser']['user_name']) && $userInfos['infoUser']['user_name'] != ""))
                            echo '<div class="card-header"><h2>'.$userInfos['infoUser']['user_firstname'].' '.$userInfos['infoUser']['user_name'].'</h2></div>';
				    	else if((isset($userInfos['infoUser']['user_firstname']) && $userInfos['infoUser']['user_firstname'] != "") && (!isset($userInfos['infoUser']['user_name']) && $userInfos['infoUser']['user_name'] == ""))
				    		echo '<div class="card-header"><h2>'.$userInfos['infoUser']['user_firstname'].'</h2></div>';
				    	else if((!isset($userInfos['infoUser']['user_firstname']) && $userInfos['infoUser']['user_firstname'] == "") && (isset($userInfos['infoUser']['user_name']) && $userInfos['infoUser']['user_name'] != ""))
				    		echo '<div class="card-header"><h2>'.$userInfos['infoUser']['user_name'].'</h2></div>';
				    	echo '<ul>';
                        if(isset($userInfos['infoUser']['user_instituteemail']) && $userInfos['infoUser']['user_instituteemail'] != "")
                            echo '<li class="infos">Email académique : '.$userInfos['infoUser']['user_instituteemail'].'</li>';
                        if(isset($userInfos['infoStudent']['student_personalemail']) && $userInfos['infoStudent']['student_personalemail'] != "")
			        	    echo '<li class="infos">Email personnel : '.$userInfos['infoStudent']['student_personalemail'].'</li>';
                        if(isset($userInfos['infoUser']['user_type']) && $userInfos['infoUser']['user_type'] != "")
                            echo '<li class="infos">Type : '.$userInfos['infoUser']['user_type'].'</li>';
                        if(isset($userInfos['infoStudent']['student_phone']) && $userInfos['infoStudent']['student_phone'] != "")
                            echo '<li class="infos">Téléphone fixe : '.$userInfos['infoStudent']['student_phone'].'</li>';
                        if(isset($userInfos['infoStudent']['student_mobile']) && $userInfos['infoStudent']['student_mobile'] != "")
                            echo '<li class="infos">Téléphone mobile : '.$userInfos['infoStudent']['student_mobile'].'</li>';
                        if(isset($userInfos['infoUser']['user_civility']) && $userInfos['infoUser']['user_civility'] != "")
                            echo '<li class="infos">Civilité : '.$userInfos['infoUser']['user_civility'].'</li>';
                        if(isset($userInfos['infoTraining']['description']) && $userInfos['infoTraining']['description'] != "")
			       		    echo '<li class="infos">Formation actuelle : '.$userInfos['infoTraining']['description'].'</li>';
                        if(isset($userInfos['infoStudent']['student_group']) && $userInfos['infoStudent']['student_group'] != 0)
                            echo '<li class="infos">Groupe : '.$userInfos['infoStudent']['student_group'].'</li>';
                        if(isset($userInfos['infoStudent']['student_birthdate']) && $userInfos['infoStudent']['student_birthdate'] != "")
						    echo '<li class="infos">Date de naissance : '.$userInfos['infoStudent']['student_birthdate'].'</li>';
                        if(isset($userInfos['infoStudent']['student_birthcity']) && $userInfos['infoStudent']['student_birthcity'] != "")
						    echo '<li class="infos">Lieu de naissance : '.$userInfos['infoStudent']['student_birthcity'].'</li>';
                        if(isset($userInfos['infoStudent']['student_birtharea']) && $userInfos['infoStudent']['student_birtharea'] != "")
						    echo '<li class="infos">Région de naissance : '.$userInfos['infoStudent']['student_birtharea'].'</li>';
                        if(isset($userInfos['infoStudent']['student_birthcountry']) && $userInfos['infoStudent']['student_birthcountry'] != "")
                            echo '<li class="infos">Pays de naissance : '.$userInfos['infoStudent']['student_birthcountry'].'</li>';
                        if(isset($userInfos['infoStudent']['student_origin']) && $userInfos['infoStudent']['student_origin'] != "")
                            echo '<li class="infos">Formation précédente : '.$userInfos['infoStudent']['student_origin'].' </li>';
                        if(isset($userInfos['infoStudent']['student_address2']) && $userInfos['infoStudent']['student_address2'] != "")
                            echo '<li class="infos">Adresse : '.$userInfos['infoStudent']['student_address2'].' '.$userInfos['infoStudent']['student_address1'].' '.$userInfos['infoStudent']['student_zipcode'].' '.$userInfos['infoStudent']['student_city'].'</li>';
			     		echo '<li class="infos"><a class="right-align" href="gestion.php">Gérer mon compte</a></li>
			     			<li class="infos"><a class="right-align" href="contact.php">Contacter un responsable de formation</a></li>';
			     		echo'
			       	</ul></div>
	            </div>
	            ';
	           }
	        	else {
		        	echo '
			    	<div class="col s12 m8">
		                <div class="card-panel teal" id="bloc2">
		                    <div class="card-title"> <h3>Profil</h3></div>';
		                    if ((isset($userInfos['infoUser']['user_firstname']) || $userInfos['infoUser']['user_firstname'] != "") && (isset($userInfos['infoUser']['user_name']) || $userInfos['infoUser']['user_name'] != ""))
	                            echo '<div class="card-header"><h2>'.$userInfos['infoUser']['user_firstname'].' '.$userInfos['infoUser']['user_name'].'</h2></div>';
					    	else if((isset($userInfos['infoUser']['user_firstname']) || $userInfos['infoUser']['user_firstname'] != "") && (!isset($userInfos['infoUser']['user_name']) || $userInfos['infoUser']['user_name'] == ""))
					    		echo '<div class="card-header"><h2>'.$userInfos['infoUser']['user_firstname'].'</h2></div>';
					    	else if((!isset($userInfos['infoUser']['user_firstname']) || $userInfos['infoUser']['user_firstname'] == "") && (isset($userInfos['infoUser']['user_name']) || $userInfos['infoUser']['user_name'] != ""))
					    		echo '<div class="card-header"><h2>'.$userInfos['infoUser']['user_name'].'</h2></div>';
					    	echo '<ul>';
					    	if(isset($userInfos['infoUser']['user_instituteemail']) && $userInfos['infoUser']['user_instituteemail'] != "")
					    		echo '<li class="infos">Email académique : '.$userInfos['infoUser']['user_instituteemail'].'</li>';
					    	if(isset($userInfos['infoUser']['user_type']) && $userInfos['infoUser']['user_instituteemail'] != "")
			          			echo '<li class="infos">Type : '.$userInfos['infoUser']['user_type'].'</li>';
			          		if(isset($userInfos['infoUser']['user_civility']) && $userInfos['infoUser']['user_civility'] != "")
			          			echo '<li class="infos">Civilité : '.$userInfos['infoUser']['user_civility'].'</li>';
			          		echo '<li class="infos"><a class="right-align" href="gestion.php">Gérer mon compte</a></li>';
			          		if( $result[0] > 0){
			          			echo '<li class="infos"><a class="right-align" href="documents.php">Documents pédagogiques</a></li>';
			          		}
			          		echo '</ul>
			          		</div>
		            </div>';
				}
			}

        /**
         * Shows the administration.
         * @param array $register All information about users.
         */
		public function showAdministration($register/*, $selection*/){
			$db = connect();
			?>
			<form name="form" method="POST">
			<?php
			if(count($register) > 0){
				echo "<span>Modifier les informations d'un utilisateur : </span>
					<div class='row'>
						<div class='col s12'>
							<label for='register'>Sélection du membre : </label>
								<select id='register' name='register' size=1 onchange='javascript:submit(this)' >
									<option value = 'default' selected>Sélectionner l'utilisateur</option>";
				while ($result=$register -> fetch()) {
					echo '<option value="'.$result['user_id'].'" ';
        			if(isset($_POST["register"]) && $_POST["register"]==$result['user_id']){echo "selected='selected'";}
        			//echo '>'.$result['user_firstname'].' '.$result['user_name'].'</option>';
					echo'>'.$result['user_instituteemail'].'</option>';
				}
						echo "</select></br>
						</div>
					</div>";
			}
		    //Select all register
			if (isset($_POST['register'])) {
		        $selection = $db->query("SELECT user_id, user_name, user_firstname, user_instituteemail, user_type  FROM User WHERE user_id='".$_POST['register']."'");
		        while($resultat = $selection -> fetch()){
		            //Store all register's elements
		            $id_register = $resultat['user_id'];
		            $name_register = $resultat['user_name'];
		            $firstname_register = $resultat['user_firstname'];
		            $email_register = $resultat['user_instituteemail'];
		            $statut_register = $resultat['user_type'];

		        ?>
		        <div class="row">
			        <div class="input-field col s12">
				        <input type="text" id="user_name" name="user_name" maxlength="20" value="<?php echo htmlspecialchars($name_register);?>" />
				        <label for="user_name">Nom</label>
				    </div>
		        </div>

		        <div class="row">
		        	<div class="input-field col s12">
				        <input type="text" id="user_firstname" name="user_firstname" maxlength="20" value="<?php echo htmlspecialchars($firstname_register);?>" /></br>
				        <label for="user_firstname">Prénom</label>
		        	</div>
		        	
		        </div>

		        <div class="row">
		        	<div class="input-field col s12">
				        <input type="text" id="email" name="email" maxlength="50" value="<?php echo htmlspecialchars($email_register);?>" /></br>
				        <label for="email">Email</label>
		        	</div>
		        </div>

		        <label for="statut">Statut</label>
		        <select id="statut" name="statut">
			        <option value="Etudiant" <?php if($statut_register == "Etudiant") echo "selected='selected'";?>>Etudiant</option>
			        <option value="RF" <?php if($statut_register == "RF") echo "selected='selected'";?>>Responsable de Formation</option>
		        </select></br>

		        <?php
		        	$isAdmin = $db->query('SELECT admin_id FROM Administrator WHERE user_id ="'.$resultat['user_id'].'"');
		        	$result_isAdmin = $isAdmin->fetch();
		        	//$result_isAdmin = $isAdmin->fetch();
		        	if ($statut_register == "RF") {
		        		?>
		        			<label name="is_admin" for="">Administrateur</label></br>
                            <input id="oui" class="with-gap" name="is_admin" type="radio" value="1"<?php if($result_isAdmin['admin_id']) {echo "checked";}?>/>
                            <label class="button" for="oui">Oui</label>                       
                            <input id="non" class="with-gap" name="is_admin" type="radio" value="0"<?php if(!$result_isAdmin['admin_id']){echo "checked";}?>>
                            <label class="button" for="non">Non</label> </br>
                        <?php
		        	}
		        ?>

		        <button class="btn" type="submit" name="Modifier">Modifier</button>
				<a class="btn supp" href="admin.php?supmembre=<?= $id_register.'&amp;statutmember='.$statut_register;?>">Supprimer</a>

		    </form>
				<?php
 				}
			}else{
				$list_training_manager = $db->query("SELECT Training_manager.user_id, user_instituteemail FROM User, Training_manager WHERE User.user_id = Training_manager.user_id AND user_instituteemail IS NOT NULL");
				echo "<span>Ajouter une formation : </span>
					<div class='row'>
						<div class='col s6'>
							<label for='add_training'>Nom de la formation</label>
							<input type='text' class='form-control' name='addTraining'>
						</div>
						<div class='col s6'>
							<label for='training_manager'>Choisir un responsable de formation</label>
							<select id='list_training_managers' placeholder='Ex : DUT-NOMDELAFORMATION' name='list_training_managers' size=1>";
				while ($result_training_managers = $list_training_manager->fetch()) {
					echo "<option value='" .$result_training_managers['user_id'] ."'>".$result_training_managers['user_instituteemail']. "</option>";
				}
						echo "</select>
						</div>
					</div>";

				$departments = $db->query("SELECT departement_id, departement_name FROM Departement WHERE departement_name IS NOT NULL");
				echo "<div class='row'>
						<div class='col s6'>
							<label for='departments'>Choisir un département</label>
							<select id='list_departments' name='list_departments' size=1>";
				while ($result_departments = $departments->fetch()) {
					echo "<option value='" .$result_departments['departement_id'] ."'>". $result_departments['departement_name']. "</option>";
				}
						echo "</select>
						</div>
						<div class='col s6'>
							<label for='add_training_max_group'>Nombres de groupes de la formation</label>
							<input type='number' id='add_training_max_group' min='1' class='form-control' name='addTrainingMaxGroup' value=1>
						</div>
					</div>
					<button class='btn' type='submit' name='Ajouter'>Ajouter</button>
				</form>";
			}
			if (isset($_POST['Ajouter'])) {
				/*if((isset($_POST['addTraining'])) && (isset($_POST['list_training_managers'])) && (isset($_POST['list_departments'])) && (isset($_POST['training_max_group']))){*/
				if (($_POST['addTraining'] != "") && ($_POST['list_training_managers'] != "") && ($_POST['list_departments'] != "") && ($_POST['addTrainingMaxGroup'] != "")) {
					$currentTrainingManagerId = $db->query('SELECT training_manager_id FROM Training_manager, User WHERE Training_manager.user_id = User.user_id AND User.user_id ="' . $_POST['list_training_managers'] . '"');
					$currentDepartmentId = $db->query('SELECT Departement.departement_id FROM Departement, Training, Training_manager, User WHERE Training_manager.user_id = User.user_id AND Training.training_manager_id = Training_manager.training_manager_id AND Training.departement_id = Departement.departement_id AND Departement.departement_id ="' . $_POST['list_departments'] . '"');
					$DId = $currentDepartmentId->fetch();
					$TId = $currentTrainingManagerId->fetch();
					$good_description = strtoupper($_POST['addTraining']);
					$verif = $db->query('SELECT training_id FROM Training WHERE description ="'.$good_description.'"');
					$result_verif = $verif->fetch();
					if ($result_verif) {
						echo "<p>Formation déjà existante</p>";
					}
					else{
						$addTraining = $db->query('INSERT INTO Training (training_manager_id, departement_id, description, training_max_group) VALUES ("'.htmlspecialchars($TId['training_manager_id']).'","'.htmlspecialchars($DId['departement_id']).'","'.htmlspecialchars($good_description).'","'.htmlspecialchars($_POST['addTrainingMaxGroup']).'")');
						echo '<div class="ok">Formation enregistré avec succés. Redirection en cours...</div><script type="text/javascript"> window.setTimeout("location=(\'admin.php\');",3000) </script>';
					}				
				}
				else{
					echo "<p>Veuillez remplir tous les champs</p>";
				}
			}
		    //Deletes register.
		    if(isset($_GET['supmembre'])){
		    	//Delete register on database if Etudiant
		    	$supprime_membre = null;
		    	$is_training_enable = false;
		    	if($_GET['statutmember'] == "Etudiant"){
		    		$supprime_membre_student = $db->query("DELETE FROM Student WHERE user_id = ".$_GET['supmembre']."");
		    		if ($supprime_membre_student)
		    			$supprime_membre = $db->query(" DELETE FROM User WHERE user_id = ".$_GET['supmembre']."");
		    	}
		    //Deletes register on database.
		    //$supprime_membre = $db->query("DELETE FROM User WHERE user_id = ".$_GET['supmembre']."");
		    //If errors
		    	else{
		    		$istraining = $db->query("SELECT count(training_id) AS training_id FROM Training WHERE training_manager_id IN (SELECT training_manager_id FROM Training_manager WHERE user_id = ".$_GET['supmembre'].")");
		    		$istraining2 = $istraining -> fetch();
		    		if(0 == $istraining2['training_id']){
		    			$supprime_membre_rf = $db->query("DELETE FROM Training_manager WHERE user_id = ".$_GET['supmembre']."");
		    			if ($supprime_membre_rf){
		    				$supprime_membre = $db->query(" DELETE FROM User WHERE user_id = ".$_GET['supmembre']."");
		    			}
		    		}
		    		else{
		    			$is_training_enable = true;
		    		}
		    	}
		    	if ($is_training_enable){
		    		echo '<div class="ok">Ce responsable de formation ne peut être supprimé car il est responsable d\'une formation.</div>';
		    		$is_training_enable = false;
		    	}
			    else if (!$supprime_membre){
	                die('Requête invalide : ' . $db->errorInfo()[1]);
	            }
	            else{
		        //Informations and redirect
		        echo '<div class="ok">Membre supprimé avec succès. Redirection en cours...</div><script type="text/javascript"> window.setTimeout("location=(\'admin.php\');",3000) </script>';
			    }
		    }
			//}
			if(isset($_POST['Modifier'])){
			//Select users' firstname, lastname and email
	            $data = $db->query("SELECT user_name, user_firstname, user_instituteemail FROM User") or die ('Erreur :'.$db->errorInfo());
	            while($result1 = $data->fetch()){
	                //If the element submit is different of the element stored in databse, change element
	                //and if the element has is the same as an other element in the databse, user get information
	                if(($_POST['user_name']!=$name_register) && ($_POST['user_name']==$result1['user_name'])){
	                    echo '<div class="erreur">Ce pseudo « '.$_POST['user_name'].' » est utilisé!</div>'; return false;
	                }
	                if(($_POST['user_firstname']!=$firstname_register) && ($_POST['user_firstname']==$result1['user_firstname'])){
	                    echo '<div class="erreur">Ce pseudo « '.$_POST['user_firstname'].' » est utilisé!</div>'; return false;
	                }
	                //idem pour l'email
	                if(($_POST['email']!=$email_register) && ($_POST['email']==$result1['user_instituteemail'])){
	                    echo '<div class="erreur">Cet email « '.$_POST['email'].' » est utilisé!</div>'; return false;
	                }
				}
				//If first and last name empty
		        if(empty($_POST['user_name'])){
		            echo '<div class="erreur">Veuillez saisir un nom!</div>';
		        }
		        else if(empty($_POST['user_firstname'])){
		            echo '<div class="erreur">Veuillez saisir un prénom!</div>';
		        }
		        //If email empty
		        else if(empty($_POST['email'])){
		            echo '<div class="erreur">Veuillez saisir un email!</div>';
		        }
		        //If wrong email
		        else if (!preg_match("$[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\.[a-z]{2,4}$",$_POST['email'])){
		            echo '<div class="erreur">Veuillez saisir un email valide!</div>';
		        }
		        //If user_type empty
		        else if($_POST['statut']==''){
		            echo '<div class="erreur">Veuillez saisir le statut du membre!</div>';
		        }
		        //If all correct, changes send 
		        else{
                    $changementToRF = true;


                    //if we want to turn a training manager into a student
                    if($_POST['statut'] == "Etudiant" && $statut_register == "RF"){

                        $select_trainer_id_from_user = $db->query("SELECT training_manager_id FROM Training_manager WHERE user_id = $id_register");
                        $id_trainer = $select_trainer_id_from_user->fetch();


                        $select_training = $db->query("SELECT * FROM Training WHERE training_manager_id = $id_trainer[0]");
                        $re = $select_training->fetch();
                        //if the trainer has responsability in formation, we do not change his type
                        if ($re){

                            $modif = $db->query('UPDATE User SET user_name="'.htmlspecialchars($_POST['user_name']).'",
		            									 user_firstname="'.htmlspecialchars($_POST['user_firstname']).'",
		            									 user_instituteemail="'.htmlspecialchars($_POST['email']).'"
		            									 WHERE user_id='.$id_register.'');
                            $changementToRF = false;

                        }else{

                            $modif = $db->query('UPDATE User SET user_name="'.htmlspecialchars($_POST['user_name']).'",
		            									 user_firstname="'.htmlspecialchars($_POST['user_firstname']).'",
		            									 user_instituteemail="'.htmlspecialchars($_POST['email']).'",
		            									 user_type="'.htmlspecialchars($_POST['statut']).'"
		            									 WHERE user_id='.$id_register.'');

                            //else we can change his type
                            $modif1 = $db->query("DELETE FROM Training_manager WHERE user_id=$id_register") or die ('Erreur :'.$db->errorInfo());
                            $modif2 = $db->query("INSERT INTO Student (user_id, student_instituteemail) VALUES ($id_register, '".stripcslashes($_POST['email'])."')");
                        }




                    }elseif($_POST['statut'] == "RF" && $statut_register == "Etudiant") {

                        $modif = $db->query('UPDATE User SET user_name="'.htmlspecialchars($_POST['user_name']).'",
		            									 user_firstname="'.htmlspecialchars($_POST['user_firstname']).'",
		            									 user_instituteemail="'.htmlspecialchars($_POST['email']).'",
		            									 user_type="'.htmlspecialchars($_POST['statut']).'"
		            									 WHERE user_id='.$id_register.'');

                        $modif1 = $db->query("DELETE FROM Student WHERE user_id=$id_register") or die ('Erreur :'.$db->errorInfo());

                        $modif2 = $db->query("INSERT INTO Training_manager (user_id) VALUES ($id_register)") or die ('Erreur :' . $db->errorInfo());

                    }else{
                        $modif = $db->query('UPDATE User SET user_name="'.htmlspecialchars($_POST['user_name']).'",
		            									 user_firstname="'.htmlspecialchars($_POST['user_firstname']).'",
		            									 user_instituteemail="'.htmlspecialchars($_POST['email']).'"
		            									 WHERE user_id='.$id_register.'');
                        if ($result_isAdmin && $_POST['is_admin'] == 0) {
                        	$supAdmin = $db->query("DELETE FROM Administrator WHERE user_id =". $id_register)  or die ('Erreur :'.$db->errorInfo());
                        }
                        elseif (!$result_isAdmin && $_POST['is_admin'] == 1) {
                        	$addAdmin = $db->query("INSERT INTO Administrator (user_id) VALUES (".$id_register.")")  or die ('Erreur :'.$db->errorInfo());
                        }
                    }


                    if(!$modif)
                        die('Requête invalide : ' . $db->errorInfo()[1]);

                    if ($changementToRF){
                        echo '<div class="ok">Profil du membre modifié avec succès. Redirection en cours...</div><script type="text/javascript"> window.setTimeout("location=(\'admin.php\');",3000) </script>';

                    }else{
                        echo '<div class="ok">Profil du membre modifié à l\'exception du type. Redirection en cours...</div><script type="text/javascript"> window.setTimeout("location=(\'admin.php\');",3000) </script>';
                    }
                }
            }
        }

		/**
		 * Show the error page.
		 */
		public function showErrorPage() {

			echo '<div class="col s12 m12">
					<div class="card-panel teal center-align" id="errorpage">
							<h3>Cette page n\'existe pas !</h3>
							<p>Redirection en cours vers la page d\'accueil</span></p>
							<img src="../../img/loadingsearch.gif">
					</div>
			</div>';
		}
    }

