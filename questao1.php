<?php
    //Criar pastas
    $path = 'arquivos/';
    $adquirentes = array("GetNet","RedeCard","Banrisul");
    foreach($adquirentes as $adquirente){
        if(!is_dir($path.$adquirente)){
            mkdir($path.$adquirente, 0777, true);
            echo '<br>Pasta '.$path.$adquirente.' criada com sucesso!';
        } else{
            echo '<br>Alerta: Pasta '.$path.$adquirente.' já existe!';
        }
    }
    $files = array_values(array_filter(scandir($path), function($file) use ($path) { 
        return !is_dir($path . '/' . $file);
    }));

        //GetNet inicia com o CNPJ do  EC
        //$id_getnet = 'extrato_eletronico_'; //iniciar com essa string
        //$id_redecd = 'EE';                  //Inicia com EE, de Extrato Eletrônico
        //$id_banris = '01167639000129.';     //cnpj que nomeia o arquivo
        $ids = array("extrato_eletronico_","EE","01167639000129.");
    foreach($files as $file){
        for($i=0;$i<count($ids);$i++){
            if(strpos( $file,$ids[$i])!==false){
                $arquivo  = $path.$file;
                $location = $path.$adquirentes[$i].'/'.$file;
                if (!copy($arquivo, $location)) {
                    echo "<br>falha ao copiar $file...<br>";
                } else{
                    echo "<br>Arquivo ".$file." movido com sucesso para a pasta ".$path.$adquirentes[$i]."<br>";
                    unlink($arquivo);
                }
            }
        }
    }

?>