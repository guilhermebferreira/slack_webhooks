<?php

    $config = include 'config.env';

    //envia uma mensgaem de texto simples

    $mensagem = array(
        "text"          =>  "@guilherme mensagem enviada usando PHP :slack:"
    );

    $data = json_encode($mensagem);

    send_message($data, $config['webhook']);


    //enviando uma mensgaem com botões em anexo

    $data = array(
        "text" => "Os seguintes relatórios estão disponiveis"
    );

    $actions =
    [
        [
            'type' => "button",
            'text' => "Report 1",
            'url' => "https://url.report1"
        ],
        [
            'type' => "button",
            'text' => "Report 2",
            'url' => "https://url.report2"
        ]
    ];

    $data += [
        "attachments" =>
            [
                [
                    "fallback" => "More details...", //I only get the message and this text in the slack
                    'actions' => $actions // or array($actions) 

                ]
            ]
    ];

    $payload = json_encode($data);


    send_message($payload, $config['webhook']);

    


    function send_message($message, $webhook){
    	$ch = curl_init($webhook);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    	curl_setopt($ch, CURLOPT_POSTFIELDS, array('payload' => $message));
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$result = curl_exec($ch);
    	curl_close($ch);
    }

?>