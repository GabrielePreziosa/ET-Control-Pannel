<?php
	session_start();
	if (!isset($_SESSION["user_email"])) {
		header("location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
    <!--LIBRARY-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <title>EndlessTeamwork - Home</title>
</head>
<body>

	<nav class="nav-extended">
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo center"><?php require "config.php"; echo $website_name;?></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
	  <ul id="nav-mobile" class="right hide-on-med-and-down">
		<li><a class="waves-effect waves-light btn" href="logout.php"><i class="material-icons left">power_settings_new</i>Logout</a></li>
      </ul>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-fixed-width tabs-transparent">
		<?php
			switch($_SESSION["user_ruolo"]){
				case "Cliente":
		?>
		
			<li class="tab"><a class="active" href="#CHome">Home</a></li>
			<li class="tab"><a class="" href="#CPreventivi">Preventivi</a></li>
			<li class="tab"><a href="#CInCorso">Commissioni in corso</a></li>
			<li class="tab"><a onClick="location.href='http://areaclienti.endlessteamwork.it'">Cloud</a></li>
			<li class="tab"><a href="#CFatturazione">Fatturazione</a></li>
			<li class="tab"><a href="#CImpostazioni">Impostazioni</a></li>
		<?php
			break;
			case "Tecnico":
		?>
			<li class="tab"><a class="active" href="#THome">Home</a></li>
			<li class="tab"><a class="" href="#TInCorso">Commissioni in corso</a></li>
			<li class="tab"><a class="" href="#TStorico">Storico commissioni</a></li>
			<li class="tab"><a class="" href="#TNuove">Nuove commissioni</a></li>
			<li class="tab"><a class="" href="#TTicket">Ticket</a></li>
		<?php
			break;
			case "Amministratore":
		?>
			<li class="tab"><a class="active" href="#AHome">Home</a></li>
			<li class="tab"><a class="" href="#AInCorso">Commissioni in corso</a></li>
			<li class="tab"><a class="" href="#ATicket">Ticket</a></li>
			<li class="tab"><a class="" href="#ANuove">Nuove richieste</a></li>
			<li class="tab"><a class="" href="#ATecnici">Tecnici</a></li>
			<li class="tab"><a class="" href="#AFatturazione">Fatturazione</a></li>
			<li class="tab"><a onClick="location.href='http://areaclienti.endlessteamwork.it'">Cloud</a></li>
		<?php
			
			break;
			}
		?>
      </ul>
    </div>
    </nav>
	
	<?php
		switch($_SESSION["user_ruolo"]){
			case "Cliente":
	?>
			<div id="CHome" class="">
			  <div class="row ">
				<div class="col s12 m4 l2" ></div>
				<div class="col s12 m4 l8">
				  <div class="card">
					<div class="card-content">
					  <p>Contenitore della home dei clienti</p>
					</div>
				  </div>
				</div>
				<div class="col s12 m4 l2" ></div>
			  </div>
			</div>
			<div id="CPreventivi" class="">Test 2</div>
			<div id="CInCorso" class="">Test 3</div>
			<div id="CFatturazione" class="">Test 4</div>
			<div id="CImpostazioni" class="">Test 5</div>
	<?php
			break;
			case "Tecnico":
	?>
			<div id="THome" class="">
			  <div class="row ">
				<div class="col s12 m4 l2" ></div>
				<div class="col s12 m4 l8">
				  <div class="card">
					<div class="card-content">
					  <p>Contenitore della home dei tecnici</p>
					</div>
				  </div>
				</div>
				<div class="col s12 m4 l2" ></div>
			  </div>
			</div>
			<div id="TInCorso" class="">Test 2</div>
			<div id="TStorico" class="">Test 3</div>
			<div id="TNuove" class="">Test 4</div>
			<div id="TTicket" class="">Test 5</div>
	
	<?php
			break;
			case "Amministratore":
	?>
			<div id="AHome" class="">
			  <div class="row ">
				<div class="col s12 m4 l2" ></div>
				<div class="col s12 m4 l8">
				  <div class="card">
					<div class="card-content">
					  <p>Contenitore della home degli amministratori</p>
					</div>
				  </div>
				</div>
				<div class="col s12 m4 l2" ></div>
			  </div>			
			</div>
			<div id="AInCorso" class="">Test 2</div>
			<div id="ATicket" class="">Test 3</div>
			<div id="ANuove" class="">Test 4</div>
			<div id="ATecnici" class="">Test 5</div>	
			<div id="AFatturazione" class="">Test 6</div>	
	<?php
			break;
		}
	?>
	
</body>
</html>