<?php
// require("phpmailer/PHPMailerAutoload.php");
require("PHPMailer/class.phpmailer.php");
//exit;
$emaildestinatario = 'kiliano.lopes@degraupublicidade.com.br'; // Digite seu e-mail aqui, lembrando que o e-mail deve estar em seu servidor web		
$assunto = utf8_decode($_POST['inputtitulo']);		
			
// Passando os dados obtidos pelo formulário para as variáveis abaixo
$NomeCadastro     = $_POST['Nome'];
$EmailCadastro = trim($_POST['Email']);
$TelefoneCadastro    = $_POST['Telefone'];



$mail = new PHPMailer();
 
// Define os dados do servidor e tipo de conexão.
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "smtp.DOMINIO.com.br"; // Endereço do servidor SMTP (caso queira utilizar a autenticação, utilize o host smtp.seudomínio.com.br)
$mail->Port = 587;
$mail->SMTPAuth = true; // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
$mail->Username = 'noreply@DOMINIO.com.br'; // Usuário do servidor SMTP (endereço de email)
$mail->Password = 'SENHA'; // Senha do servidor SMTP (senha do email usado)
 
// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = $EmailCadastro; // Seu e-mail
$mail->Sender = "noreply@DOMINIO.com.br"; // Seu e-mail
$mail->FromName = utf8_decode("NOME DO CLIENTE"); // Seu nome
 
// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress($emaildestinatario);
//$mail->AddAddress('e-mail@destino2.com.br');
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
 
// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)


/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML =  utf8_decode('<P>Gostaria de mais informações</P>
<p><b>Nome:</b> '.$NomeCadastro.'</p>
<p><b>E-mail:</b> '.$EmailCadastro.'</p>
<p><b>Telefone:</b> '.$TelefoneCadastro.'</p>
<hr>');
$mail->Subject  = $assunto; // Assunto da mensagem
$mail->Body = $mensagemHTML;

$enviado = $mail->Send();
 
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();
 
// Exibe uma mensagem de resultado
if ($enviado) {
echo "sucesso";
} else {
echo "Não foi possível enviar o e-mail.
 
";
echo "Informações do erro: 
" . $mail->ErrorInfo;
}

//echo $Nome ;
 
// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
//$headers = "MIME-Version: 1.1\r\n";
//$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
//$headers .= "From: $Email\r\n"; // remetente
//$headers .= "Return-Path: $emaildestinatario \r\n"; // return-path
//$envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers); 
// 
// if($envio)
//	echo "sucesso"; // Página que será redirecionada

?>
