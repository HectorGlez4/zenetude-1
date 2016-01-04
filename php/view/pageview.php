<?php
include_once '../model/db.php';
	class PageView {
		/**
			* Show the inscription's form.
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
			             	 	<label for="mail">Adresse email <em>*</em></label>
			            	</div>
			          	</div><!-- fin email -->

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
			* Include all javascript's links needed by the pages.
		**/
		public function showJavaLinks() {
		?>
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="../../js/materialize.js"></script>
		<script type="text/javascript" src="../../js/showmessage.js"></script>
		<script type="text/javascript" src="../../js/menu.js"></script>
		<script src="../../js/underscore-min.js"></script>
		<script src="../../js/moment-2.2.1.js"></script>
		<script src="../../js/clndr.js"></script>
		<script src="../../js/site.js"></script>
        <script src="../../js/trombi.js"></script>
		<script type="text/javascript" src="../../js/fonctions.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			$('select').material_select();
		});
		//$(document).ready(function(){showMessage();});

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
			* Show the first part of description in the index's page.
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
			* Show the footer.
		**/
		public function showFooter() {
			?>
			<footer></footer>
			<?php
		}


		/**
			* Show the calendar.
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
			* Include the head needed by pages
		**/
		public function showHead() {
			?>
			<head>
		    	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

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


				<!-- CALENDAR -->
			  	<link rel="stylesheet" href="../../css/clndr.css" type="text/css" />
				<link type="text/css" rel="stylesheet" href="../../css/calendar.css"/>

		     	 <!--Let browser know website is optimized for mobile-->
		      	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   			</head>
			<?php
		}


		/**
			* Show the header.
		**/
		public function showHeader($connect) {
			if(!$connect) {?>
			<nav>
	 		 	<div class="nav-wrapper">
				    <a href="./index.php" class="brand-logo"><img src="../../img/logo.png" alt="logo du site"></a>
				    <img src="../../img/name.png" alt="Zenetude, titre du site">
		  		</div>
			</nav>
			<?php
			}
			else {
			?>
			<nav>
	 		 	<div class="nav-wrapper">
				    <a href="./index.php" class="brand-logo"><img src="../../img/logo.png" alt="logo du site"></a>
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
			<?php
			}
		}


		/**
			* Show the static menu.
		**/
		public function showMenu($connect) {
			if(!$connect) {?>
			<div class="col s12 m4">
		        <div class="card-panel teal" id="aside1">
		          <div class="card-header"> <h2>Connexion</h2></div>

                  <!-- Formulaire -->
			        <form id="formula" class="col s10 push-s1" action="connexion.php" method="POST">
			
			
			          <!-- Contenu card -->
			         <div >
			
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
			        </form><!-- Fin formulaire -->
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
			* Show the dynamic menu bar. 
		**/
		public function showScrollMenu($connect, $userInfos, $rf = false) {
			if(!$connect) {?>
			<nav id="scroll-nav">
		  		<div class="nav-wrapper">
		    		<a href="" class="brand-logo"><img src="../../img/logo.png" alt="logo du site"></a>
		    		<img src="../../img/name.png" alt="Zenetude, titre du site">
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
					<li><a class="color" href="../model/deconnect.php">Déconnexion</a></li>

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
			<?php
			}
		}


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
	        	echo "<div id='noFormation'>Vous n'avez pas encore renseigné votre formation !</div></ br><a class='right-align' href='gestion.php'>Page gestion du profil</a>";
        }


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


		public function showAdministration($register/*, $selection*/){
			$db = connect();
			?>
			<form name="form" method="POST">
			<?php
			if(count($register) > 0){
				echo '<label for="register">Sélection du membre : </label>';
				echo '<select id="register" name="register" size=1 onchange="javascript:submit(this)" >';
				echo '<option value = "default" selected>Sélectionner l\'utilisateur</option>';
				while ($result=$register -> fetch()) {
					echo '<option value="'.$result['user_id'].'" ';
        			if(isset($_POST["register"]) && $_POST["register"]==$result['user_id']){echo "selected='selected'";}
        			//echo '>'.$result['user_firstname'].' '.$result['user_name'].'</option>';
					echo'>'.$result['user_instituteemail'].'</option>';
				}
				echo '</select>';
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
		        </select>

		        <button class="btn" type="submit" name="Modifier">Modifier</button>
				<a class="btn supp" href="admin.php?supmembre=<?= $id_register.'&amp;statutmember='.$statut_register;?>">Supprimer</a>
		    </form>
				<?php
 				}
			}
		    //Delete register
		    if(isset($_GET['supmembre'])){
		    	//Delete register on database if Etudiant
		    	$supprime_membre = null;
		    	$is_training_enable = false;
		    	if($_GET['statutmember'] == "Etudiant"){
		    		$supprime_membre_student = $db->query("DELETE FROM Student WHERE user_id = ".$_GET['supmembre']."");
		    		if ($supprime_membre_student)
		    			$supprime_membre = $db->query(" DELETE FROM User WHERE user_id = ".$_GET['supmembre']."");
		    	}
		    //Delete register on database
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
			if(isset($_POST['Envoyer'])){
			//Select users' firstname, lastname and email
	            $data = $db->query("SELECT user_name, user_firstname, user_instituteemail FROM User") or die ('Erreur :'.$db->errorInfo());
	            while($result1 = $data->fetch()){
	                //If the element submit is different of the element store in databse, change element
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
		        if(empty($_POST['user_firstname'])){
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
		            $modif = $db->query("UPDATE User SET user_name='".stripcslashes($_POST['user_name'])."',
		            									 user_firstname='".stripcslashes($_POST['user_firstname'])."',
		            									 user_instituteemail='".stripcslashes($_POST['email'])."',
		            									 user_type='".stripcslashes($_POST['statut'])."'
		            									 WHERE user_id=".$id_register."");

                    // If you change a student in training manager then we delete the student in the Student table and add a new training manager in Training_manager table if there is not already.
                    if($_POST['statut'] == "RF"){

                        $del_student = $db->query("DELETE FROM Student WHERE user_id=".$id_register." ") or die ('Erreur :'.$db->errorInfo());

                        $select_manager = $db->query("SELECT user_id FROM Training_manager WHERE user_id=".$id_register." ") or die ('Erreur :'.$db->errorInfo());

                        if($statut_register == "Etudiant")
                            $create_RF = $db->query("INSERT INTO Training_manager VALUES ('','$id_register') ") or die ('Erreur :' . $db->errorInfo());
                    }

                    if(!$modif) {

                        die('Requête invalide : ' . $db->errorInfo()[1]);

                    }
                    echo '<div class="ok">Profil du membre modifié avec succès. Redirection en cours...</div><script type="text/javascript"> window.setTimeout("location=(\'admin.php\');",3000) </script>';
                }
            }
        }
    }

