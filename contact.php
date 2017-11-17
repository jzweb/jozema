<?php
// define variables and set to empty values
$nameErr = $emailErr   = "";
$name = $email  = $comment ="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["nombre"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["nombre"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      ?> <script type="text/javascript">
        document.getElementByname('name').css="border:1px solid red";

      </script><?php
    }
  }
  
  if (empty($_POST["correo"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["correo"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  
  if (empty($_POST["mensaje"])) {
    $comment = ""; 
  }else {
    $comment = test_input($_POST["mensaje"])."\r\n".$name;
  }

  if(preg_match("/^[a-zA-Z ]*$/",$name)&&filter_var($email, FILTER_VALIDATE_EMAIL)&&!empty($_POST["mensaje"])){
	mail($para, $titulo, $comment, $cabeceras);
	$mesaje="Enviado! a  \r\n".$email;
   }
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?> 

<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	
<link rel="stylesheet" type="text/css" href="css/style-contact.css">
<script type="text/javascript" src="js/function.js"></script>


</head>
<body>
	<div id="cuerpo-top">
	
		<div class="menu">

			<h1>JZ WebDesigner</h1><br><br>
			<label><a href="index.html"><img class="icono" src="iconos/home.png">Home</a></label><br><br>
			<label><a href="profile.html"><img class="icono" src="iconos/perfil.png">Profile</a></label><br><br>
			<label><a href=""><img class="icono" src="iconos/mail.png">Contact</a></label><br><br><br><br>
			<img src="iconos/close.png" id="close">
		</div>
	
	</div>
<div class="header">
	<div class="logo"><img src="iconos/menu-icon.png" id="menu-icono">JZ WebDesigner</div>
	<nav>
		<ul>
			<li><a href="index.html"><img class="icono" src="iconos/home.png">Home</a></li>
			<li><a href="profile.html"><img class="icono" src="iconos/perfil.png">Profile</a></li>
			<li><img class="icono" src="iconos/mail.png"><a href="">Contact</a></li>
		</ul>
		<div class="iconos">
			<a href="contact.php"><img class="social" src="iconos/facebook.png"></a>
			<a href="contact.php"><img class="social" src="iconos/twitter.png"></a>
			<a href="contact.php"><img class="social" src="iconos/linkedIn.png"></a>
		</div>
	</nav>

</div>
<!--*******************FIN DE CABECERA********-->
<div class="title"><h1>Contact</h1></div>
<div class="box">
	<div class="box-wrappe">
		<div class="div-cont">
			<p> if you are interested in one of our services
		   or you would like to clear your ideas about our services
		   or just you need help from us. 

		   please not hesitate in contact me by:<br><br>
		   <b>(+51) 980 922 039</b><br>
		   <b><a href="mailto:jzevallosmv@outlook.com?Subject=Solicitud de Informacion desde JzWebsite" target="_top">jzevallosmv@outlook.com</a></b><br><br>
		   or just fill the form with all the necessary information.

		   Thank you for your preference.
		
	    </p>
		</div>
		
	</div>
	<div class="box-wrappe">
		<div class="div-cont">
			<form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<label><?php echo $mesaje;?></label><br>
			<span class="error"> <?php echo $nameErr;?></span><br>
			<input type="text" name="nombre" placeholder="your name" class="texto" ><br>
			 <span class="error"> <?php echo $emailErr;?></span><br>
			<input type="text" name="correo" placeholder="your email"  class="texto"><br>
			<input type="tel" name="telefono" placeholder="your telephone"  class="texto"><br>
			<select name="tema" id="" class="list-box">
				<option value="Web Design">Web Design</option>
				<option value="Web develop">Web develop</option>
				<option value="Social media">Social media</option>
				<option value="Branding">Branding</option>
				<option value="other">other</option>
			</select><br>
			<textarea name="mensaje" cols="22" rows="5" class="text-area">write your message...</textarea><br>
			<input type="submit" value="Send" class="boton">
		</form>
		</div>
		

	</div>

</div>
<!--*******************FIN DE CUERPO********-->
<div class="footer">
	<div class="logo">JZ WebDesigner</div>
    <div class="designer"><p>&#169 JzWebDesigner 2010. All rights reserved.</p></div>
</div>
</body>
</html>