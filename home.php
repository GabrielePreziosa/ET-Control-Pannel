<?php
	session_start();
	if (!isset($_SESSION["user_email"])) {
		header("location: index.php");
	}
	require "get.php";
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
								<select>
								  <option value="" disabled selected>Seleziona la categoria</option>
								  <option value="1">Developing</option>
								  <option value="2">Grafica</option>
								  <option value="3">Website</option>
								  <option value="4">Videogame</option>
								  <option value="5">Setting</option>
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
				  <div class="card">
					<div class="card-content">
						<div class="row ">
							<img class="col s1" src ="data:image/png;base64,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" />
							<div class="col s8 spaziatura" style="text-align: justify">
								<p><b>Categoria:</b> Developing</p>
								<p><b>Servizio:</b> Creazione app android</p>
								<p><b>Descrizione:</b> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,</p>
								<p><b>Note aggiuntive:</b> Nessuna nota inserita</p>
								<p><b>Budget massimo:</b> €300</p>
							</div>
							<div class="col s3 center-align" >
								 <a class="waves-effect waves-light btn"><i class="material-icons right">create</i>Modifica</a>
							</div>
						</div>
					</div>
				  </div>
				  
				  <br><br><br><br>
				  
				  <div class="card">
					<div class="card-content">
						<div class="row ">
							<img class="col s1" src ="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAwFBMVEX/pQD/////owD//vz/pgD/79T/tz7/1ZL/qAX/05L/oQD/15v/4LL//ff/+ev/wmP/0X3/+vH/yHT/zHz/yG//7Mn/ukn/sjr/v13/9uX//Pf/vFb/0or/9N7/z4P/v2L/5r//rzH/7M7/3ab/rSH/6MD/rQD/4K7/vE7/4bb/0pL/79f/xWD/v1L/sSX/tjf/ymf/vkf/x3z/2qr/s0f/wm7/zIb/1J3/uTP/sjX/7cj/sCP/2qb/wGb/znX/u1tNkAUaAAAPfklEQVR4nNWdaWOiPBDHYUClQbF4bVHoWs9ar7bb7fH02O//rR7Ai5tJCIL/t4rh5+SYJJOJIOYtSer3+9ZQNc3r62vTNGuqOp8vpiPL6DuSpJzLF/L7aUnXDGNZN1fvMxItUGbVjjoyDK2R32vkRahVun9uV1vFBQEhRgBgf668r8zFaKnn8yZ5EBrd+lvHgYN4thDnrPf8tqjkYEvuhNb89buqJBkuDtOutL3nqylvU/IlNMatl4mANF2kMeW7QbvOFZIjoT5e3SkCK92JUpj86vzH77V4EUrWo4JtdwhTktmPxWkY4ULYN+pPdsvjQXekJMJ6qPU5vBwHQn1kbvji7USgqo6yd66ZCfVhe5IHnyMgm9du1m4nI6G+eP7Mi2/H+PGccfzIRNhYdDZ8OpcERrj7nmbpdLIQdm/ssS9fPpdRmKwqRRBqj3Le9jsygvyjnZtQU2d5tr8QI5mpjIxshPri/lz2OzLCesjU5TARjtrKmflcxskrS3NkIGyovXMbcI8IvTG9GekJrVYRBtwzKi1qM9ISSvPqOUaIWEShOqccHCkJjU5xBtwzKm26TpWKUOpWzzlExCCS7Sgvwsb8kxTN54jM5hQdDgWhVpMLN+BOIJtGDoSVVpFdjF8gd5bcCafr8gA6iDfYxoglXGxLxCe4w8aQK2H9s1yAguPE1fkR9tUy1dCDAGqYwR9D2DCL8UPTBHCLGDUQhNptOQGd/uY23b9JJ9TaZRkGwwIlHTGVULst2hNNEihmGmIaoW6WGdBFTGmLKYSNWrkBXQ8uC2G/VtZO5iS7R81AeAGAznRKTRoXEwnnlwDotMVxAmIS4bB8rlq04G7BRFjpXQigjdjrMhBazaLfm0aD2PliLKF+W15XJiyAVtywGEfYVy8J0EGM61DjCBdlH+mDAjmmt4khtLalWFWjEcwsCkKpeXGAgkBWkU0xmlAtvooCfXCOrKIJu0UP9QDybDNTKBnhbook1AbFAgK8m0NDM4Y/lN0d3EQsFEcQSrdyTq+OfM+NqotapWK/yXRDhQjyVXjIiCCsT4o1YdPSxk/K59x5l//o3gU+w4uoYULju1BA6Bj1LYH1fifUpOvUSTNUT0OEklroWA9VS1WI3Dm8qEH7NiHXJkS4rBYK+DltbIjQOVniibKz2QRd8CBho1UooKxKkipXPbsuP5S+B3lMIRwWW0c7mj2rUb1b9deUhCAEBsUAofRebCN0+xffIRNaGwqwTSRUi/RHYRIxPaD/y6GWQKgX6a6BYoajni36VgO/fCOGn7BWaB2N8rlYKpXiM6KP0PpVpAk3EatJDZaxC168gVM+wprC/8Xx7xU19xkzucg+99RLWOjyIVlHrLNMP5jeCO49w76X8KrAOUXkGsSI9S+XvyIJizQhKBGRFct71heCeyuK8AtnQohU7NflaAW/ZYaPjlhN38+mluR7yXoEoYFafQL54+V+MBj8s/Xb1berzlEtv9rR2n3YaQ0m7q9GDBRaC2Cy+zX3d51S7OLuUQMkWethQpRHCkprWrEsy9CO0ndqxEmK0uFDfexMceEjXEf1tl1YTe8fv+nILm6JisAGuRsi1FsYE8otfMgcRpazJGSThJwZyZRBjowkNTqY1kQ6h675SLicYf6a+wxHOyLUuHL3DpphEnseDjfRS7yoHhGUgymOhJjlAlAiVyTZNXL8YNiE/za78kI1bscM5ZiQg+t2IOyjTPjC14T6mjh95Dj0wfzT7mXmcY917zDvOgsQTlEd6YBvK3TdaghOyl1XBuRaxAM7VTCEAvnPT7gugNBy6g1sQ42wa7vb0InfmrdQvtzhn9sTNlCjjIcwcgyg1Mqpo5PQQFGxXRm7bTYa/cD3KQnvNC/hHDUNOxJKo6uHq6wynV+UQwPFbgDZtl9fTV8ZD1cHdxo3yQNl7CVc4ZIf3OxrlKQqce4YXu4vhlZwtRv3VXbeme/rysETM5CTxpaH0EC1XS8hnz1w+AiOCI1O3A8DLSG8WCdCFTf19dmQg8LjayM+1JOecDI+ESK3KngTCq3AjKKREABCTSjA65HQeqEm5DFZ3i+PegCTIiFPhBqWcGAdCOfIPSy+NgQl4LX01aT3YCB099pcwgfsOzV1joQkGDU5Tvyj6QkF4WtPqP1FPuEhzF5LQ85MypkOBkLyrO8IR9gnoMmvloISGCi6KU2FgRCqyx1hHbtyzpMwGPZaSXPFWAiVkUsovWFXzjkSuvtoXsDUc1Us7ZB8SQ6h9vf8hLD1DxRWeoALE2FLdwjx+9oewmw9DUy+/IDN9Fc4EerohV2oGg7hCDO93z3Ay4ayPxpU6yBOjjERKi7hAr2BxYsQqr41Jr2F8eNZCAXStQkbD+cmBNm/1f6DmqiwEaqSIOodFsIs7ZBc+wBN3OFGNsJHmxDrqQu8bAgbH2ANeXqTiRDe+zYhuqPhQwiKtxFKY7S7wUSo2IQWfrbOgxBk7/KotMCtLgiMhALRBXGEjwXgQugdKKQhPnKAkXApIJfZdoVk72mg5407o9nkZSSsC1LtnDb0r9VbNLvOjIQ1QaIIq+JQS9ueGYVOFUrCSHgtuCvP2EKyEsK9Z0YhvVNFAzET9ikCOLO2Q5h48pL2UVslnoeZCSlC47La0BtTp7doH2YmpAiHz0hIVh5A6jPi7IR4lyYjIWxOzkwjceEw+vEzE9K3Q+/hMgm7Qut9npmQorZksiHxRI9OGY50sBPSDLoZCIknKKjCEkxedkLwpCCzmLbmWFaizkh42JB1AekOM51+4ryElD0N/Ds6MxZjxGHZbfhyqKQG6yH40hKCe/+DIOxzArDn8ylpLQXhyVRrKych/YczHGbIBlNOG5LN0gmK6ds+GgHFdCLTmSMczkRIt0MK78cO1KmdZPOTIXUmOyHFv0pJCIp3xcJ21CDLmSN2QhqvjW4fn7R98U7Jm9jphTMT0njeVLEYwV3efmwwEK5wZkKKw1x0NiTB8PRKJiOyE9LM8akI4SsYQJnpQAc7Ic06DQ0hfIQyjD4W0tNQrbVREb6GDolkOkTNTkizXkrR00QEoqNjPqJ/kJmQ4kw/hQ33gYEe6UP0Jkz0L7IR1gRxzJnQPZxEtmN/7K/eNTMmo2AknAtily+hrCizzeDB18tIlfHzR+arrqijLx2RkSAuubZDWNdHlaVxHCckvTI3/77QppqJ+mU2Ql2gyTyBseHkZdDs/Fxf315f/3Q6N/cvdxOZy11eTIQgO7vc+DzWp1j9eMLTMcH0s4lUYiPc2IQ6PusVhjA3MRGSlSSIDfxwcYGENZtQrLMQnv9QNBvh0I1rQ3c1F2dDkJcOYXpo5/GBiyN8dyP3DETo4/6BS6ulpOnGl+JD9y7OhuStv4/zxhZyaYTOiW6HsIvNPlESQtz5Q+cRJ9baITR+0xPK0akV8pRMTUj+avszM69owv1OvDSvFqAhtQ3fpD0hdiXzlFBDq5xfx4u7sYS7vFMu4QgZIehNGVKg0IRufoTd+UNkQzzW0mKFJSTPzjR1R4hMn3RZNtyfUN0RIlej4QV9j1SewmUcOGSA2J/lxu2tXxjht/vtPSEujPaiCA/HqPeEBo3dixaS8G7nnhzyYqBmUPCL6ubBvITKbSLAevftAyEqex/8ir9k4YzCRcWR/aL7gVBHZV+KTJh9dqFSOYOy//YxxxAmEyr2MrechXIyj4erjoSYeEHuWZTYZGK2Z+WDc3LK9YXaRxyUoKvpYraSySqU60uqIwAFeTCeVjRNd9OwnRPLzfGma0Zlqt5j1ojgmNjnlJEOeRxY+Xj59/u74+TSu7VluqrlpN2vO+U4afo637//9T5w2ZCqWpiw/4Ab9fdbEb5kOkpOCmTswW+DkNMNUJ7MkOjlmvILtif30kMoYROA0BcYq7xKfJOiCMVuXmmElc3dr7Du7iaTfJbswJvU3UsotXMpT+mMF9NuSP9Np/V5O5ebJuSHmDzCqelFmORL6hsUa9B3cok+99mfzztbbF20yGvCJZP4nBwUkr2HHAOEDBnQU0XeElwD6ZU/IXz4Kk0grz51nn5EgX/iAfEJnGgK9F/bGSDUKaJNkeXNEu4mtOcJ3GsNbPzxdMH7LcbcC6wmOuv8RygIZBALEuq8OzdoJ95m28Bm4cKK3AeafeieGc6X5qVOmjnfvQSz4DJEiFBv8/1TY29e3KvPtzwI3ZERvu+Ja/J5xD6ARnmmm7a8iDu7OHZv5B2Rlld/4oYIs3CbiCBs0J4jjy/wCXF/vbOAwu0vDUdeR96dV+HUg8Osq3vy0kdpl7ie18XDkQnVI+8/5FVPlc32qbder1arTqTsD9brp6fths8kKjoFeCShhMqxjylzJxIrrhNhuA3fNRR3S6dxeRetOmN91EUDcXfJDrn7p7kLlOiNsRhCSb2Ma9VPikrPn0To3BBS9DvTCX6iGmECISYbZZkEqzjfIv5u9W6hVz1SCnqxu9PxhOKCLfdBEYq6qAZBiE+HV7RgMo5fC0ogpIniL1QRFywgCcUGxdnEAkV+khz8RELktmnBOm2GMhCK2gqZe7MwAazCMyYKQtG6KTciCOFbnOkIxcqgzIg2YNoySSqhg1hagdxMjbRLJxStEnc3qRZEEYoGz9UwniKPkTNCekLn9rAStkUgKb0oBaGo41Jun1UgX6MienCEol7LZTs6g2CiYiyIJhQb83LFokC1nuCLshCK0rDI24IDAmHdxQadoQntgXFVlv4GIH0YZCEUjYT7ps4pEEzEKMFCaDfGWQlGRjJb0IRFUhHaNfWmaDOCsKI7uENJKOpZU5Rk5INNDbWfxU4oSvUCJxsg30xpA3epCW1P3OS0GUbNB59X9BehMhCKjWGziNZoT5WGDJHXLIT2uFGbnHtsBLJRmW6yZSMU+8vH827dEPlnyRY6z0hoq/ueY4yvX3ZBT8zHINgJRXFc5ZAcCcOnVGNvsM6X0G6Og9wZbb6BSuGk8SW0R47xjZJnnwNE+f2V7arsjIS2Hec3cl6MQOTmIutV4JkJbcZFJxc7Apl1htmvOudAaDurS3PGm9Ee/2pLShc0UlwIbfXn7050DCc6IOR9gVuGSRUvQtHxV3tO8rnsePKkZ2avnQdxJLTnHV3z312WDHtOjpaP3ybXQ45cCW01pletngIsFdZ+SOk9X0051c6DeBPa0keLt9ZWpmmWTsOTt623RYUznpgLoSOtMvzTfprtgvOSq6XznVm1/WdYyeK5xCsnQtHJ62kYy/rt6n2WEJsoz6orc7E0DD23M7f5Ee4kSf1+X6tM52rt9tojszaudy3d/jDv88T/A6yTRKD/wWsbAAAAAElFTkSuQmCC" />
							<div class="col s8 spaziatura" style="text-align: justify">
								<p><b>Categoria:</b> Webdesign</p>
								<p><b>Servizio:</b> Creazione portale web</p>
								<p><b>Descrizione:</b> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,</p>
								<p><b>Note aggiuntive:</b> Nessuna nota inserita</p>
								<p><b>Budget massimo:</b> €200</p>
							</div>
							<div class="col s3 center-align" >
								 <a class="waves-effect waves-light btn"><i class="material-icons right">create</i>Modifica</a>
							</div>
						</div>
					</div>
				  </div>				  
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
				  <div class="card">
					<div class="card-content">
						
					</div>
				  </div>
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
				  <div class="card">
					<div class="card-content">
						<div class="row ">
							<img class="col s1" src ="data:image/png;base64,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" />
							<div class="col s8 spaziatura" style="text-align: justify">
								<p><b>Cliente:</b> Rossi Mario</p>							
								<p><b>Categoria:</b> Developing</p>
								<p><b>Servizio:</b> Creazione app android</p>
								<p><b>Descrizione:</b> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,</p>
								<p><b>Note aggiuntive:</b> Nessuna nota inserita</p>
								<p><b>Budget massimo:</b> €300</p>
							</div>
							<div class="col s3 center-align" >
								 <a class="waves-effect waves-light btn"><i class="material-icons right">email</i>Apri ticket</a>
							</div>
						</div>
					</div>
				  </div>
				  
				  <br><br><br><br>
				  
				  <div class="card">
					<div class="card-content">
						<div class="row ">
							<img class="col s1" src ="data:image/png;base64,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" />
							<div class="col s8 spaziatura" style="text-align: justify">
								<p><b>Cliente:</b> Verdi Giovanni</p>							
								<p><b>Categoria:</b> Webdesign</p>
								<p><b>Servizio:</b> Creazione portale web</p>
								<p><b>Descrizione:</b> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,</p>
								<p><b>Note aggiuntive:</b> Nessuna nota inserita</p>
								<p><b>Budget massimo:</b> €200</p>
							</div>
							<div class="col s3 center-align" >
								 <a class="waves-effect waves-light btn"><i class="material-icons right">email</i>Apri ticket</a>
							</div>
						</div>
					</div>
				  </div>				  
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
						<li>
						  <div class="collapsible-header">
							<i class="material-icons">filter_drama</i>
							<b style="margin-right: 5px;">Cliente: </b> Rossi Mario
							<div class="right-align"></div>
						  </div>
						  <div class="collapsible-body" style="text-align: justify">
							<p><b>Data:</b> Webdesign</p><br>
							<p><b>Categoria:</b> Webdesign</p>
							<p><b>Servizio:</b> Creazione portale web</p>
							<p><b>Descrizione:</b> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,</p>
							<p><b>Note aggiuntive:</b> Nessuna nota inserita</p>
							<p><b>Budget massimo:</b> €200</p>
							<br><br>
							<a class="waves-effect waves-light btn"><i class="material-icons right">email</i>Visualizza ticket</a>						
						  </div>
						</li>
						<li>
						  <div class="collapsible-header">
							<i class="material-icons">filter_drama</i>
							<b style="margin-right: 5px;">Cliente: </b> Verdi Giovanni<br>
						  </div>
						  <div class="collapsible-body" style="text-align: justify">
							<p><b>Categoria:</b> Developing</p>
							<p><b>Servizio:</b> Creazione app android</p>
							<p><b>Descrizione:</b> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,</p>
							<p><b>Note aggiuntive:</b> Nessuna nota inserita</p>
							<p><b>Budget massimo:</b> €300</p>		
							<br><br>
							<a class="waves-effect waves-light btn"><i class="material-icons right">email</i>Visualizza ticket</a>													
						  </div>
						</li>						
					  </ul>						
				</div>
				<div class="col s12 m4 l2" ></div>
			  </div>
			</div>
			<div id="TNuove" class="">
			  <h3 class="center-align">Nuove commissioni</h3><br><br>
			  <div class="row ">
				<div class="col s12 m4 l2" ></div>
				<div class="col s12 m4 l8">
				<ul class="collapsible popout" data-collapsible="accordion">
						<li>
						  <div class="collapsible-header">
							<i class="material-icons">filter_drama</i>
							<b style="margin-right: 5px;">Cliente: </b> Rossi Mario
							<div class="right-align"></div>
						  </div>
						  <div class="collapsible-body" style="text-align: justify">
							<p><b>Data:</b> Webdesign</p><br>
							<p><b>Categoria:</b> Webdesign</p>
							<p><b>Servizio:</b> Creazione portale web</p>
							<p><b>Descrizione:</b> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,</p>
							<p><b>Note aggiuntive:</b> Nessuna nota inserita</p>
							<p><b>Budget massimo:</b> €200</p>
							<br><br>
							<a class="waves-effect waves-light btn btn-verde"><i class="material-icons right">check</i>Accetta</a>						
							<a class="waves-effect waves-light btn btn-rosso"><i class="material-icons right">clear</i>Rifiuta</a>						
						  </div>
						</li>
						<li>
						  <div class="collapsible-header">
							<i class="material-icons">filter_drama</i>
							<b style="margin-right: 5px;">Cliente: </b> Verdi Giovanni<br>
						  </div>
						  <div class="collapsible-body" style="text-align: justify">
							<p><b>Categoria:</b> Developing</p>
							<p><b>Servizio:</b> Creazione app android</p>
							<p><b>Descrizione:</b> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,</p>
							<p><b>Note aggiuntive:</b> Nessuna nota inserita</p>
							<p><b>Budget massimo:</b> €300</p>		
							<br><br>
							<a class="waves-effect waves-light btn btn-verde"><i class="material-icons right">check</i>Accetta</a>						
							<a class="waves-effect waves-light btn btn-rosso"><i class="material-icons right">clear</i>Rifiuta</a>						
						  </div>
						</li>						
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
				  <div class="card">
					<div class="card-content">
						<div class="row ">
							<img class="col s1" src ="data:image/png;base64,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" />
							<div class="col s8 spaziatura" style="text-align: justify">
								<p><b>Tecnico:</b> Fucci Andrea</p>							
								<p><b>Cliente:</b> Rossi Mario</p>							
								<p><b>Categoria:</b> Developing</p>
								<p><b>Servizio:</b> Creazione app android</p>
								<p><b>Descrizione:</b> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,</p>
								<p><b>Note aggiuntive:</b> Nessuna nota inserita</p>
								<p><b>Budget massimo:</b> €300</p>
							</div>
							<div class="col s3 center-align" >
								 <a class="waves-effect waves-light btn"><i class="material-icons right">email</i>Apri ticket</a>
							</div>
						</div>
					</div>
				  </div>
				  
				  <br><br><br><br>
				  
				  <div class="card">
					<div class="card-content">
						<div class="row ">
							<img class="col s1" src ="data:image/png;base64,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" />
							<div class="col s8 spaziatura" style="text-align: justify">
								<p><b>Tecnico:</b> Lafasciano Nicolò</p>							
								<p><b>Cliente:</b> Verdi Giovanni</p>							
								<p><b>Categoria:</b> Webdesign</p>
								<p><b>Servizio:</b> Creazione portale web</p>
								<p><b>Descrizione:</b> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,</p>
								<p><b>Note aggiuntive:</b> Nessuna nota inserita</p>
								<p><b>Budget massimo:</b> €200</p>
							</div>
							<div class="col s3 center-align" >
								 <a class="waves-effect waves-light btn"><i class="material-icons right">email</i>Apri ticket</a>
							</div>
						</div>
					</div>
				  </div>				  
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
			  <h3 class="center-align">Nuove commissioni</h3><br><br>
			  <div class="row ">
				<div class="col s12 m4 l2" ></div>
				<div class="col s12 m4 l8">
				<ul class="collapsible popout" data-collapsible="accordion">
						<li>
						  <div class="collapsible-header">
							<i class="material-icons">filter_drama</i>
							<b style="margin-right: 5px;">Cliente: </b> Rossi Mario
							<div class="right-align"></div>
						  </div>
						  <div class="collapsible-body" style="text-align: justify">
							<p><b>Data:</b> Webdesign</p><br>
							<p><b>Categoria:</b> Webdesign</p>
							<p><b>Servizio:</b> Creazione portale web</p>
							<p><b>Descrizione:</b> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,</p>
							<p><b>Note aggiuntive:</b> Nessuna nota inserita</p>
							<p><b>Budget massimo:</b> €200</p>
							<br><br>
								<select>
								  <option value="" disabled selected>Seleziona a chi assegnare il lavoro</option>
								  <option value="1">Fucci Andrea</option>
								  <option value="2">Lafasciano Nicolò</option>
								  <option value="3">Preziosa Gabriele</option>
								  <option value="4">Valori Daniele</option>
								</select>
								<label>Seleziona a chi assegnare il lavoro</label>
						  </div>
						</li>
						<li>
						  <div class="collapsible-header">
							<i class="material-icons">filter_drama</i>
							<b style="margin-right: 5px;">Cliente: </b> Verdi Giovanni<br>
						  </div>
						  <div class="collapsible-body" style="text-align: justify">
							<p><b>Categoria:</b> Developing</p>
							<p><b>Servizio:</b> Creazione app android</p>
							<p><b>Descrizione:</b> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,</p>
							<p><b>Note aggiuntive:</b> Nessuna nota inserita</p>
							<p><b>Budget massimo:</b> €300</p>		
							<br><br>
							<select>
								  <option value="" disabled selected>Seleziona a chi assegnare il lavoro</option>
								  <option value="1">Fucci Andrea</option>
								  <option value="2">Lafasciano Nicolò</option>
								  <option value="3">Preziosa Gabriele</option>
								  <option value="4">Valori Daniele</option>
								</select>
								<label>Seleziona a chi assegnare il lavoro</label>
						  </div>
						</li>						
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
						<div class="col s4">
						  <div class="card">
							<div class="card-image waves-effect waves-block waves-light">
							  <img class="activator" src="http://www.t3basilicata.com/wp-content/uploads/2017/12/D_Amato.jpg" >
							</div>
							<div class="card-content">
							  <span class="card-title activator grey-text text-darken-4">Fucci Andrea<i class="material-icons right">more_vert</i></span>
							</div>
							<div class="card-reveal">
							  <span class="card-title grey-text text-darken-4">Fucci Andrea<i class="material-icons right">close</i></span>
							  <p><b>Ruolo: </b> VicePresidente, Developer</p>
							  <p><b>Data di assunzione: </b> 10/01/2017</p>
							</div>
						  </div>
						</div>
						
						<div class="col s4">
						  <div class="card">
							<div class="card-image waves-effect waves-block waves-light">
							  <img class="activator" src="http://www.t3basilicata.com/wp-content/uploads/2017/12/D_Amato.jpg" >
							</div>
							<div class="card-content">
							  <span class="card-title activator grey-text text-darken-4">Preziosa Gabriele<i class="material-icons right">more_vert</i></span>
							</div>
							<div class="card-reveal">
							  <span class="card-title grey-text text-darken-4">Preziosa Gabriele<i class="material-icons right">close</i></span>
							  <p><b>Ruolo: </b> Developer</p>
							  <p><b>Data di assunzione: </b> 10/01/2017</p>
							</div>
						  </div>
						</div>
						
						<div class="col s4">
						  <div class="card">
							<div class="card-image waves-effect waves-block waves-light">
							  <img class="activator" src="http://www.t3basilicata.com/wp-content/uploads/2017/12/D_Amato.jpg" >
							</div>
							<div class="card-content">
							  <span class="card-title activator grey-text text-darken-4">Lafasciano Nicolò<i class="material-icons right">more_vert</i></span>
							</div>
							<div class="card-reveal">
							  <span class="card-title grey-text text-darken-4">Lafasciano Nicolò<i class="material-icons right">close</i></span>
							  <p><b>Ruolo: </b> Webdesigner</p>
							  <p><b>Data di assunzione: </b> 10/01/2017</p>
							</div>
						  </div>
						</div>
						
						<div class="col s4">
						  <div class="card">
							<div class="card-image waves-effect waves-block waves-light">
							  <img class="activator" src="http://www.t3basilicata.com/wp-content/uploads/2017/12/D_Amato.jpg" >
							</div>
							<div class="card-content">
							  <span class="card-title activator grey-text text-darken-4">Valori Daniele<i class="material-icons right">more_vert</i></span>
							</div>
							<div class="card-reveal">
							  <span class="card-title grey-text text-darken-4">Valori Daniele<i class="material-icons right">close</i></span>
							  <p><b>Ruolo: </b> Presidente</p>
							  <p><b>Data di assunzione: </b> 10/01/2017</p>
							</div>
						  </div>
						</div>
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