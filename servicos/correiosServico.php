<?php

function calcular_frete($cep_origem,
    $cep_destino,
    $peso = 1, // em quilogramas
    $valor = 2, // valor de serviço adicionais
    $tipo_do_frete = 40010, // Se é PAC ou Sedex
    $altura = 6,
    $largura = 20,
    $comprimento = 20){


    $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
    $url .= "nCdEmpresa=";
    $url .= "&sDsSenha=";
    $url .= "&sCepOrigem=" . $cep_origem;
    $url .= "&sCepDestino=" . $cep_destino;
    $url .= "&nVlPeso=" . $peso;
    $url .= "&nVlLargura=" . $largura;
    $url .= "&nVlAltura=" . $altura;
    $url .= "&nCdFormato=1";
    $url .= "&nVlComprimento=" . $comprimento;
    $url .= "&sCdMaoProria=n";
    $url .= "&nVlValorDeclarado=" . $valor;
    $url .= "&sCdAvisoRecebimento=n";
    $url .= "&nCdServico=" . $tipo_do_frete;
    $url .= "&nVlDiametro=0";
    $url .= "&StrRetorno=xml";

    //Sedex: 40010
    //Pac: 41106

    $xml = simplexml_load_file($url);

    echo "<pre>";
    var_dump($xml);

    return $xml->cServico;

}