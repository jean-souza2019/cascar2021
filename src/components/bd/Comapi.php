<?php
class comapi{

    var $user;
    var $pass;
    var $url;
    var $ch;
    var $data;
    var $payload;
    var $result;
    var $obj;



    function conectar($usuario, $senha){

        $this->url = "http://192.168.3.75:8000/auth";
        $this->ch = curl_init($this->url);


        $this->user = $usuario . $this->dominio;
        $this->pass = $senha;

        $this->data = array(
            "user" => $this->user,
            "password" => $this->pass
        );
        $this->payload = json_encode($this->data);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $this->payload);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        
        $this->result = curl_exec($this->ch);
        curl_close($this->ch);
        
        $this->obj = json_decode($this->result);
        if (empty($this->obj->{"erro"})){
            $_SESSION['USUARIO'] = $usuario;
            $_SESSION['CONECTADO'] = TRUE;
            header('Location: http://localhost/Cascar/index');
        } else{
            header('Location: pagina-login?status=erro');
        }
    }
}

