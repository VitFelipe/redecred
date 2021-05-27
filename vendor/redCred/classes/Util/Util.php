<?php namespace Util{

    use \PHPMailer;

class Util {


    public function enviarEmail($conteudo,$email){

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'rede.cred.ma@gmail.com';
        $mail->Password = 'lucio12345';
        $mail->Port = 587;


        $mail->setFrom($email, 'Contato');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Redefinir de Senha ';
        $mail->Body    = $conteudo;

       

        if(!$mail->send()) {

            return   'Não foi possível enviar a mensagem.<br>'.'Erro: ' . $mail->ErrorInfo;
        } else {
            return 'Mensagem enviada.';

    }





}
}

}
 ?>