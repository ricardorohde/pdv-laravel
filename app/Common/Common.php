<?php

namespace App\Common;

// use GuzzleHttp\Client;
// use DB;
// use GuzzleHttp\Exception\RequestException;
// use \Illuminate\Database\QueryException;
use Illuminate\Support\Str;

// define('TYPE', 'x-www-form-urlencoded');
class Common
{

    public function onlyNumbers($str)
    {
        return preg_replace("/[^0-9]/", "", $str);
    }
//     protected $client;

//     public function __construct()
//     {
//         $secret = config('magento.secret');
//         $urlServer = config('magento.urlServer');
//         $pathSinc_server = config('alpha.sinc_path_server');
// //dd($pathSinc_server);
//         $this->client = new Client([
//             'base_uri' => $urlServer . "$pathSinc_server/public/api/",
//             'timeout' => 0,
//             'headers' => [
//                 'Authorization' => $secret
//             ]
//         ]);

//     }

    // public function createRequest($method, $uri, $postFields = null, $type = TYPE)
    // {

    //     return $this->client->request($method, $uri, ['form_params' => $postFields]);
    // }

    // public function createJSONRequest($method, $uri, $body) {
        
    //     $secret = config('magento.secret');
    //     $urlServer = config('magento.urlServer');
        
    //     $cli = new Client([
    //         'base_uri' => $urlServer . 'server-ecommerce/public/api/',
    //         'timeout' => 0,
    //         'headers' => [
    //             'Authorization' => $secret,
    //             'accept' => 'application/json'
    //         ]
    //     ]);

    //     return $cli->request($method, $uri,  ['json' => $body ] );
    // }

    // public function withoutAccents($str)
    // {
    //     return preg_replace(array("/(á|à|ã|â|ä)/",
    //         "/(Á|À|Ã|Â|Ä)/",
    //         "/(é|è|ê|ë)/",
    //         "/(É|È|Ê|Ë)/",
    //         "/(í|ì|î|ï)/",
    //         "/(Í|Ì|Î|Ï)/",
    //         "/(ó|ò|õ|ô|ö)/",
    //         "/(Ó|Ò|Õ|Ô|Ö)/",
    //         "/(ú|ù|û|ü)/",
    //         "/(Ú|Ù|Û|Ü)/",
    //         "/(ñ)/",
    //         "/(Ñ)/",
    //         "/(ç)/",
    //         "/(Ç)/",
    //         "/(')/"), explode(" ", "a A e E i I o O u U n N c C"), (String) $str);
    // }

    // public function searchPayMethod($PayMethod)
    // {


    //     switch ($PayMethod) {

    //         case 'banktransfer':
    //             $paymentMethod = 'VALE ALIMENTACAO';
    //             break;
    //         case 'cashondelivery':
    //             $paymentMethod = 'CARTAO CREDITO/DEBITO';
    //             break;
    //         case 'purchaseorder':
    //             $paymentMethod = 'DINHEIRO';
    //             break;
    //         case 'checkmo':
    //             $paymentMethod = 'VALE ALIMENTACAO';
    //             break;
    //         case 'pagseguro':
    //             $paymentMethod = 'PAG-SEGURO';
    //             break;
    //         case 'pagseguro_default_lightbox' :
    //             $paymentMethod = 'PAG-SEGURO';
    //             break;
    //         default:
    //             $paymentMethod = 'NENHUMA';

    //     }

    //     return $paymentMethod;

    // }

    // public function hasSkyhub()
    // {
    //     $sh = DB::table('sys_parametros')->select('conteudo')->where('idparametro', 'ECSKU')->first();

    //     $param = $sh->conteudo;

    //     if ($param == 's' || $param == 'S')
    //         return true;

    //     return false;
    // }


    // public function getCodeIbge($cep, $uf, $cidade, $logradouro)
    // {

    //     $ibgeTableSigcom = DB::table('nfe_mun_ibge')->select('cod_ibge', 'nome_cidade', 'uf')
    //         ->where('nome_cidade', self::withoutAccents(Str::upper($cidade)))
    //         ->where('uf', Str::upper($uf))->first();

    //     if ($ibgeTableSigcom == null) {
    //         $client = new Client();
    //         $Err = $client->request('GET', "https://viacep.com.br/ws/$cep/json");

    //         if (isset(\GuzzleHttp\json_decode($Err->getBody()->getContents())->erro)) {

    //             $res = $client->request('GET', "https://viacep.com.br/ws/$uf/$cidade/$logradouro/json");
    //             return \GuzzleHttp\json_decode(str_replace(']', '', str_replace('[', '', $res->getBody()->getContents())));


    //         } else {
    //             $res = $client->request('GET', "https://viacep.com.br/ws/$cep/json");
    //             return \GuzzleHttp\json_decode($res->getBody()->getContents());

    //         }
    //     } else {

    //         //dd($ibgeTableSigcom->cod_ibge);
    //         $codIbge = $ibgeTableSigcom->cod_ibge;
    //         $nomeCidade = Str::upper(self::withoutAccents($ibgeTableSigcom->nome_cidade));
    //         $siglaUf = Str::upper(self::withoutAccents($ibgeTableSigcom->uf));
    //         $rua = Str::upper(self::withoutAccents($logradouro));

    //         $payload = "{\"cep\": \"$cep\",\"logradouro\": \"$rua\",\"complemento\": \"\",\"bairro\": \"\",\"localidade\": \"$nomeCidade\",\"uf\": \"$siglaUf\",\"unidade\": \"\",\"ibge\": $codIbge,\"gia\": \"\"}";

    //         //echo "aqui";
    //         //dd($paylod);
    //         return \GuzzleHttp\json_decode($payload);
    //     }

    // }

    // public function consultarCpf($cpf) {
        /**
         * Parâmetros declarados no config.php
         *
        define('SCP_CODIGO', '067');
        define('SCP_SENHA', 'MS4518');
        define('SCP_SOLICITANTE', 'LOJAS MINATEL LTDA - MATRIZ');
        define('SCP_TIPO_CREDITO', 'CD');
         */


        // $codigo         = '067';
        // $senha          = 'MS4518';
        // $consulta       = '909';
        // $solicitante    = 'LOJAS MINATEL LTDA - MATRIZ';
        // $tipo_credito   = 'CD';

        /* $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<SPCA-XML>';
        $xml .=     '<VERSAO>20131120</VERSAO>';
        $xml .=     '<SOLICITACAO>';
        $xml .=         "<S-CODIGO>$codigo</S-CODIGO>";
        $xml .=         "<S-SENHA>$senha</S-SENHA>";
        $xml .=         "<S-CONSULTA>$consulta</S-CONSULTA>";
        $xml .=         "<S-SOLICITANTE>$solicitante</S-SOLICITANTE>";
        $xml .=     "<S-CPF>$cpf</S-CPF>";
        $xml .=     "<S-TIPO-CREDITO>$tipo_credito</S-TIPO-CREDITO>";
        $xml .=     '</SOLICITACAO>';
        $xml .= '</SPCA-XML>';

        $response = $this->make("POST", "https://www.scpc.inf.br/cgi-bin/spcaxml", $xml);*/
       //dd($response);

  #######XML USADO PARA TESTES DE CONSULTA DE CLIENTES PARA O MELI#########################################
 /*$testeXml = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n
<SPCA-XML xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:noNamespaceSchemaLocation=\"https://www.scpc.inf.br/spcn/spcaxml.xsd\">\n
    <VERSAO>20131120</VERSAO>\n
    <SOLICITACAO>\n
        <S-CODIGO>67</S-CODIGO>\n
        <S-SENHA>MS4518</S-SENHA>\n
        <S-CONSULTA>909</S-CONSULTA>\n
        <S-SOLICITANTE>LOJAS MINATEL L</S-SOLICITANTE>\n
        <S-CPF>4602454658</S-CPF>\n
        <S-VALOR>129</S-VALOR>\n
        <S-TIPO-CREDITO>CD</S-TIPO-CREDITO>\n
    </SOLICITACAO>\n
    <RESPOSTA>\n
        <RESPOSTA-RETORNO>\n
            <STATUS-RESPOSTA>0</STATUS-RESPOSTA>\n
            <MENSAGEM-RESPOSTA>CONSULTA CONCLUIDA</MENSAGEM-RESPOSTA>\n
        </RESPOSTA-RETORNO>\n
        <NUMERO-RESPOSTA>000416115-7</NUMERO-RESPOSTA>\n
        <ASSOCIADO-SOLICITANTE>ELETRO MOVEIS</ASSOCIADO-SOLICITANTE>\n
        <NOME-CONSULTA>SCPC Nacional (R$ 1,75)</NOME-CONSULTA>\n
        <IP-SOLICITANTE>177.22.66.99</IP-SOLICITANTE>\n
        <REGISTRO-ACSP-SPC>\n
            <SPC-128-SINTESE>\n
                <SPC-128-DADOS>\n
                    <SPC-128-NOME>JADER  PINHEIRO</SPC-128-NOME>\n
                    <SPC-128-CPF>4602454658</SPC-128-CPF>\n
                    <SPC-128-NASCIMENTO>19811007</SPC-128-NASCIMENTO>\n
                    <SPC-129-MAE>MARIA OLINDA MOURA PINHEIRO</SPC-129-MAE>\n
                    <SPC-129-TITULO>133808430221</SPC-129-TITULO>\n
                </SPC-128-DADOS>\n
            </SPC-128-SINTESE>\n
            <SPC-122-DADOS>\n
                <SPC-122-CPF>4602454658</SPC-122-CPF>\n
            </SPC-122-DADOS>\n
            <SPC-126-CONSULTA>\n
                <SPC-126-ANTERIORES>\n
                    <SPC-126-TPCREDITO>CD</SPC-126-TPCREDITO>\n
                    <SPC-126-OCORRENCIA>20190801</SPC-126-OCORRENCIA>\n
                    <SPC-126-INFORMANTE>SP-TBU/ELETRO MOVEIS</SPC-126-INFORMANTE>\n
                </SPC-126-ANTERIORES>\n
                <SPC-126-ANTERIORES>\n
                    <SPC-126-TPCREDITO>CD</SPC-126-TPCREDITO>\n
                    <SPC-126-OCORRENCIA>20190529</SPC-126-OCORRENCIA>\n
                    <SPC-126-INFORMANTE>SP-TBU/ELETRO MOVEIS</SPC-126-INFORMANTE>\n
                </SPC-126-ANTERIORES>\n
                <SPC-126-ANTERIORES>\n
                    <SPC-126-TPCREDITO>CC</SPC-126-TPCREDITO>\n
                    <SPC-126-OCORRENCIA>20190519</SPC-126-OCORRENCIA>\n
                    <SPC-126-INFORMANTE>NU PAGAMENTOS S.A</SPC-126-INFORMANTE>\n
                </SPC-126-ANTERIORES>\n
            </SPC-126-CONSULTA>\n
        </REGISTRO-ACSP-SPC>\n
    </RESPOSTA>\n
</SPCA-XML>\n";*/

//$xml = simplexml_load_string($testeXml); //resposta de teste

        // $xml = simplexml_load_string($response); //resposta oficial
        // $json = json_encode($xml);
        // $array = json_decode($json,TRUE);


        // $nome = $array['RESPOSTA']['REGISTRO-ACSP-SPC']['SPC-128-SINTESE']['SPC-128-DADOS']['SPC-128-NOME'];
        // $nascimento = $array['RESPOSTA']['REGISTRO-ACSP-SPC']['SPC-128-SINTESE']['SPC-128-DADOS']['SPC-128-NASCIMENTO'];

//dd($nome, $nascimento);
//dd($array['RESPOSTA']['REGISTRO-ACSP-SPC']['SPC-128-SINTESE']['SPC-128-DADOS']);
//dd($array['VERSAO']);
//dd("PARAR");

    //     return [
    //        'nome' => $nome,
    //         'data_nascimento' => $nascimento
    //     ];
    // }

    
    // public function porExtenso( $valor = 0, $bolExibirMoeda = true, $bolPalavraFeminina = false )
    // {
    //     $valor = self::onlyNumbers( $valor );
    //     $singular = null;
    //     $plural = null;
    //     if ( $bolExibirMoeda )
    //     {
    //         $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
    //         $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
    //     }
    //     else
    //     {
    //         $singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
    //         $plural = array("", "", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
    //     }
    //     $c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
    //     $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
    //     $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
    //     $u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
    //     if ( $bolPalavraFeminina )
    //     {
    //         if ($valor == 1)
    //             $u = array("", "uma", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
    //         else
    //             $u = array("", "um", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
    //         $c = array("", "cem", "duzentas", "trezentas", "quatrocentas","quinhentas", "seiscentas", "setecentas", "oitocentas", "novecentas");
    //     }
    //     $z = 0;
    //     $valor = number_format( $valor, 2, ".", "." );
    //     $inteiro = explode( ".", $valor );
    //     for ( $i = 0; $i < count( $inteiro ); $i++ )
    //         for ( $ii = mb_strlen( $inteiro[$i] ); $ii < 3; $ii++ )
    //             $inteiro[$i] = "0" . $inteiro[$i];
    //     // $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
    //     $rt = null;
    //     $fim = count( $inteiro ) - ($inteiro[count( $inteiro ) - 1] > 0 ? 1 : 2);
    //     for ( $i = 0; $i < count( $inteiro ); $i++ )
    //     {
    //         $valor = $inteiro[$i];
    //         $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
    //         $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
    //         $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";
    //         $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
    //         $t = count( $inteiro ) - 1 - $i;
    //         $r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";
    //         if ( $valor == "000")
    //             $z++;
    //         elseif ( $z > 0 )
    //             $z--;
    //         if ( ($t == 1) && ($z > 0) && ($inteiro[0] > 0) )
    //             $r .= ( ($z > 1) ? " de " : "") . $plural[$t];
    //         if ( $r )
    //             $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
    //     }
    //     $rt = mb_substr( $rt, 1 );
    //     return($rt ? trim( $rt ) : "zero");
    // }


    /**
     * Substitui o número por seu respectivo extenso no nome da rua
     *
     * @param string Rua de entrega
     * @return array (Nome da rua tratado)
     */

    // public function chkAddressNumbers($address)
    // {

    //     $array = explode(' ', $address);

    //     $returnAddress[] = null;

    //     foreach ($array as $a) {

    //         $chkNumbers = $this->onlyNumbers($a);

    //         if ($chkNumbers != null) {
    //             $line = str_replace($a, strtoupper($this->porExtenso($a, false, false)), $a);
    //         } else {
    //             $line = $a;
    //         }

    //         array_push($returnAddress, trim($line));

    //     }

    //     return $returnAddress;

    // }

    // function chkCpfOrCnpj($cpfOrCnpj) {

    //    if(Str::length($cpfOrCnpj) == 11) {
    //        $cpf = preg_replace('/[^0-9]/is', '', $cpfOrCnpj);

    //        // Verifica se foi informado todos os digitos corretamente
    //        if (strlen($cpf) != 11) {
    //            return false;
    //        }
    //        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    //        if (preg_match('/(\d)\1{10}/', $cpf)) {
    //            return false;
    //        }
    //        // Faz o calculo para validar o CPF
    //        for ($t = 9; $t < 11; $t++) {
    //            for ($d = 0, $c = 0; $c < $t; $c++) {
    //                $d += $cpf{$c} * (($t + 1) - $c);
    //            }
    //            $d = ((10 * $d) % 11) % 10;
    //            if ($cpf{$c} != $d) {
    //                return false;
    //            }
    //        }
    //        return true;

    //    }if (Str::length($cpfOrCnpj) == 14) {

    //         $cnpj = preg_replace('/[^0-9]/', '', (string)$cpfOrCnpj);

    //         // Valida tamanho
    //         if (strlen($cnpj) != 14)
    //             return false;
    //         // Verifica se todos os digitos são iguais
    //         if (preg_match('/(\d)\1{13}/', $cnpj))
    //             return false;
    //         // Valida primeiro dígito verificador
    //         for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
    //             $soma += $cnpj{$i} * $j;
    //             $j = ($j == 2) ? 9 : $j - 1;
    //         }
    //         $resto = $soma % 11;
    //         if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
    //             return false;
    //         // Valida segundo dígito verificador
    //         for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
    //             $soma += $cnpj{$i} * $j;
    //             $j = ($j == 2) ? 9 : $j - 1;
    //         }
    //         $resto = $soma % 11;
    //         return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    //     }else{
    //        return false;
    //     }

    // }

    /*
     * Recebe o nome do cliente $orders->customer->name
     * e verifica se o existe algum cpf ou cnpj valido
     * concatenado no nome para ser salva no sigcom
     * (pagar com cartão de outra pessoa)
     */
    // public function chkTitularCartao($nomeCliente){

    //     $issetCpf = $this->onlyNumbers($nomeCliente);

    //     if($this->onlyNumbers($issetCpf) !== null && $this->chkCpfOrCnpj($issetCpf)){

    //         return true;

    //     }else{
    //         return false;
    //     }

    // }

    // public function getCardFlag($cardNumber){

    //     $cartao = str_replace('/[^0-9]+/g', '',$cardNumber);

    //     switch($cartao){
    //         case (bool) preg_match('/^(636368|438935|504175|451416|636297)/', $cartao) :
    //             $bandeira = 'elo';
    //             break;

    //         case (bool) preg_match('/^(606282)/', $cartao) :
    //             $bandeira = 'hipercard';
    //             break;

    //         case (bool) preg_match('/^(5067|4576|4011)/', $cartao) :
    //             $bandeira = 'elo';
    //             break;

    //         case (bool) preg_match('/^(3841)/', $cartao) :
    //             $bandeira = 'hipercard';
    //             break;

    //         case (bool) preg_match('/^(6011)/', $cartao) :
    //             $bandeira = 'discover';
    //             break;

    //         case (bool) preg_match('/^(622)/', $cartao) :
    //             $bandeira = 'discover';
    //             break;

    //         case (bool) preg_match('/^(301|305)/', $cartao) :
    //             $bandeira = 'diners';
    //             break;

    //         case (bool) preg_match('/^(34|37)/', $cartao) :
    //             $bandeira = 'amex';
    //             break;

    //         case (bool) preg_match('/^(36,38)/', $cartao) :
    //             $bandeira = 'diners';
    //             break;

    //         case (bool) preg_match('/^(64,65)/', $cartao) :
    //             $bandeira = 'discover';
    //             break;

    //         case (bool) preg_match('/^(50)/', $cartao) :
    //             $bandeira = 'aura';
    //             break;

    //         case (bool) preg_match('/^(35)/', $cartao) :
    //             $bandeira = 'jcb';
    //             break;

    //         case (bool) preg_match('/^(60)/', $cartao) :
    //             $bandeira = 'hipercard';
    //             break;

    //         case (bool) preg_match('/^(4)/', $cartao) :
    //             $bandeira = 'visa';
    //             break;

    //         case (bool) preg_match('/^(5)/', $cartao) :
    //             $bandeira = 'mastercard';
    //             break;

    //         default:
    //             $bandeira = 'bandeira invalida';
    //             break;
    //     }

    //     return $bandeira;



    // }

}




