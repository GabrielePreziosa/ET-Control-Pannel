<?php
	session_start();
	if (!isset($_SESSION["user_email"])) {
		header("location: index.php");
	}
	require "get.php";
	require "mysql.php";
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
		<script>
				$(document).ready(function() {
				$('select').material_select();
				});
		</script>
		<style>
			.spaziatura p{
				padding-bottom: 30px;
			}
			
			.btn-verde{
				background-color: #42bf5d;
			}
			.btn-rosso{
				background-color: #bf4242;
			}
			
			nav{
				//background-color: #0e0e0e;
			}
		</style>
</head>
<body>

	<nav class="nav-extended">
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo center"><?php require "config.php"; echo $website_name;?></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
	  <ul id="nav-mobile" class="right hide-on-med-and-down">
		<li>Bentornato, <?php echo $_SESSION["user_name"];?></li>
		<li><a class="waves-effect waves-light btn" href="logout.php"><i class="material-icons left">power_settings_new</i>Logout</a></li>
		
      </ul>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-fixed-width tabs-transparent">
		<?php
			switch(getRuolo($_SESSION["user_email"])){
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
		switch(getRuolo($_SESSION["user_email"])){
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
			
			
			<div id="CPreventivi" class="">
			  <div class="row ">
				<div class="col s12 m4 l2" ></div>
				<div class="col s12 m4 l8">
				  <div class="card">
					<div class="card-content">
					  <h3 class="center-align">Fai un preventivo</h3>
					   <div class="row">
						<form class="col s12" action="" method = "POST">
						  <div class="row">
							<div class="input-field col s6">
							<?php
								require 'config.php';
							?>
								<select>
								  <option value="" disabled selected>Seleziona la categoria</option>
								  <?php 
									foreach($categorie as $categoria) 
											echo "<option value='$i+1'>$categoria[0]</option>";
									
								  ?>
								  
								</select>
								<label>Seleziona una categoria</label>
							</div>
							<div class="input-field col s6">
								<select>
								  <option value="" disabled selected>Seleziona un servizio</option>
								  <option value="1">Creazione applicazione desktop</option>
								  <option value="2">Creazione app android</option>
								  <option value="3">Update software</option>
								</select>
								<label>Seleziona un servizio</label>
							</div>
						  </div>
						  <div class="row">
							<div class="input-field col s12">
							  <textarea name="descrizione"  class="materialize-textarea"></textarea>
							  <label for="descrizione">Descrizione del lavoro</label>
							</div>
						  </div>

						  <div class="row">
							<div class="input-field col s12">
							  <textarea name="descrizione"  class="materialize-textarea"></textarea>
							  <label for="descrizione">Note aggiuntive o particolari richieste</label>
							</div>
						  </div>
						  <div class="row">
							<div class="col s12">
							  Budget massimo:
							  <div class="input-field inline">
								<input id="budget" type="number">
								<label for="budget" data-error="wrong" data-success="right">Inserisci l'importo</label>
							  </div>
							</div>
						  </div>
						  
						  <div class="row">
							<div class="input-field col s12">
								<input class="waves-effect waves-light btn" type="submit" value="Invia"></input>
							</div>
						  </div>
						</form>
					  </div>
					</div>
				  </div>
				</div>
				<div class="col s12 m4 l2" ></div>
			  </div>			
			</div>
			
			
			<div id="CInCorso" class="">
			  <div class="row ">
				<div class="col s12 m4 l2" ></div>
				<div class="col s12 m4 l8">
				  <h3 class="center-align">Commissioni in corso</h3><br><br>
				  <?php
				  	$sql = $mysqli->query("SELECT * FROM commissioni WHERE EMAIL_CLIENTE LIKE '$_SESSION[user_email]' AND DATA_FINE='0'");
					
					if($sql->num_rows){
						$row = mysqli_fetch_assoc($sql);
					?>
						<div class="card">
							<div class="card-content">
								<div class="row ">
									<img class="col s1" src ="img/categorie/<?php echo $row['CATEGORIA']?>.png" />
									<div class="col s8 spaziatura" style="text-align: justify">
										<p><b>Categoria:</b> <?php echo $row['CATEGORIA']?></p>
										<p><b>Servizio:</b> <?php echo $row['SERVIZIO']?></p>
										<p><b>Descrizione:</b> <?php echo $row['DESCRIZIONE']?></p>
										<p><b>Note aggiuntive:</b> <?php echo $row['NOTE']?></p>
										<p><b>Budget massimo:</b> €<?php echo $row['BUDGET']?></p>
									</div>
									<div class="col s3 center-align" >
										 <a class="waves-effect waves-light btn"><i class="material-icons right">create</i>Modifica</a>
									</div>
								</div>
							</div>
						</div>
					  
						<br><br><br><br>
					<?php
					}else{
					?>
						<div class="card">
							<div class="card-content">
								<div class="row ">
									<img class="col s1" src="img/varie/divieto.png" />
									<div class="col s8 spaziatura center-align" style="text-align: justify">
										<p><b> Non ci sono commissioni da visualizzare</b></p>
									</div>
									<div class="col s3 center-align" ></div>
								</div>
							</div>
						</div>
					<?php
					}
				  ?>
				  
				</div>
				<div class="col s12 m4 l2" ></div>
			  </div>				
			</div>
			<div id="CFatturazione" class="">
				  <h3 class="center-align">Fatturazione</h3><br><br>			
				  <div class="card">
					  <nav>
						<div class="nav-wrapper">
						  <ul id="nav-mobile" class="left hide-on-med-and-down">
							<li><a href="#CFatturazione2018">2018</a></li>
						  </ul>
						</div>
					  </nav>
				  </div>
			</div>
			<div id="CImpostazioni" class="">
			  <div class="row ">
				<div class="col s12 m4 l2" ></div>
				<div class="col s12 m4 l8">
					<h3 class="center-align">Modifica le impostazioni dell'account</h3><br><br>
						<ul class="collapsible popout" data-collapsible="accordion">

						<li>
						  <div class="collapsible-header">
							<i class="material-icons">settings</i>Modifica password:
							<div class="right-align"></div>
						  </div>
						  <div class="collapsible-body" style="text-align: justify">
							  <div class="row">
								<div class="input-field col s10">
								  <input placeholder="Inserire la password attuale..." name="p_actual_pwd" type="password" class="validate">
								  <label for="first_name">Password attuale</label>
								</div>
							  </div>
							  <div class="row">
								<div class="input-field col s5">
								  <input placeholder="Inserire la nuova password..." name="new_pwd1" type="password" class="validate">
								  <label for="first_name">Nuova password</label>
								</div>
								<div class="input-field col s5">
								  <input placeholder="Ripetere la nuova password..." name="new_pwd2" type="password" class="validate">
								  <label for="first_name">Ripeti nuova password</label>
								</div>
							  </div>
							  <button class="waves-effect waves-light btn btn-verde"><i class="material-icons right">send</i>Salva</button>
							  
						  </div>
						</li>
	
						<li>
						  <div class="collapsible-header">
							<i class="material-icons">email</i>Modifica email:
							<div class="right-align"></div>
						  </div>
						  <div class="collapsible-body" style="text-align: justify">
							  <div class="row">
								<div class="input-field col s5">
								  <input placeholder="Inserire la email attuale..." name="e_actual_email" type="email" class="validate">
								  <label for="first_name">Email attuale</label>
								</div>
								<div class="input-field col s5">
								  <input placeholder="Inserire la password..." name="e_actual_pwd" type="password" class="validate">
								  <label for="first_name">Password</label>
								</div>
							  </div>
							  <div class="row">
								<div class="input-field col s5">
								  <input placeholder="Inserire la nuova email..." name="new_email1" type="email" class="validate">
								  <label for="first_name">Nuova email</label>
								</div>
								<div class="input-field col s5">
								  <input placeholder="Ripetere la nuova email..." name="new_email2" type="email" class="validate">
								  <label for="first_name">Ripeti nuova email</label>
								</div>
							  </div>
							  <button class="waves-effect waves-light btn btn-verde"><i class="material-icons right">send</i>Salva</button>
							  
						  </div>
						</li>	
						
						<li>
						  <div class="collapsible-header">
							<i class="material-icons">person</i>Modifica dati personali:
							<div class="right-align"></div>
						  </div>
						  <div class="collapsible-body" style="text-align: justify">
							  <div class="row">
								<div class="input-field col s5">
								  <input placeholder="Inserire la email attuale..." name="d_actual_email" type="email" class="validate">
								  <label for="first_name">Email attuale</label>
								</div>
								<div class="input-field col s5">
								  <input placeholder="Inserire la password..." name="d_actual_pwd" type="password" class="validate">
								  <label for="first_name">Password</label>
								</div>
							  </div>
							  <div class="row">
								<div class="input-field col s5">
								  <input placeholder="Inserire il nuovo nome..." name="d_nome" type="text" class="validate">
								  <label for="first_name">Nome</label>
								</div>
								<div class="input-field col s5">
								  <input placeholder="Inserire il nuovo cognome..." name="d_cognome" type="text" class="validate">
								  <label for="first_name">Cognome</label>
								</div>
							  </div>
							  <button class="waves-effect waves-light btn btn-verde"><i class="material-icons right">send</i>Salva</button>
							  
						  </div>
						</li>
					  </ul>
				</div>
				<div class="col s12 m4 l2" ></div>
			  </div>				
			</div>
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
					  <p>Bentornato <?php echo $_SESSION["user_name"]; ?>. Ricordati di aggiornare periodicamente lo stato dei lavori per tenere il cliente sempre aggiornato.</p>
					</div>
				  </div>
				</div>
				<div class="col s12 m4 l2" ></div>
			  </div>
			</div>
			<div id="TInCorso" class="">
			  <div class="row ">
				<div class="col s12 m4 l2" ></div>
				<div class="col s12 m4 l8">
				  <h3 class="center-align">Commissioni in corso</h3><br><br>
				  
				  <?php
				  	$sql = $mysqli->query("SELECT * FROM commissioni WHERE EMAIL_TECNICO LIKE '$_SESSION[user_email]' AND DATA_FINE='0' AND ACCETTATO='Si'");
					
					if($sql->num_rows){
						$row = mysqli_fetch_assoc($sql);
					?>
				  <div class="card">
					<div class="card-content">
						<div class="row ">
							<img class="col s1" src ="img/categorie/<?php echo $row['CATEGORIA']?>.png" />
							<div class="col s8 spaziatura" style="text-align: justify">
								<p><b>Cliente:</b> <?php echo getCognomeNome($row['EMAIL_CLIENTE'])?></p>							
								<p><b>Categoria:</b> <?php echo $row['CATEGORIA']?></p>
								<p><b>Servizio:</b> <?php echo $row['SERVIZIO']?></p>
								<p><b>Descrizione:</b> <?php echo $row['DESCRIZIONE']?></p>
								<p><b>Note aggiuntive:</b> <?php echo $row['NOTE']?></p>
								<p><b>Budget massimo:</b> €<?php echo $row['BUDGET']?></p>
							</div>
							<div class="col s3 center-align" >
								 <a class="waves-effect waves-light btn"><i class="material-icons right">email</i>Apri ticket</a>
							</div>
						</div>
					</div>
				  </div>
				  
				  <br><br><br><br>
				  
				  <?php
					}else{
					?>
						<div class="card">
							<div class="card-content">
								<div class="row ">
									<img class="col s1" src="img/varie/divieto.png" />
									<div class="col s8 spaziatura center-align" style="text-align: justify">
										<p><b> Non ci sono commissioni da visualizzare</b></p>
									</div>
									<div class="col s3 center-align" ></div>
								</div>
							</div>
						</div>
					<?php
					}
				  ?>
				  
				</div>
				<div class="col s12 m4 l2" ></div>
			  </div>			
			</div>
			<div id="TStorico" class="">
			  <h3 class="center-align">Storico commissioni</h3>
			  <div class="row ">
				<div class="col s12 m4 l2" ></div>
				<div class="col s12 m4 l8">
				<ul class="collapsible popout" data-collapsible="accordion">
				<?php
				  	$sql = $mysqli->query("SELECT * FROM commissioni WHERE EMAIL_TECNICO LIKE '$_SESSION[user_email]' AND DATA_FINE!='0'");
					
					if($sql->num_rows){
						$row = mysqli_fetch_assoc($sql);
					?>
						<li>
						  <div class="collapsible-header">
							<i class="material-icons">filter_drama</i>
							<b style="margin-right: 5px;">Cliente: </b> <?php echo getCognomeNome($row['EMAIL_CLIENTE']);?>
							<div class="right-align"></div>
						  </div>
						  <div class="collapsible-body" style="text-align: justify">
							<p><b>Data inizio:</b> <?php echo $row['DATA_INIZIO'];?></p>
							<p><b>Data termine:</b> <?php echo $row['DATA_FINE'];?></p>
							<p><b>Categoria:</b> <?php echo $row['CATEGORIA'];?></p>
							<p><b>Servizio:</b> <?php echo $row['SERVIZIO'];?></p>
							<p><b>Descrizione:</b> <?php echo $row['DESCRIZIONE'];?></p>
							<p><b>Note aggiuntive:</b> <?php echo $row['NOTE'];?></p>
							<p><b>Budget:</b> €<?php echo $row['BUDGET'];?></p>
							<p><b>Prezzo finale:</b> €<?php echo $row['PREZZO_FINALE'];?></p>
							<br><br>
							<a class="waves-effect waves-light btn"><i class="material-icons right">email</i>Visualizza ticket</a>						
						  </div>
						</li>
						 <?php
						}else{
						?>
							<div class="card">
								<div class="card-content">
									<div class="row ">
										<img class="col s1" src="img/varie/divieto.png" />
										<div class="col s8 spaziatura center-align" style="text-align: justify">
											<p><b> Non ci sono commissioni da visualizzare</b></p>
										</div>
										<div class="col s3 center-align" ></div>
									</div>
								</div>
							</div>
						<?php
						}
					  ?>						
					  </ul>						
				</div>
				<div class="col s12 m4 l2" ></div>
			  </div>
			</div>
			<div id="TNuove" class="">
			  <h3 class="center-align">Nuove richieste</h3><br><br>
			  <div class="row ">
				<div class="col s12 m4 l2" ></div>
				<div class="col s12 m4 l8">
				<ul class="collapsible popout" data-collapsible="accordion">
				<?php
				  	$sql = $mysqli->query("SELECT * FROM commissioni WHERE EMAIL_TECNICO LIKE '$_SESSION[user_email]' AND ACCETTATO LIKE 'No'");
					
					if($sql->num_rows){
						$row = mysqli_fetch_assoc($sql);
					?>
						<li>
						  <div class="collapsible-header">
							<i class="material-icons">filter_drama</i>
							<b style="margin-right: 5px;">Cliente: </b> <?php echo getCognomeNome($row['EMAIL_CLIENTE']);?>
							<div class="right-align"></div>
						  </div>
						  <div class="collapsible-body" style="text-align: justify">
							<p><b>Data inizio:</b> <?php echo $row['DATA_INIZIO'];?></p>
							<p><b>Categoria:</b> <?php echo $row['CATEGORIA'];?></p>
							<p><b>Servizio:</b> <?php echo $row['SERVIZIO'];?></p>
							<p><b>Descrizione:</b> <?php echo $row['DESCRIZIONE'];?></p>
							<p><b>Note aggiuntive:</b> <?php echo $row['NOTE'];?></p>
							<p><b>Budget massimo:</b> €<?php echo $row['BUDGET'];?></p>
							<br><br>
							<div class="input-field inline" style="margin-right: 20px;">
								<input id="budget" type="number">
								<label for="budget" data-error="wrong" data-success="right">Inserisci il costo </label>
							</div>
							<a class="waves-effect waves-light btn btn-verde"><i class="material-icons right">check</i>Accetta</a>						
							<a class="waves-effect waves-light btn btn-rosso"><i class="material-icons right">clear</i>Rifiuta</a>						
							
						  </div>
						</li>
						 <?php
						}else{
						?>
							<div class="card">
								<div class="card-content">
									<div class="row ">
										<img class="col s1" src="img/varie/divieto.png" />
										<div class="col s8 spaziatura center-align" style="text-align: justify">
											<p><b> Non ci sono commissioni da visualizzare</b></p>
										</div>
										<div class="col s3 center-align" ></div>
									</div>
								</div>
							</div>
						<?php
						}
					  ?>	
												
					  </ul>						
				</div>
				<div class="col s12 m4 l2" ></div>
			  </div>
			</div>
			<div id="TTicket" class="">
			  <h3 class="center-align">Ticket</h3><br><br>  
			  <div class="row ">
				<div class="col s12 m4 l2" ></div>
				<div class="col s12 m4 l8">
					  <ul class="collection">
						<li class="collection-item avatar">
						  <i class="material-icons circle">folder</i>
						  <span class="title"><b>Rossi Mario</b></span>
						  <p><b>Data: </b> 10/01/2018 <br>
							<b>Commissione: </b>Creazione portale web<br> 
						  </p>
						  <a href="" class="secondary-content"><i class="material-icons">send</i></a>
						</li>
						<li class="collection-item avatar">
						  <i class="material-icons circle">folder</i>
						  <span class="title"><b>Verdi Giovanni</b></span>
						  <p><b>Data: </b> 10/08/2017 <br>
							<b>Commissione: </b>Creazione app android<br> 
						  </p>
						  <a href="" class="secondary-content"><i class="material-icons">send</i></a>
						</li>						
					  </ul>
				</div>
				<div class="col s12 m4 l2" ></div>
			  </div>			
			</div>
	
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
			<div id="AInCorso" class="">
			  <div class="row ">
				<div class="col s12 m4 l2" ></div>
				<div class="col s12 m4 l8">
				  <h3 class="center-align">Commissioni in corso</h3><br><br>
				  
				  <?php
				  	$sql = $mysqli->query("SELECT * FROM commissioni WHERE DATA_FINE = '0' AND INIZIATO = 'Si'");
					
					if($sql->num_rows){
						$row = mysqli_fetch_assoc($sql);
						$id = $row['id'];
					?>
				  <div class="card">
					<div class="card-content">
						<div class="row ">
							<img class="col s1" src ="data:image/png;base64,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" />
							<div class="col s8 spaziatura" style="text-align: justify">
								<p><b>Tecnico:</b> <?php echo getCognomeNome($row['EMAIL_TECNICO']) . " (" . isAccept($id) . ")" ;?></p>							
								<p><b>Cliente:</b> <?php echo getCognomeNome($row['EMAIL_CLIENTE']);?></p>							
								<p><b>Categoria:</b> <?php echo $row['CATEGORIA'];?></p>
								<p><b>Servizio:</b> <?php echo $row['SERVIZIO'];?></p>
								<p><b>Descrizione:</b> <?php echo $row['DESCRIZIONE'];?></p>
								<p><b>Note aggiuntive:</b> <?php echo $row['NOTE'];?></p>
								<p><b>Budget massimo:</b> €<?php echo $row['BUDGET'];?></p>
								<p><b>Prezzo:</b> €<?php echo $row['PREZZO_FINALE'];?></p>
							</div>
							<div class="col s3 center-align" >
								 <a class="waves-effect waves-light btn"><i class="material-icons right">email</i>Apri ticket</a>
							</div>
						</div>
					</div>
				  </div>
				  
				  <br><br><br><br>
				   <?php
						}else{
						?>
							<div class="card">
								<div class="card-content">
									<div class="row ">
										<img class="col s1" src="img/varie/divieto.png" />
										<div class="col s8 spaziatura center-align" style="text-align: justify">
											<p><b> Non ci sono commissioni da visualizzare</b></p>
										</div>
										<div class="col s3 center-align" ></div>
									</div>
								</div>
							</div>
						<?php
						}
					  ?>	
				  
				</div>
				<div class="col s12 m4 l2" ></div>
			  </div>			
			</div>
			<div id="ATicket" class="">
			  <h3 class="center-align">Ticket</h3><br><br>  
			  <div class="row ">
				<div class="col s12 m4 l2" ></div>
				<div class="col s12 m4 l8">
					  <ul class="collection">
						<li class="collection-item avatar">
						  <i class="material-icons circle">folder</i>
						  <span class="title"><b>Rossi Mario</b></span>
						  <p><b>Data: </b> 10/01/2018 <br>
							<b>Commissione: </b>Creazione portale web<br> 
							<b>Tecnico: </b>Lafasciano Nicolò<br> 
						  </p>
						  <a href="" class="secondary-content"><i class="material-icons">send</i></a>
						</li>
						<li class="collection-item avatar">
						  <i class="material-icons circle">folder</i>
						  <span class="title"><b>Verdi Giovanni</b></span>
						  <p><b>Data: </b> 10/08/2017 <br>
							<b>Commissione: </b>Creazione app android<br> 
							<b>Tecnico: </b>Fucci Andrea<br> 
						  </p>
						  <a href="" class="secondary-content"><i class="material-icons">send</i></a>
						</li>						
					  </ul>
				</div>
				<div class="col s12 m4 l2" ></div>
			  </div>			
			</div>
			<div id="ANuove" class="">
			  <h3 class="center-align">Nuove richieste</h3><br><br>
			  <div class="row ">
				<div class="col s12 m4 l2" ></div>
				<div class="col s12 m4 l8">
				<ul class="collapsible popout" data-collapsible="accordion">
					<?php
				  	$sql = $mysqli->query("SELECT * FROM commissioni WHERE INIZIATO = 'No'");
					
					if($sql->num_rows){
						$row = mysqli_fetch_assoc($sql);
						$id = $row['id'];
					?>	
						<li>
						  <div class="collapsible-header">
							<i class="material-icons">filter_drama</i>
							<b style="margin-right: 5px;">Cliente: </b> <?php echo getCognomeNome($row['EMAIL_CLIENTE']);?>
							<div class="right-align"></div>
						  </div>
						  <div class="collapsible-body" style="text-align: justify">
							<p><b>Data:</b> <?php echo $row['DATA_INIZIO'];?></p><br>
							<p><b>Categoria:</b> <?php echo $row['CATEGORIA'];?></p>
							<p><b>Servizio:</b> <?php echo $row['SERVIZIO'];?></p>
							<p><b>Descrizione:</b> <?php echo $row['DESCRIZIONE'];?></p>
							<p><b>Note aggiuntive:</b> <?php echo $row['NOTE'];?></p>
							<p><b>Budget massimo:</b> €<?php echo $row['BUDGET'];?></p>
							<br><br>
							<div class="row">
								<div class="col s8">
									<select>
									  <option value="" disabled selected>Seleziona a chi assegnare il lavoro</option>
									  <option value="1">Fucci Andrea</option>
									  <option value="2">Lafasciano Nicolò</option>
									  <option value="3">Preziosa Gabriele</option>
									  <option value="4">Valori Daniele</option>
									</select>
								</div>
								<div class="col s1"></div>
								<div class="col s3">
									<a class="waves-effect waves-light btn"><i class="material-icons right">send</i>Assegna</a>
								</div>
							</div>
						  </div>
						</li>
						<?php
						}else{
						?>
							<div class="card">
								<div class="card-content">
									<div class="row ">
										<img class="col s1" src="img/varie/divieto.png" />
										<div class="col s8 spaziatura center-align" style="text-align: justify">
											<p><b> Non ci sono commissioni da visualizzare</b></p>
										</div>
										<div class="col s3 center-align" ></div>
									</div>
								</div>
							</div>
						<?php
						}
					  ?>							
					  </ul>						
				</div>
				<div class="col s12 m4 l2" ></div>
			  </div>			
			</div>
			
			<div id="ATecnici" class="">
			  <div class="row ">
				<div class="col s12 m4 l2" ></div>
				<div class="col s12 m4 l8">
					<div class="row">
					<?php
				  	$sql = $mysqli->query("SELECT * FROM tecnici");
					
					if($sql->num_rows){
						$row = mysqli_fetch_assoc($sql);
						$id = $row['id'];
					?>
						<div class="col s4">
						  <div class="card">
							<div class="card-image waves-effect waves-block waves-light">
							  <img class="activator" src="http://www.t3basilicata.com/wp-content/uploads/2017/12/D_Amato.jpg" >
							</div>
							<div class="card-content">
							  <span class="card-title activator grey-text text-darken-4"><?php echo $row['COGNOME'] . " ". $row['NOME']?><i class="material-icons right">more_vert</i></span>
							</div>
							<div class="card-reveal">
							  <span class="card-title grey-text text-darken-4"><?php echo $row['COGNOME'] . " ". $row['NOME']?><i class="material-icons right">close</i></span>
							  <p><b>Ruolo: </b> <?php echo $row['RUOLO'] ?></p>
							  <p><b>Data di assunzione: </b> <?php echo $row['DATA_ASSUNZIONE'] ?></p>
							</div>
						  </div>
						</div>
					<?php
						}else{
						?>
							<div class="card">
								<div class="card-content">
									<div class="row ">
										<img class="col s1" src="img/varie/divieto.png" />
										<div class="col s8 spaziatura center-align" style="text-align: justify">
											<p><b> Non ci sono tecnici da visualizzare</b></p>
										</div>
										<div class="col s3 center-align" ></div>
									</div>
								</div>
							</div>
						<?php
						}
					  ?>	
						
					</div>
				</div>
				<div class="col s12 m4 l2" >
					<a style="text-align: center; color: #13a01f" href=""><i class="material-icons large" style="margin-top: 2%; position: fixed">add_circle</i></a>
				</div>
			  </div>			
			</div>	
			<div id="AFatturazione" class="">Test 6</div>	
	<?php
			break;
		}
	?>
	
</body>
</html>