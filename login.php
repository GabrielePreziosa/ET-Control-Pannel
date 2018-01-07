<!DOCTYPE html>
<html>
<head>
    <!--LIBRARY-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <title>EndlessTeamwork - Login</title>
</head>
<body>

    <script>
    function checkPass() {
        if (email.length != 0 && passwd.length != 0) {

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var resp = this.responseText;
                    if (resp == "not_registered") {
                        Materialize.toast("Indirizzo email non registrato", 4000);
                    }   else if (resp == "incorrect_passwd") {
                        Materialize.toast("Password non corretta", 4000);
                    }   else if (resp.includes("success")) {
                        resp = resp.split("-");
                        Materialize.toast("Benvenuto, " + resp[1] + " " + resp[2], 4000);
                        setTimeout(tryLogin, 3000)
                    }   else {
                        Materialize.toast("Errore interno", 4000);
                    }
                }
            };
            xmlhttp.open("GET", "checkloginajax.php?email=" + document.getElementById("email").value + "&passwd=" + document.getElementById("passwd").value, true);
            xmlhttp.send();

        }
        return false;
    }

    function tryLogin() {
        var form = document.createElement("form");
        document.body.appendChild(form);
        form.method = "POST";
        form.action = "loadlogin.php";
        var emailf = document.createElement("input");
        emailf.setAttribute('type',"text");
        emailf.setAttribute('name',"email");
        emailf.setAttribute('value',document.getElementById("email").value);
        var passwdf = document.createElement("input");
        passwdf.setAttribute('type',"text");
        passwdf.setAttribute('name',"passwd");
        passwdf.setAttribute('value',document.getElementById("passwd").value);
        form.appendChild(emailf);
        form.appendChild(passwdf);
        form.submit();
    }
    </script>

    <!--NAV-->
    <nav class="nav-extended">
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo center"><?php require "config.php"; echo $website_name;?></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-fixed-width tabs-transparent">
        <li class="tab"><a class="active" href="#login">Login</a></li>
        <li class="tab"><a href="#register">Registrazione</a></li>
      </ul>
    </div>
    </nav>

    <!--LOGIN-->
    <div id="login" class="col s12">
        <div class="container">


            <p style="text-align:center;">Inserisci i dati richiesti per effettuare l'accesso</p>

            <div class="row">
                <form id="loginform" onsubmit="event.preventDefault(); checkPass()" action="loadlogin.php" method="POST" class="col s12 center-align"> <!--LOGIN FORM-->
                <div class="row">
                    <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input  type="email" id="email" name="email" required class="validate">
                    <label for="email" data-error="Devi inserire un indirizzo mail valido">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <i class="material-icons prefix">fingerprint</i>
                    <input type="password" id="passwd" name="passwd" required class="validate">
                    <label>Password</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Accedi
                    <i class="material-icons right">send</i>
                </button>
                </form>
            </div>

        </div>

    
    </div>

    <!--REGISTER-->
    <div id="register" class="col s12">
    
    Registrazione
    
    </div>


</body>
</html>