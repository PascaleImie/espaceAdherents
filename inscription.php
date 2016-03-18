<?php
    include_once ('connexion.php');
    session_start();

if(isset($_POST['valider'])){
    if((!empty($_POST['nom'])) && (!empty($_POST['prenom']))&& (!empty($_POST['login'])) && (!empty($_POST['email'])) &&
      (!empty($_POST['password'])) && ($_POST['passConfirm'] == $_POST['password'])){
        
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);
        $password = md5(trim($_POST['password']));
        $passConfirm = md5(trim($_POST['passConfirm']));
    
        echo('login :'.$login.'<br>mot de passe :'.$password.'<br>confirmation :'.$passConfirm);
        
    $query = $pdo->prepare("select id from utilisateurs where login=? limit 1");
    $query->execute(array($login));
    $tab=$query->fetchAll();
    if(count($tab)>0){
        $erreur='login existe dejà!';
    } else {
        $query=$pdo->prepare("insert into utilisateurs(nom, prenom, login, email, password) values(?,?,?,?,?)");
        
        if($query->execute(array($nom, $prenom,$login,$email, md5($password))))
            header("location:login.php");
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
				<li><a href="login.php">Logged in</a></li>
				<li><a href="#">menu2</a></li>
				<li><a href="#">menu3</a></li>
			</ul>
			</nav>
		</div>
		<hr>
	</header>
   <body>
<!--    <body onLoad="document.fo.login.focus()">-->
	<form name="fo" action="#" method="POST">
	
	        <p><label for='nom' class='police'>Nom :</label>
			<input type='text' name='nom' id='nom' autofocus required/></p>
			
			<p><label for='prenom' class='police'>Prenom :</label>
			<input type='text' name='prenom' id='prenom' required/></p>
			
	
			<p><label for='login' class='police'>Login :</label>
			<input type='text' name='login' id='login' required/></p>

			<p><label for='email' class='police'>Email :</label>
			<input type='email' name='email' id='email' required/></p>

			<p><label for='password' class='police'>Password :</label>
			<input type='password' name='password' id='password' required/></p>

			<p><label for='passConfirm' class='police'>Confirm password :</label>
			<input type='password' name='passConfirm' id='passConfirm' required/></p>

			<div class="clear">
			<input type='submit' name='valider' value='submit' class='bouton'/>
			</div>
			
	</form>
	<br />
	
</body>
</html>