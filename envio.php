<?php
// define variables and set to empty values
$nameErr = $emailErr   = "";
$name = $email  = $comment ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      ?> <script type="text/javascript">
        document.getElementByname('name').css="border:1px solid red";

      </script><?php
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"])."\r\n".$name;
  }

$para= 'jorgeluis.zevallos@gmail.com';
$titulo= 'Mensaje enviado desde Trouve Website';
$cabeceras = 'From:'.$email."\r\n".
    'Reply-To: jorgeluis.zevallos@gmail.com'."\r\n".
    'X-Mailer: PHP/' . phpversion();
  
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(preg_match("/^[a-zA-Z ]*$/",$name)&&filter_var($email, FILTER_VALIDATE_EMAIL)&&!empty($_POST["comment"])){
mail($para, $titulo, $comment, $cabeceras);}
?> 


<!--
<html>
<head>
<style>
body{width:60%;height:auto;padding:0 20% 0 20%;}
form{width:60%;height:auto;background-color:grey;padding:10% 20%;}
label{margin:20px;color:white;}
.error{color:white;font-style:italic;font-weight: bold;font-size:0.7em;margin:100px 0;padding:10px;width:100%;height:500px;}
.texto{width:100%;height:30px;}
textarea{width:100%;height:200px;}
.boton{width:100%;height:40px;background-color:transparent;color:white;margin:10px 0;font-size:1.5em;text-align:center;border:1px solid white;}
</style>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <label>Name:</label><br><input class="texto" type="text" name="name" ><br>
  <span class="error"> <?php echo $nameErr;?></span>
  <br>
<label>E-mail:</label><br>
  <input type="text" name="email" class="texto" ><br>
  <span class="error"> <?php echo $emailErr;?></span>
  <br>
 
  <textarea name="comment" rows="5" cols="40">your message here..</textarea>
  <br>
  <input type="submit" name="submit" value="SEND" class="boton">  
</form>


</body>
</html>
-->


 ?>