<!doctype> 
<html lang="es">
<head>
    <meta charset="UTF-8">
       <title>No Registrado</title>
</head>
<body>
  <h1>LOGIN2</h1>
  <?php
$login['jony']=1234;
$login['alvaro']='alvaro';
$login['mj']='mj';
$login['alejandro']='alex';
$autentificado='false';
  foreach($login as $indice=>$contenido){
      if(($_POST['usuario']==$indice)&&($_POST['pass']==$contenido)){
          $autentificado='true';
          }

}
 if($autentificado=='true'){
     header('location: SeleccionAdministradores.html');}
     else{
         echo "<body style='background-color:black'><h2 style='color:red'>O el usuario, o el Password, no es correcto<br> Ó ambos</h2>";
        echo "<a  style='background-color:'red' href='login.php'>Volver Atras</a>";}
  ?>
</body>
</html>
