<!--<script src="js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">-->

<?php

	require 'class.phpmailer.php';
	require 'class.smtp.php';

	header("refresh: 0;index.html");

	$mail = new PHPMailer();
	$mail -> setLanguage('pt_br');

	/*config. server*/
	$host		= 'smtp.live.com'; /*live = hotmail   gmail = gmail*/
	$username	= 'polivalentewall@hotmail.com'; /*E-mail usado para enviar a msg*/
	$password	= 'ETECPW006';
	$port		= 587;
	$secure		= 'tls';

	$from 		= $username; /*E-mail usado para enviar a msg*/
	$fromName	= $_POST['name']; /*nome do remetente*/



	/*config. para logar no e-mail*/
	$mail ->isSMTP();
	$mail ->Host		= $host;
	$mail ->SMTPAuth	= true;
	$mail ->Username	= $username;
	$mail ->Password	= $password;
	$mail ->Port		= $port;
	$mail ->SMTPSecure	= $secure;


	$mail ->From 		= $from;
	$mail ->FromName	= $fromName;
	$mail ->addReplyTo($_POST['email'], $fromName); /*E-mail do remetente, nome do remetente */

	$mail ->addAddress('gabrielcaio80@hotmail.com', 'Caio Gabriel'); /*E-mail que receberá os comentários do site, Nome de quem irá receber o e-mail */

	/*config do e-mail*/
	$mail ->isHTML(true);
	$mail ->CharSet		= 'utf-8';
	$mail ->WordWrap	= 70;

	/*config da msg*/
	$mail ->Subject	= 'Mensagem PoliWALL.com'; /*Assunto do e-mail*/
	$mail ->Body	= $_POST['message'];
	$mail ->AltBody	= $_POST['message']; /*Corpo do e-mail*/


	/*Verificação*/
	$erro = array();

	if(isset($_POST['enviar'])):

		$email	= addslashes(trim($_POST['email']));

		if(empty($fromName)):
			echo $erro[] = '<script>alert("Digite seu nome para enviar a mensagem")</script>';
		elseif(empty($email)):
			echo $erro[] = '<script>alert("Digite seu E-mail para enviar a mensagem")</script>';
		elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)):
			echo $erro[] = '<script>alert("E-mail invalido")</script>';
		else:
		//Se a mensagem passar nas verificações  \/

//Mensagem PHP

$send = $mail -> Send();

if($send)
	echo '<script>alert("E-mail enviado com sucesso!")</script>';




else
	echo '<script>alert("Erro:	'.$mail ->ErrorInfo.'")</script>';


		endif;

	endif;




?>
