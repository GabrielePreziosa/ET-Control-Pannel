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
			//TODO Controllo se è un cliente, tecnico o amministratore
			switch($_SESSION["user_ruolo"]){
				case "Cliente":
		?>
		
			<li class="tab"><a class="active" href="">Home</a></li>
			<li class="tab"><a class="" href="">Preventivi</a></li>
			<li class="tab"><a href="">Commissioni in corso</a></li>
			<li class="tab"><a href="">Cloud</a></li>
			<li class="tab"><a href="">Fatturazione</a></li>
			<li class="tab"><a href="">Impostazioni</a></li>
		<?php
			break;
			
			case "Tecnico":
		?>
			<li class="tab"><a class="active" href="">Home</a></li>
			<li class="tab"><a class="" href="">Commissioni in corso</a></li>
			<li class="tab"><a class="" href="">Storico commissioni</a></li>
			<li class="tab"><a class="" href="">Nuove commissioni</a></li>
			<li class="tab"><a class="" href="">Ticket</a></li>
		<?php
			break;
			case "Amministratore":
		?>
			<li class="tab"><a class="active" href="">Home</a></li>
			<li class="tab"><a class="" href="">Commissioni in corso</a></li>
			<li class="tab"><a class="" href="">Ticket</a></li>
			<li class="tab"><a class="" href="">Nuove richieste</a></li>
			<li class="tab"><a class="" href="">Tecnici</a></li>
			<li class="tab"><a class="" href="">Fatturazione</a></li>
			<li class="tab"><a class="" href="">Cloud</a></li>
		<?php
			
			break;
			}
		?>
			

      </ul>
    </div>
    </nav>
	
	
</body>
</html>