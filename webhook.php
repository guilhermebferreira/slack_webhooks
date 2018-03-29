<?php

    $config = include 'config.env';

    //envia uma mensgaem de texto simples

    $mensagem = array(
        "text"          =>  "@guilherme mensagem enviada usando PHP :slack:"
    );

    $data = json_encode($mensagem);

    send_message($data, $config['webhook']);

    


    function send_message($message, $webhook){
    	$ch = curl_init($webhook);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    	curl_setopt($ch, CURLOPT_POSTFIELDS, array('payload' => $message));
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$result = curl_exec($ch);
    	curl_close($ch);
    }

?>