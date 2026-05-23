<?php 
// ($dominio,$tipo,$protocolo)
//dominios: Af_INET(ipv4); AF_INET6(ipv6);AF_UNIX(unix);AF_NETLINK(linux)
//tipo: SOCK_STRAM;SOCK_DGRAM;SOCK_SOQPACKET
//protocolo: SOL_TCP; SOL_UDP
    $client = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
    if ($client===false){
        echo("ERRO!! 1c ".socket_strerror(socket_last_error())."<br>");
        exit(1);
    }
    elseif(socket_connect($client,'127.0.0.1',6535)===false){
        echo("ERRO!! 2c".socket_strerror(socket_last_error($client))."<br>");
        socket_close($client);
        exit(1);
    }
    else{
        $msg ="Olá Mundo";
        socket_write($client,$msg,strlen($msg));

        $resposta = socket_read($client,1024);
        echo("Resposta: ".$resposta ."<br>");
    }
    
?>