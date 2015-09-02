<?php

include 'functions.php';
var_dump("entro ak"); die();
if (!empty($_POST)){

  $data['success'] = true;
  $_POST  = multiDimensionalArrayMap('cleanEvilTags', $_POST);
  $_POST  = multiDimensionalArrayMap('cleanData', $_POST);

  //Seu endereço de e-mail
  $emailTo ="dutra.maicon@gmail.com"; //seumail@seusite.com";

  //Endereço de e-mail do contato
  $emailFrom ="dutra.maicon@gmail.com"; //"contato@seusite.com";

  //Assunto do e-mail
  $emailSubject = "Mail from Porta";

  $name = $_POST["name"];
  $email = $_POST["email"];
  $comment = $_POST["comment"];
  if($name == "")
   $data['success'] = false;
 
 if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) 
   $data['success'] = false;


 if($comment == "")
   $data['success'] = false;

 if($data['success'] == true){

	var_dump($emailTo);
  $message = "NAME: $name<br>
  EMAIL: $email<br>
  COMMENT: $comment";


  $headers = "MIME-Version: 1.0" . "\r\n"; 
  $headers .= "Content-type:text/html; charset=utf-8" . "\r\n"; 
  $headers .= "From: <$email>" . "\r\n";
  mail($emailTo, $emailSubject, $message, $headers);

  $data['success'] = true;
  echo json_encode($data);
}
}