<?php
    
    $path = 'arquivos/';
    $files = array_values(array_filter(scandir($path), function($file) use ($path) { 
        return !is_dir($path . '/' . $file);
    }));
    echo 'Quantidade: '.count($files).'<br>Arquivos carregados: <br>';
    foreach($files as $file){
        echo '<br>Nome do arquivo: '.$file.'<br>';
        $arquivo = file($path.$file);
        //print_r($arquivo);
        //echo '<br> - - - - - - - - - - - - EOF - - - - - - - - - - - - <br>';
    }
?>