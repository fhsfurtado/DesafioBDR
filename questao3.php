<?php

    /*
            Notas do Dev:
        $linha      -> linha onde o erro foi indicado
        $inicio     -> posição de inicio do bloco de informação da questão (105 ao 108)
        $blocksize  -> tamanho do bloco de informação (diferença entre 105 e 108)
        $path       -> pasta onde está o arquivo
    */
    $linha = 12;    // linha 13 - 1 por iniciar em 0 a contagem
    $inicio = 104;  // inicio 105 -1 por iniciar em 0 a contagem
    $blocksize = 4;
    $path = 'arquivos/Banrisul/';
    $file = '01167639000129.BJR02.D1180910.T011541.roff';
    $arquivo = file($path.$file);
    echo 'linha 13: '.$arquivo[$linha].'<br>';
    $linha = $arquivo[12];
    echo '<br>Informação: '.substr($linha,$inicio,$blocksize);
    echo '<br>';

    /* Inicio email
    
    Olá,
    Ocorreu uma falha na geração de transação onde foi percebido que, na linha 13 do arquivo
    '01167639000129.BJR02.D1180910.T011541.roff' (em anexo) o mnemônico gerado (PGTU) não
    está dentro das especificações de serviço do manual.
    Necessitamos de avaliação, suporte e retorno referente a esse serviço a fim de efetuarmos
    com a maior brevidade possível os procedimentos a fim de solucionar o ocorrido.

    Fim email */
?>