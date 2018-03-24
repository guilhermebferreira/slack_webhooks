<?php

 	$config = include 'config.env';

    $mensagem = array(
        "text"          =>  "@guilherme mensagem enviada usando PHP :slack:"
    );

    $data = json_encode($mensagem);

    $ch = curl_init($config['webhook']);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, array('payload' => $data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    print_r($result);

?>