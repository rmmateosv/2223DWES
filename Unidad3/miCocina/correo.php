<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
require_once 'usuario.php';
require_once 'pedido.php';
require_once 'detalle.php';


function crearMensaje($p,$detalle){
    $mensaje = "Pedido ".$p->getId()." realizado. Total a pagar: ".number_format($p->getTotal(),2,",",".")."€<br/>";
    $mensaje .= "Su pedido incluye:<br/><table><thead>
      <tr>
        <th class='th-sm' ><p class='text-start'>Plato</p></th>
        <th class='th-sm' data-mdb-sort='false'><p class='text-end'>Cantidad</p></th>
        <th class='th-sm' data-mdb-sort='false'><p class='text-end'>Precio</p></th>
        <th class='th-sm' data-mdb-sort='false'><p class='text-end'>Total</p></th>
      </tr>
    </thead>
    
    <tbody>";
    foreach ($detalle as $d){
        $mensaje .= "<tr>
                    <td>".$d->getPlato()."</td>
                    <td><p class='text-end'>".$d->getCantidad()."</p></td>
                    <td><p class='text-end'>".number_format($d->getPrecioU(),2,",",".")."€</p></td>
                    <td><p class='text-end'>".number_format($d->getPrecioU()*$d->getCantidad(),2,",",".")."€</p></td>
                  </tr>";
    }
    $mensaje .= "</tbody></table>";
    return $mensaje;
}
function enviarCorreo($usuario,$mensajeHTML, $mensajeNoHTML){
    
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'rmmateosv@gmail.com';                     //SMTP username
        $mail->Password   = 'hvjagnoxlgjecmfz';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
        //Recipients
        $mail->setFrom('rmmateosv@gmail.com', 'MiCocina');
        $mail->addAddress('rmmateos@gmail.com', 'Administrador');     //Add a recipient
        $mail->addAddress($usuario->getEmail(),$usuario->getNombre());               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
        
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Pedido Realizado';
        $mail->Body    = $mensajeHTML;
        $mail->AltBody = $mensajeNoHTML;
        
        $mail->send();
        return 'ok';
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>