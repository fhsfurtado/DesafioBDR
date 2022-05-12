<?php
    // Numero do NSU - Codigo do CV - 26 ao 37 (12 caracteres)
    // Código de Autorização        - 131 a 140 (10 caracteres)
    // Valor da transação           - 71 82 (12 caracteres)

    $path = 'arquivos/GetNet/';
    $doc_getnet_starts = 'extrato_eletronico_';
    $files = array_values(array_filter(scandir($path), function($file) use ($path) { 
        return !is_dir($path . '/' . $file);
    }));
    $iniciocv = 25;
    $tamanhocv= 12;
    $iniciocat= 130;
    $tamanhoca= 10;
    $iniciovtr= 70;
    $tamanhovt= 12;

    $seekNSU = '40612';
    $seekCod = 'R73242';
    foreach($files as $file){
        if(strpos( $file,$doc_getnet_starts)!==false){
            $arquivo = file($path.$file);
            $qtde_linhas = count($arquivo);
            for($i=0;$i<$qtde_linhas;$i++){
                //echo '<br>Quantidade de caracteres na linha: '.strlen($arquivo[$i]).'<br>&nbsp;&nbsp;&nbsp;'.$arquivo[$i][0].'<br>';
                if($arquivo[$i][0]=='2'){ // Selecionando caso a linha se refira a um CV
                    $numNSU = substr($arquivo[$i],$iniciocv,$tamanhocv);
                    $codAut = substr($arquivo[$i],$iniciocat,$tamanhoca);
                    $valTrs = substr($arquivo[$i],$iniciovtr,$tamanhovt);
                    if((strpos( $numNSU,$seekNSU)!==false)&&(strpos( $codAut,$seekCod)!==false)){
                        $linha = $i+1;
                        echo '<br>Questão 2, letras A e B:<br>Arquivo: '.$file.'<br>Linha: '.$linha.'<br>NSU Nº: '.$numNSU.'<br>Cód. Aut: '.$codAut.'<br>Valor Compra: '.$valTrs.'<br> - - - - - - - - - - - - - - - Fim Resposta - - - - - - - - - - - - - - - <br>';
                    }
                }
            }
            
        }
    }

    $file = $doc_getnet_starts.'20180321-390833_21032018_000000780_400.TXT';
    $arquivo = file($path.$file);
    $linha = 4; //linha 5, mas inicia em 0;
    $numNSU = substr($arquivo[$linha],113,$tamanhocv);
    $codAut = substr($arquivo[$linha],$iniciocat,$tamanhoca);
    $motivo = substr($arquivo[$linha],75,2);
    echo '<br> Questão 2 letra C<br>Sinal Ajuste:'.$arquivo[$linha][62].'<br>NSU: '.$numNSU.'<br>'.$codAut.'<br>Motivo Ajuste: '.$motivo.'<br>';
    echo '<br> - - - - - - - - RESPOSTA - - - - - - - - <br>O registro inicia-se em "3", o que significa, de acordo com o leiaute da GetNet ,que é um registro de ajuste'
        .'<br>Assim sendo, é necessário verificar o motivo. O motivo "04", segundo a tabela II do manual, indica que houve um reajuste de débito (sinal "-" na posição 63)'
        .' referente ao tipo de ajuste "chargeback"<br> - - - - - - - - - - - - - - - Fim Resposta - - - - - - - - - - - - - - - <br>';


    $path = 'arquivos/Banrisul/';
    $doc_vero_starts = '01167639000129.';
    // Numero do NSU - Codigo do CV - 59 ao 66 (8 caracteres)
    // Valor da transação           - 111 a 125 (15 caracteres)
    $iniciocv = 58;
    $tamanhocv= 8;
    $iniciovtr= 110;
    $tamanhovt= 15;
    $seekNSU = '942516';
    $files = array_values(array_filter(scandir($path), function($file) use ($path) { 
        return !is_dir($path . '/' . $file);
    }));
    
    foreach($files as $file){
        $arquivo = file($path.$file);
        $qtde_linhas = count($arquivo);
        for($i=0;$i<$qtde_linhas;$i++){
            $numNSU = substr($arquivo[$i],$iniciocv,$tamanhocv);
            $codAut = substr($arquivo[$i],$iniciocat,$tamanhoca);
            $valTrs = substr($arquivo[$i],$iniciovtr,$tamanhovt);
            if(strpos($numNSU,$seekNSU)!==false){
                $linha = $i+1;
                echo '<br>Questão 2, letras D e E:<br>Arquivo: '.$file.'<br>Linha: '.$linha.'<br>NSU Nº: '.$numNSU.'<br>Valor Compra: '.$valTrs.'<br> - - - - - - - - - - - - - - - Fim Resposta - - - - - - - - - - - - - - - <br>';
            }
        }
    }
?>