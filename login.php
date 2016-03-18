<?php
    
     include_once ('connexion.php');
     session_start();
  
	  
if(isset($_POST['valider'])){
       
        if((!empty($_POST['login'])) && (!empty($_POST['password'])))
        {
        	
        $login = trim($_POST['login']);
        $password = md5(trim($_POST['password']));
            

            
        
        $req = $pdo->prepare('SELECT * FROM utilisateurs where login = :login and password = :password'); 
        

        $req->execute(array(
                       'login'=> $login,
                       'password'=> md5($password)));
            
        $resultat=$req->fetch();
            
            if($resultat){


                $_SESSION['login'] = $login;


                    header('location:session.php');


            } else {
                   $erreur='Mauvais login ou mot de passe';
                    echo $erreur;

            }
        }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<header>
		<div id='banniere'>
			<nav>
			<ul>
				<li><a href="#">menu1</a></li>
				<li><a href="#">menu2</a></li>
				<li><a href="#">menu3</a></li>
			</ul>
			</nav>
		</div>
		<hr>
	</header>
   <body>
<!--    <body onLoad="document.fo.login.focus()">-->
       <h1>Authentification [ <a href="inscription.php">Créer un compte</a> ]</h1>
	<form name="fo" action="#" method="POST">
	
			<p><label for='login' class='police'>Login :</label>
			<input type='text' name='login' id='login' autofocus required/></p>

			<p><label for='password' class='police'>Password :</label>
			<input type='password' name='password' id='password' required/></p>

            <div class="clear">
			<input type='submit' name='valider' value='submit' class='bouton'/>
			</div>
			
	</form>
	<br />
	
</body>
</html>

