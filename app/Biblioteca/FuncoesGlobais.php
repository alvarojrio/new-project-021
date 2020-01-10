<?php
/**
 * =========================================================================
 * BIBLIOTECA DE FUNÇÕES UTEIS E NECESSÁRIAS E REUTILIZADAS EM TODO CÓDIGO
 * =========================================================================
 **/
namespace App\Biblioteca;

use Carbon\Carbon;
use DateTime;

class FuncoesGlobais {
    
    /**
     *
     * Função: Removendo ponto, traço e barra de CPF ou CNPJ  
     * @return string formatada 
     *
     * */
    public static function limparValor($valor) {
        $new_valor = trim($valor);
        $new_valor = str_replace(".", "", $new_valor);
        $new_valor = str_replace(",", "", $new_valor);
        $new_valor = str_replace("-", "", $new_valor);
        $new_valor = str_replace("/", "", $new_valor);
        $new_valor = str_replace("(", "", $new_valor);
        $new_valor = str_replace(")", "", $new_valor);
        $new_valor = str_replace(" ", "", $new_valor);
        return $new_valor;
    }
    

    /**
     *
     * Função: Removendo ponto, traço e barra de CPF ou CNPJ. Versão 2.0
     * @return string formatada
     *
     * */
    public static function limparValor2($valor) {
        $valor = trim($valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", "", $valor);
        $valor = str_replace("/", "", $valor);
        $valor = str_replace("(", "", $valor);
        $valor = str_replace(")", "", $valor);
        $valor = str_replace("[", "", $valor);
        $valor = str_replace("]", "", $valor);
        $valor = str_replace("{", "", $valor);
        $valor = str_replace("}", "", $valor);
        $valor = str_replace(" ", "", $valor);
        return $valor;
    }


    /**
     *
     * Função: Remover virgula de uma string
     * @return valor formatado 
     *
     * */
    public static function limparValorVirgula($valor) {
        $valor = trim($valor);
        $valor = str_replace(",", "", $valor);
        return $valor;
    }


    /**
     *
     * Função: Removendo ponto
     * @return string formatada
     *
     * */
    public static function limparPonto($valor) {
        $valor = trim($valor);
        $valor = str_replace(".", "", $valor);
        return $valor;
    }


    /**
     *
     * Função: Removendo caracteres especiais e espaços 
     * @return string formatada 
     *
     * */
    public static function removerCaracteresEspeciais($valor) {
        $valor = str_replace(" ", "", $valor);
        $valor = str_replace("Á", "A", $valor);
        $valor = str_replace("À", "A", $valor);
        $valor = str_replace("Â", "A", $valor);
        $valor = str_replace("Ã", "A", $valor);
        $valor = str_replace("Ä", "A", $valor);
        $valor = str_replace("É", "E", $valor);
        $valor = str_replace("È", "E", $valor);
        $valor = str_replace("Ê", "E", $valor);
        $valor = str_replace("Ë", "E", $valor);
        $valor = str_replace("Í", "I", $valor);
        $valor = str_replace("Ì", "I", $valor);
        $valor = str_replace("Î", "I", $valor);
        $valor = str_replace("Ï", "I", $valor);
        $valor = str_replace("Ó", "O", $valor);
        $valor = str_replace("Ò", "O", $valor);
        $valor = str_replace("Ô", "O", $valor);
        $valor = str_replace("Õ", "O", $valor);
        $valor = str_replace("Ö", "O", $valor);
        $valor = str_replace("Ú", "U", $valor);
        $valor = str_replace("Ù", "U", $valor);
        $valor = str_replace("Û", "U", $valor);
        $valor = str_replace("Ü", "U", $valor);
        $valor = str_replace("Ç", "C", $valor);  
        return $valor;
    }


    /**
     *
     * Função: Formatar valor monetário para possibilitar inclusão correta no BD, deixando apenas os separadores decimais no valor
     * @return string formatada
     *
     * */
    public static function formatarMoedaParaDatabase($valor) {

        $source = array('.', ',');
        $replace = array('', '.');
        $final = str_replace($source, $replace, $valor); // Remove os pontos e substitui a virgula pelo ponto
        
        return $final;

    }
   /**
     *
     * Função: Formatar valor monetário para possibilitar inclusão correta no BD, deixando apenas os separadores decimais no valor
     * @return string formatada
     *
     * */
    public static function formatarMoedaParaFront($valor) {

        $source = array(',', '.');
        $replace = array('', ',');
        $final = str_replace($source, $replace, $valor); // Remove os pontos e substitui a virgula pelo ponto
        
        return $final;

    }


    /**
     *
     * Função: Sanitizar número inteiro
     * @return string formatada
     *
     * */
    public static function sanitize_number($number) {
        return filter_var($number, FILTER_SANITIZE_NUMBER_INT);
    }


    /**
     *
     * Função: Sanitizar decimal
     * @return string formatada
     *
     * */
    public static function sanitize_decimal($decimal) {
        return filter_var($decimal, FILTER_SANITIZE_NUMBER_FLOAT);
    }


    /**
     *
     * Função: Sanitizar string
     * @return string formatada
     *
     * */
    public static function sanitize_string($string) {
        $string = strip_tags($string);
        $string = addslashes($string);
        return filter_var($string, FILTER_SANITIZE_STRING);
    }


    /**
     *
     * Função: Sanitizar html
     * @return string formatada
     *
     * */
    public static function sanitize_html($string) {
        $string = strip_tags($string, '<a><strong><em><hr><br><p><u><ul><ol><li><dl><dt><dd><table><thead><tr><th><tbody><td><tfoot>');
        $string = addslashes($string);
        return filter_var($string, FILTER_SANITIZE_STRING);
    }


    /**
     *
     * Função: Sanitizar url
     * @return string formatada
     *
     * */
    public static function sanitize_url($url) {
        return filter_var($url, FILTER_SANITIZE_URL);
    }


    /**
     *
     * Função: Cálculo de regra de 3 
     * @return resultado do cálculo
     *
     * */
    public static function regraDeTres($a, $b, $d) {

        /*****************************************
        /*****************************************
            Modelo do cruzamento de informações

            $a <=> $b
                x
            X  <=> $d
        /*****************************************
        *****************************************/

        // Cálculo do cruzamento 1
        $cruzamento_1 = $a * $d;

        // Cálculo do cruzamento 2
        $cruzamento_2 = $b;

        // Cálculo final
        $total = $cruzamento_1 / $cruzamento_2;

        // Retorno
        return $total;

    }


    /**
     *
     * Função: Converte String para Hexadecimal
     * @return string formatada
     *
     * */
    public static function String2Hex($string) {

        $hex = '';

        for ($i=0; $i < strlen($string); $i++) {

            $hex .= dechex(ord($string[$i]));

        }

        return $hex;

    }


    /**
     *
     * Função: Converte Hexadecimal para String
     * @return string formatada
     *
     * */
    public static function Hex2String($hex) {

        $string = '';

        for ($i=0; $i < strlen($hex)-1; $i+=2) {

            $string .= chr(hexdec($hex[$i] . $hex[$i+1]));

        }

        return $string;

    }


    /**
     *
     * Função: Codifica uma string combinando HEXADECIMAl e BASE64, deixando-a obscura
     * @return string formatada
     *
     * */
    public static function codificaHexBase64($string) {

        $hex = '';
        $based = base64_encode($string);

        for ($i=0; $i < strlen($based); $i++) {

            $hex .= dechex(ord($based[$i]));

        }

        return $hex;

    }


    /**
     *
     * Função: Descodifica uma string que foi anteriormente codificada com HEXADECIMAl e BASE64, deixando-a legível
     * @return string formatada
     *
     * */
    public static function decodificaHexBase64($string) {

        $unhex = '';

        for ($i=0; $i < strlen($string)-1; $i+=2) {

            $unhex .= chr(hexdec($string[$i] . $string[$i+1]));

        }

        $unbased = base64_decode($unhex);

        return $unbased;

    }

    
    /**
     *
     * Função: Máscara telefone
     * @return valor formatado 
     *
     * */
    public static function mascaraTelefone($valor) {
        
        $valor = trim($valor);
     
        // Total de carecter
        $cont = strlen($valor);

        if ($cont == 11) { 

            $parte_um = substr($valor,0,2);
            $parte_dois = substr($valor,2,1);
            $parte_tres = substr($valor,3,5);
            $parte_quatro = substr($valor,7,4);
            $valor = "($parte_um) $parte_dois  $parte_tres - $parte_quatro";

        } elseif ($cont == 10) {

            $parte_um = substr($valor,0,2);
            $parte_dois = substr($valor,2,4);
            $parte_tres = substr($valor,6,4);
            $valor = "($parte_um) $parte_dois - $parte_tres";

        }
        
        return $valor;

    }
    

    /**
     *
     * Função: Máscara CPF
     * @return valor formatado 
     *
     * */
    public static function mascaraCpf($valor) {
        
        $valor = trim($valor);
   
        // Total de carecter
        $cont = strlen($valor);

        if($cont == 11){
            $parte_um = substr($valor,0,3);
            $parte_dois = substr($valor,3,3);
            $parte_tres = substr($valor,6,3);
            $parte_quatro = substr($valor,9,2);
            $valor = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";
        }
         
        
        return $valor;
    }
    

    /**
     *
     * Função: Máscara RG
     * @return valor formatado 
     *
     * */
    public static function mascaraRg($valor) {
        
        $valor = trim($valor);
        
        // Total de carecter
        $cont = strlen($valor);

        if($cont == 9){
            $parte_um = substr($valor,0,2);
            $parte_dois = substr($valor,2,3);
            $parte_tres = substr($valor,5,3);
            $parte_quatro = substr($valor,8,1);
            $valor = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";
        }
          
        
        return $valor;
    }
    

    /**
     *
     * Função: Máscara CNPJ
     * @return valor formatado 
     *
     * */
    public static function mascaraCnpj($valor) {
        
        $valor = trim($valor);
     
         // Total de carecter
        $cont = strlen($valor);

        if($cont == 14){

            $parte_um = substr($valor,0,2);
            $parte_dois = substr($valor,2,3);
            $parte_tres = substr($valor,5,3);
            $parte_quatro = substr($valor,8,4);
            $parte_cinco = substr($valor,12,2);
            $valor = "$parte_um.$parte_dois.$parte_tres/$parte_quatro-$parte_cinco";
        }
    
        return $valor;
    }
    
    
    /**
     *
     * Função: Tirar caracteres especiais
     * @return valor formatado 
     *
     * */
    public static function tirarCaracteresEspeciais($valor) {
   
        return preg_replace(array("/(ç)/","/(Ç)/","/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","c C a A e E i I o O u U n N"),$valor);        
        
        return $valor;
        
    }


    /**
     * Função: Pega todas as datas (data inicio até data fim)  
     * @return: retornar Todos os dias do mês agrupado pelo dia da semana 
     * 
     * */ 
    public static function dias_da_semana($mes_ini, $dia_ini, $ano_ini, $mes_fim, $dia_fim, $ano_fim) {

        $dini = mktime(0,0,0,$mes_ini,$dia_ini,$ano_ini); // timestamp da data inicial
        $dfim = mktime(0,0,0,$mes_fim,$dia_fim,$ano_fim); // timestamp da data final

        // Inicializo as os array que receberão um grupo de data correspondente ao dia semana 
        $diasemana_domingo = array();
        $diasemana_segunda = array();
        $diasemana_terca = array();
        $diasemana_quarta = array();
        $diasemana_quinta = array();
        $diasemana_sexta = array();
        $diasemana_sabado = array();

        while ($dini <= $dfim) { // enquanto uma data for inferior a outra

            $dt = date("Y-m-d",$dini);//convertendo a data no formato dia/mes/ano
            $diasemana = date("w", $dini);   

            // [0 Domingo] - [1 Segunda] - [2 Terca] - [3 Quarta] - [4 Quinta] - [5 Sexta] - [6 Sabado]

            if($diasemana == "0"){ // Domingo 
                $diasemana_domingo[] = $dt; //exibindo a data se for domingo    
            }

            if($diasemana == "1"){ // Segunda 
                $diasemana_segunda[] = $dt; //exibindo a data se for segunda  
            }

            if($diasemana == "2"){ // Terça 
                $diasemana_terca[] = $dt; //exibindo a data se for Terça      
            }

            if($diasemana == "3"){ // Quarta 
                $diasemana_quarta[] = $dt; //exibindo a data se for Quarta      
            }

            if($diasemana == "4"){ // Quinta 
                $diasemana_quinta[] = $dt; //exibindo a data se for Quinta      
            }

            if($diasemana == "5"){ // Sexta 
                $diasemana_sexta[] = $dt; //exibindo a data se for Sexta      
            }

            if($diasemana == "6"){ // Sabado 
                $diasemana_sabado[] = $dt; //exibindo a data se for Sabado     
            }

            $dini += 86400; // adicionando mais 1 dia (em segundos) na data inicial

        }

        // Utilizo combinação array_values() e array_unique() para limpar datas repetidas dos vetores
        /*$diasemana_domingo = array_values(array_unique($diasemana_domingo));
        $diasemana_segunda = array_values(array_unique($diasemana_segunda));
        $diasemana_terca = array_values(array_unique($diasemana_terca));
        $diasemana_quarta = array_values(array_unique($diasemana_quarta));
        $diasemana_quinta = array_values(array_unique($diasemana_quinta));
        $diasemana_sexta = array_values(array_unique($diasemana_sexta));
        $diasemana_sabado = array_values(array_unique($diasemana_sabado));*/

        // Utilizo combinação array_keys() e array_flip() para limpar datas repetidas dos vetores. Essa combinação só funciona com valores inteiros.
        $diasemana_domingo = array_keys(array_flip($diasemana_domingo));
        $diasemana_segunda = array_keys(array_flip($diasemana_segunda));
        $diasemana_terca = array_keys(array_flip($diasemana_terca));
        $diasemana_quarta = array_keys(array_flip($diasemana_quarta));
        $diasemana_quinta = array_keys(array_flip($diasemana_quinta));
        $diasemana_sexta = array_keys(array_flip($diasemana_sexta));
        $diasemana_sabado = array_keys(array_flip($diasemana_sabado));

        // Retorno
        return array($diasemana_domingo, $diasemana_segunda, $diasemana_terca, $diasemana_quarta, $diasemana_quinta, $diasemana_sexta, $diasemana_sabado);

    }


    /**
     *
     * Função: Formata nome do cliente para imprimir na carteirinha
     * @return string formatada
     *
     * */
    public static function converterNomeCart($nome) {

        //verifico quantidade de letras que existe no parametro nome.
        // caso seja maior queu 32 eu faço a redução caso contrário mantenho.
        $nome_qnt = strlen($nome);
        if ($nome_qnt > 32) {

            //MONTAR ARRAY COM O NOME
            $novo_nome = explode((" "), $nome);
            $ultimo_nome = array_pop($novo_nome); //PEGA ultimo NOME
            $primeiro_nome = array_shift($novo_nome); //PEGA priimeiro NOME
            //MONTO ARRAY COM NOMES QUE EU QUERO remover DO ARRAY PRINCIPAL
            $arrayName = array(0 => 'DE', 1 => 'E', 2 => 'DA', 3 => 'DOS', 4 => 'DU', 5 => 'DI', 6 => 'DO');
            //REMOVO OS NOME QUE EU DECLAREI ACIMA DO ARRAY PRINCIPAL
            $result = array_diff($novo_nome, $arrayName);
            //RESETO OS KEY DOS ARRAY ( INDICE )
            $result = array_values($result);
            //CRIO UM ARRAY PARA RECBER OS NOMES ABREVIADOS
            $nome_append = array();
            //FAÇO LOOPING DOS NOME DO MEIO PARA ABREVIAR
            for ($i = 0; $i < count($result); $i++) {
                $nome_append[] = substr($result[$i], 0, 1) . " ";
            }
            //MONTO O NOME
            return $primeiro_nome . " " . implode($nome_append) . " " . $ultimo_nome;
        } else {
            //somente repasso o nome sem modicação
            return $nome;
        }
    }
         

    /**
     *
     * Função: Formata nome da foto para imprimir na carteirinha
     * @return string formatada
     *
     * */
    public static function converterNomeFoto($nome) {

        //verifico quantidade de letras que existe no parametro nome.
        // caso seja maior queu 32 eu faço a redução caso contrário mantenho.
        $nome_qnt = strlen($nome);

        if ($nome_qnt > 20) {

            //MONTAR ARRAY COM O NOME
            $novo_nome = explode((" "), $nome);
            $ultimo_nome = array_pop($novo_nome); //PEGA PRIMEIRO NOME
            $primeiro_nome = array_shift($novo_nome); //PEGA SEGUNDO NOME
            //MONTO ARRAY COM NOMES QUE EU QUERO REMOVO DO ARRAY PRINCIPAL
            $arrayName = array(0 => 'DE', 1 => 'E', 2 => 'DA', 3 => 'DOS', 4 => 'DU', 5 => 'DI', 6 => 'DO');
            //REMOVO OS NOME QUE EU DECLAREI ACIMA DO ARRAY PRINCIPAL
            $result = array_diff($novo_nome, $arrayName);
            //RESETO OS KEY DOS ARRAY ( INDICE )
            $result = array_values($result);
            //CRIO UM ARRAY PARA RECBER OS NOMES ABREVIADOS
            $nome_append = array();
            //FAÇO LOOPING DOS NOME DO MEIO PARA ABREVIAR
            for ($i = 0; $i < count($result); $i++) {
                $nome_append[] = substr($result[$i], 0, 1) . " ";
            }
            //MONTO O NOME
            return $primeiro_nome . " " . implode($nome_append) . " " . $ultimo_nome;
        } else {
            //somente repasso o nome sem modicação
            return $nome;
        }
    }


    /**
     *
     * Função: Procura valor em um array multidimensional
     * @return true ou false 
     *
     * */
    public static function procurar_em_multi_array($needle, $haystack) {

        if (in_array($needle, $haystack)) {

            return true;

        }
        
        foreach ($haystack as $element) :
            
            if (is_array($element) && self::procurar_em_multi_array($needle, $element)) {

                return true;

            }
        
        endforeach;

        return false;

    }


    /**
     *
     * Função: Achata um array multidimensional, reduzindo ele a apenas um nivel
     * @return array formatado
     *
     * */
    public static function flatten_array(array $array) {

        return iterator_to_array(new \RecursiveIteratorIterator(new \RecursiveArrayIterator($array)), false);

    }


    /**
     *
     * Função: Converte texto para letras minúsculas
     * @return string  
     *
     * */
    public static function passarTextoParaMinusculo($texto) {
         
        $texto_minusculo = mb_strtolower($texto,'utf-8');
        
        return $texto_minusculo;

    }
    

    /**
     *
     * Função: Converte texto para letras maiúsculas
     * @return string  
     *
     * */
    public static function passarTextoParaMaisculo($texto) {
         
        $texto_maiusculo = mb_strtoupper($texto,'utf-8');
        
        return $texto_maiusculo;

    }


    /**
     *
     * Função: Gera um número aleatório com um tamanho especificado
     * @return número  
     *
     * */
    public static function gerar_numero_random($length = 32) {

        $final_rand = '';

        for ($i=0; $i< $length; $i++) {
            
            $final_rand .= rand(0, 9);
     
        }
     
        return $final_rand;

    }


    /**
     *
     * Função: Validação se CPF é verdadeiro ou não em PHP 
     * @return valor  
     *
     * */
    public static function validaCPF($cpf) {

        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
        }
        }
        return true;
    }


    /**
     *
     * Função: Para resumir texto com três (..) pontos   
     * @return texto reduzido
     *
     * */
    public static function resumirTexto($var, $limite) {
        // Se o texto for maior que o limite, ele corta o texto e adiciona 3 pontinhos.	
        if (strlen($var) > $limite){
            $var = substr($var, 0, $limite);
            $var = trim($var) . "...";
        }
        return $var;
    }
    

    /**
     *
     * Função: Função para verificar se uma FAIXA ETÁRIA desejada está
     * infringindo outra FAIXA ETÁRIA (cadastrada ou não) anteriormente 
     * @return true ou false  
     *
     * */
    public static function estaInfrigindoUmaFaixaEtaria($faixaInicialBase, $faixaFinalBase, $faixaInicialQueUsuarioQuerCadastrar, $faixaFinalQueUsuarioQuerCadastrar) {

        // Checking 1
        if (($faixaInicialQueUsuarioQuerCadastrar > $faixaInicialBase) && ($faixaInicialQueUsuarioQuerCadastrar > $faixaFinalBase)) {

            // Checking 2
            if (($faixaFinalQueUsuarioQuerCadastrar > $faixaInicialBase) && ($faixaFinalQueUsuarioQuerCadastrar > $faixaFinalBase)) {
                    // Não. Não está infrigindo uma FAIXA ETÁRIA, logo, está disponivel para cadastro.
                    return false;
                }else{
                    // Sim. Sim, está infrigindo uma FAIXA ETÁRIA (dentro de um período (lacuna))
                    return true;
                }
                
            // Checking 3      
            } else if (($faixaInicialQueUsuarioQuerCadastrar < $faixaInicialBase) && ($faixaInicialQueUsuarioQuerCadastrar < $faixaFinalBase)) {
            
                //checking 4
                if (($faixaFinalQueUsuarioQuerCadastrar < $faixaInicialBase) && ($faixaFinalQueUsuarioQuerCadastrar < $faixaFinalBase)) {
                    // Não. Não está infrigindo uma FAIXA ETÁRIA, logo, está disponivel para cadastro.
                    return false;
                  }else{
                    // Sim. Sim, está infrigindo uma FAIXA ETÁRIA (dentro de um período (lacuna))
                    return true;
                  }
                  
            }else{
                    // Sim. Sim, está infrigindo uma FAIXA ETÁRIA (dentro de um período (lacuna))
                    return true;
            }
    }


    /**
     *
     * Função: Função para verificar se a data desejada está
     * infringindo outra data cadastrada anteriormente 
     * @return true ou false  
     *
     * */
    public static function estaInfrigindoUmaData($dataInicialBase, $dataFinalBase, $dataInicialQueUsuarioQuerCadastrar, $dataFinalQueUsuarioQuerCadastrar) {

        $dataInicialBase = DateTime::createFromFormat('Y-m-d', $dataInicialBase);
        $dataFinalBase = DateTime::createFromFormat('Y-m-d', $dataFinalBase);

        // Formatando datas 
        $dataInicialQueUsuarioQuerCadastrar = DateTime::createFromFormat('Y-m-d', $dataInicialQueUsuarioQuerCadastrar);
        $dataFinalQueUsuarioQuerCadastrar = DateTime::createFromFormat('Y-m-d', $dataFinalQueUsuarioQuerCadastrar);

        //checking 1
        if (($dataInicialQueUsuarioQuerCadastrar > $dataInicialBase) && ($dataInicialQueUsuarioQuerCadastrar > $dataFinalBase)) {

            //checking 2
            if (($dataFinalQueUsuarioQuerCadastrar > $dataInicialBase) && ($dataFinalQueUsuarioQuerCadastrar > $dataFinalBase)) {
                // Não. Não está infrigindo uma data, logo, está disponivel para cadastro direto sem verificação de horas
                return false;
                } else{

                // Sim. Sim, está infrigindo uma data (dentro de um período (lacuna)) verificar horas (inicio/fim)
                return true;

                }

            //checking 3  
            } else if (($dataInicialQueUsuarioQuerCadastrar < $dataInicialBase) && ($dataInicialQueUsuarioQuerCadastrar < $dataFinalBase)) {
            //checking 4  
            if (($dataFinalQueUsuarioQuerCadastrar < $dataInicialBase) && ($dataFinalQueUsuarioQuerCadastrar < $dataFinalBase)) {

                // Não. Não está infrigindo uma data, logo, está disponivel para cadastro direto sem verificação de horas
                return false;

              } else{

                // Sim. Sim, está infrigindo uma data (dentro de um período (lacuna)) verificar horas (inicio/fim)
                return true;

              }
            } else{
            // Sim. Sim está infrigindo uma data (dentro de um período (lacuna)) verificar horas (inicio/fim)
            return true;
            }
    }



    /**
     *
     * Função: Função para verificar se o horário desejado está disponível
     * @return true ou false  
     *
     * */
    public static function esteHorarioEstaDisponivel($horarioInicialBase, $horarioFinalBase, $horarioInicialQueUsuarioQuerCadastrar, $horarioFinalQueUsuarioQuerCadastrar) {
        
        // Inicializando variaveis 
        $resultadoUm = "";
        $resultadoDois = "";

        /* $horarioInicialBase = DateTime::createFromFormat('H:i:s', $horarioInicialBase);
          $horarioFinalBase = DateTime::createFromFormat('H:i:s', $horarioFinalBase); */

        // Formatando campos de hora    
        if (!empty($horarioInicialBase)) {

            $horarioInicialBase = Carbon::parse($horarioInicialBase)->format("H:i:s");

        } else {

            $horarioInicialBase = "";

        }

        // Verificando se veio alguma coisa 
        if (!empty($horarioFinalBase)) {

            $horarioFinalBase = Carbon::parse($horarioFinalBase)->format("H:i:s");
            $hFinalBase = Carbon::parse($horarioFinalBase)->format("H");

        } else {

            $horarioFinalBase = "";
            $hFinalBase = "";

        }

        // Dados origem do form (usuário)     
        if (!empty($horarioInicialQueUsuarioQuerCadastrar)) {

            $horarioInicialQueUsuarioQuerCadastrar = Carbon::parse($horarioInicialQueUsuarioQuerCadastrar)->format("H:i:s");
            $hInicialUser = Carbon::parse($horarioInicialQueUsuarioQuerCadastrar)->format("H");

        } else {

            $hInicialUser = "";
            $horarioInicialQueUsuarioQuerCadastrar = "";

        }

        if (!empty($horarioFinalQueUsuarioQuerCadastrar)) {

            $horarioFinalQueUsuarioQuerCadastrar = Carbon::parse($horarioFinalQueUsuarioQuerCadastrar)->format("H:i:s");

        } else {

            $horarioFinalQueUsuarioQuerCadastrar = "";

        }

        // Verificando se os dois fundamentais estão vazios 
        if (empty($horarioInicialBase) && empty($horarioFinalBase)) {

            return "disponivel";

        }

        // Verificando se os dois fundamentais estão vazios 
        if (empty($horarioInicialQueUsuarioQuerCadastrar) && empty($horarioFinalQueUsuarioQuerCadastrar)) {

            return "disponivel";

        }

        //echo "<strong> Usuário Inicial: </strong>" . $horarioInicialQueUsuarioQuerCadastrar . " <strong> Final: </strong>" . $horarioFinalQueUsuarioQuerCadastrar . " | <strong>Base Inicial: </strong> " . $horarioInicialBase . " <strong>Final: </strong>" . $horarioFinalBase . "<br/>";

        if ($horarioInicialQueUsuarioQuerCadastrar && $horarioFinalQueUsuarioQuerCadastrar < $horarioInicialBase || $hInicialUser > $hFinalBase && $horarioFinalQueUsuarioQuerCadastrar > $horarioFinalBase) {
            
            return "disponivel";

        } else {

            return "indisponivel";

        }

    }


    /**
     *
     * Função: Validar se data 1 é maior que data 2 
     * @return true ou false  
     *
     * */
    public static function dataMaiorQue($data_1, $data_2) {
        
        $data_1 = DateTime::createFromFormat('Y-m-d', $data_1);
        $data_2 = DateTime::createFromFormat('Y-m-d', $data_2);

        if ($data_1 > $data_2) {
    
            return true;
            
        } else {

            return false;

        } 
            
    } 


    /**
     *
     * Função: Validar se data 1 é maior ou igual que data 2 
     * @return true ou false  
     *
     * */
    public static function dataMaiorIgualQue($data_1, $data_2) {
        
        $data_1 = DateTime::createFromFormat('Y-m-d', $data_1);
        $data_2 = DateTime::createFromFormat('Y-m-d', $data_2);

        if ($data_1 >= $data_2) {
    
            return true;
            
        } else {

            return false;

        } 
            
    } 


    /**
     *
     * Função: Validar se data 1 é igual a data 2 
     * @return true ou false  
     *
     * */
    public static function dataIgual($data_1, $data_2) {
        
        $data_1 = DateTime::createFromFormat('Y-m-d', $data_1);
        $data_2 = DateTime::createFromFormat('Y-m-d', $data_2);

        if ($data_1 == $data_2) {
    
            return true;
            
        } else {

            return false;

        } 
            
    } 


    /**
     *
     * Função: Checa a diferença em horas entre data 1 e data 2
     * @return valor
     *
     * */
    public static function quantasHorasPassou($data_1, $data_2) {

        // Instancia 2 objetos Datetime
        $data_1 = new DateTime($data_1); // menor
        $data_2 = new DateTime($data_2); // maior

        // Calcula diferença entre datas
        $diff = $data_2->diff($data_1);

        // Capto valor de horas
        $horas = $diff->h;

        // Uno valor de horas e de dias passados
        $horas_passadas = $horas + ($diff->days * 24);

        // Retorno
        return $horas_passadas;

    }


    /**
     *
     * Função: Checa a diferença em dias entre data 1 e data 2
     * @return valor
     *
     * */
    public static function quantasDiasPassou($data_1, $data_2) {

        // Instancia 2 objetos Datetime
        $data_1 = new DateTime($data_1); // menor
        $data_2 = new DateTime($data_2); // maior

        // Calcula diferença entre datas
        $diff = $data_2->diff($data_1);

        // Capto valor de dias
        $dias_passados = $diff->days;

        // Retorno
        return $dias_passados;

    }
    /**
     *
     * Função: Mostra quantos dias restam para chegar uma determinada (data 1 e data 2)
     * @return valor
     *
     * */
    public static function quantosDiasRestamParaChegarData($data_inicial, $data_final) {

        $data_inicial = $data_inicial;
        $data_final = $data_final;
        // Usa a função strtotime() e pega o timestamp das duas datas:
        $time_inicial = strtotime($data_inicial);
        $time_final = strtotime($data_final);
        // Calcula a diferença de segundos entre as duas datas:
        $diferenca = $time_final - $time_inicial; // 19522800 segundos
        // Calcula a diferença de dias
        $dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias

        // Retorno
        return $dias;

    }


    /**
     *
     * Função: Converte minutos para horas e minutos
     * @return valor formatado 
     * @Exemplo: echo convertToHoursMins(250, '%02d hours %02d minutes');
     *
     * */
    function convertToHoursMins($time, $format = '%02d:%02d') {

        if ($time < 1) {
            return;
        }

        $hours = floor($time / 60);
        $minutes = ($time % 60);

        return sprintf($format, $hours, $minutes);

    }


    /**
     *
     * Função: Calcula a idade de uma pessoa baseado na data de nascimento
     * @parameters data de nascimento no formato YYYY-MM-DD
     * @return int  
     *
     * */
    public static function checaIdade($data_nasc) {

        $today = date('Y-m-d'); // Ou date('d/m/Y')
        $diff  = date_diff(date_create($data_nasc), date_create($today));
        
        return $diff->format('%y');

    }


    /**
     *
     * Função: Calcula a idade de uma pessoa baseado na data de nascimento
     * @parameters data de nascimento no formato YYYY-MM-DD
     * @return int  
     *
     * */
    public static function descubroIdade($data_nascimento) {

        $from = new DateTime($data_nascimento);
        $to   = new DateTime('today');
        
        return $from->diff($to)->y;

    }


    /**
     *
     * Função: Calcula a idade de uma pessoa baseado na data de nascimento
     * @parameters data de nascimento no formato YYYY-MM-DD
     * @return int  
     *
     * */
    public static function diferencaDatasFormatada($data_1, $data_2) {

        // Instancia 2 objetos Datetime
        $data_1 = new DateTime($data_1); // menor
        $data_2 = new DateTime($data_2); // maior

        // Formato string de saida
        $saida = $data_2->diff($data_1)->m . ' meses ' . $data_2->diff($data_1)->d . ' dias';

        // Retorno informação
        return $saida;

    }


    /**
     *
     * Função: Retorna idade
     * @return int  
     *
     * */
    public static function calculoIdade() {
    
        $data = date('d/m/Y', strtotime(str_replace('/', '-', $pessoa['data_nascimento'])));
                                                                                             
        // Separa em dia, mês e ano
        list($dia, $mes, $ano) = explode('/', $data);   
                                             
        // Descobre que dia é hoje e retorna a unix timestamp
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                                             
        // Descobre a unix timestamp da data de nascimento do fulano
        $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

        // Depois apenas fazemos o cálculo já citado :)
        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
                                            
        echo $idade . ' anos';
    
    }


    /**
     *
     * Função: Validar endereço de email
     * @return int  
     *
     * */
    public static function valida_email($email) {

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

            return false;

        } else {

            /*list($alias, $domain) = explode("@", $email);

            if (checkdnsrr($domain, "MX")) {

              return true;

            } else {

              return false;

            }*/

            return true;

        }

    }
      

    /**
     *
     * Função: Validar data
     * @return int  
     *
     * */
    public static function valida_data($data, $formato = 'DD/MM/AAAA') {

        switch ($formato) {

            case 'DD-MM-AAAA':
            case 'DD/MM/AAAA':
                //list($d, $m, $a) = preg_split("/[-./ ]/", $data);
                list($d, $m, $a) = preg_split('/[-\.\/ ]/', $data);
            break;
            case 'AAAA/MM/DD':
            case 'AAAA-MM-DD':
                //list($a, $m, $d) = preg_split("/[-./ ]/", $data);
                list($a, $m, $d) = preg_split('/[-\.\/ ]/', $data);
            break;
            case 'AAAA/DD/MM':
            case 'AAAA-DD-MM':
                //list($a, $d, $m) = preg_split("/[-./ ]/", $data);
                list($a, $d, $m) = preg_split('/[-\.\/ ]/', $data);
            break;
            case 'MM-DD-AAAA':
            case 'MM/DD/AAAA':
                //list($m, $d, $a) = preg_split("/[-./ ]/", $data);
                list($m, $d, $a) = preg_split('/[-\.\/ ]/', $data);
            break;
            case 'AAAAMMDD':
                $a = substr($data, 0, 4);
                $m = substr($data, 4, 2);
                $d = substr($data, 6, 2);
            break;
            case 'AAAADDMM':
                $a = substr($data, 0, 4);
                $d = substr($data, 4, 2);
                $m = substr($data, 6, 2);
            break;
            default:
                return false;
            break;

        }

        if (strlen($a) > 4) {

            return false;

        } else {

            return checkdate($m, $d, $a);

        }

    }



} // Fecha classe
