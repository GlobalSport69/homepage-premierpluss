<?php
   $json = file_get_contents('php://input');
   $data = json_decode($json);

   if(isset($data)){
      
      require_once 'vendor/autoload.php';
      $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
         ->setUsername('smtpglobalsport69@gmail.com')
         ->setPassword('ixwsclvccdyerngs')
      ;
      
      // Create the Mailer using your created Transport
      $mailer = new Swift_Mailer($transport);
      // Create a message
      $template = '<div style="background-color: #07213a; color: white; width: 50%; height: 600px; margin: 0px auto; padding: 12px 16px; border-radius: 5%;">';
      $template .= '  <h1 style="text-align: center;"><span style=" font-size: 50px; font-weight: bold; color: aqua;">C</span>ontacto</h1>';
      $template .= '  <h2 style="text-align: left;"><span style="font-size: 30px; font-weight: bold; color: aqua;">N</span>ombre & Apellido / Compañia</h2>';
      $template .= '  <p style="text-align: justify; font-size: 18px;">'. $data->name .'</p>';
      $template .= '  <h2 style="text-align: left;"><span style="font-size: 30px; font-weight: bold; color: aqua;">C</span>orreo Electronico</h2>';
      $template .= '  <p style="text-align: justify; font-size: 18px; text-decoration: none">'. $data->email .'</p>';
      $template .= '  <h2 style="text-align: left;"><span style="font-size: 30px; font-weight: bold; color: aqua;">M</span>ensaje</h2>';
      $template .= '  <p style="text-align: justify; font-size: 18px;">'. $data->message .'</p>';
      $template .= '</div>';
      // Create a message
      $message = (new Swift_Message('Contacto desde LaGranjitaOnLine'))
      ->setFrom([$data->email => $data->name])
      ->setTo(['pablo.marcano.16@gmail.com' => 'Soporte LaGranjitaOnLine'])
      ->setBody($template, 'text/html')
      ;
      // Send the message
      $result = $mailer->send($message);
   }
?>