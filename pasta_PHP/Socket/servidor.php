<?php  
    $local_host = "127.0.0.1";
    $porta = 6535;

    $server = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

    if ($server === false){
        echo("ERRO!! 1s ".socket_strerror(socket_last_error())."<br>");
        exit(1);
    }

    if (socket_bind($server, $local_host, $porta) === false){
        echo("ERRO Bind 2s ".socket_strerror(socket_last_error())."<br>");
        socket_close($server);
        exit(1);
    }

    if (socket_listen($server, 5) === false){
        echo("ERRO na espera 3s ".socket_strerror(socket_last_error())."<br>");
        socket_close($server);
        exit(1);
    }

    echo("Servidor iniciado e à espera no socket: ".$local_host.":".$porta."<br>");

    while (true){

        $client = socket_accept($server);

        if ($client === false){
            echo("ERRO na recepção 4s ".socket_strerror(socket_last_error())."<br>");
            continue;
        }

        $recebido = socket_read($client, 1024);

        echo("Mensagem recebida: ".$recebido."<br>");

        $resposta = "Olá para ti também";

        socket_write($client, $resposta, strlen($resposta));

        // fecha APENAS o cliente
        socket_close($client);
    }

    // fecha servidor apenas no fim
    socket_close($server);
?>