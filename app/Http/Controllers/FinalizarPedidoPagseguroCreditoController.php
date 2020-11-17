<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Carrinho;
use Session;
use App\Ingresso;
use App\Compras;
use App\Compras_itens;
use App\Compras_pagto;
use App\Compra_detalhes;
use App\Usuarios;        
use PagSeguro; //Utilize a Facade
use Illuminate\Support\Facades\Auth;

class FinalizarPedidoPagseguroCreditoController extends Controller
{
    //

    public function postPagarPagseguroCredito(Request $request){
    
    $buscar_cliente = Usuarios::with('Clientes')->find(Auth::guard('cliente')->user()->cod_usuario)->toArray();

    $items       = session('carrinhob');
    $produtos    = array();
    
    for ($i=0; $i < count($items) ; $i++) {
        $produtos += [
            'itemId' => $items[$i][0]['cod_produto'],
            'itemDescription' => 'Nome do Item',
            'itemAmount' =>  $items[$i][0]['valor'], //Valor unitário
            'itemQuantity' =>  $items[$i][0]['quantidade'] // Quantidade de itens
        ];
  }



    


    $clientes_cep         = (!empty($buscar_cliente['clientes']["clientes_cep"]))? $buscar_cliente['clientes']["clientes_cep"] : 'Nao informado';  
    $clientes_logradouro  = (!empty($buscar_cliente['clientes']["clientes_logradouro"]))?  $buscar_cliente['clientes']["clientes_logradouro"] : 'Nao informado';  
    $clientes_numero      = (!empty($buscar_cliente['clientes']["clientes_numero"]))? $buscar_cliente['clientes']["clientes_numero"] : 'Nao informado';  
    $clientes_complemento = (!empty($buscar_cliente['clientes']["clientes_complemento"]))? $buscar_cliente['clientes']["clientes_complemento"] : 'Nao informado';  
    $clientes_bairro      = (!empty($buscar_cliente['clientes']["clientes_bairro"]))? $buscar_cliente['clientes']["clientes_bairro"] : 'Nao informado';  
    $clientes_cidade      = (!empty($buscar_cliente['clientes']["clientes_cidade"]))?  $buscar_cliente['clientes']["clientes_cidade"] : 'Nao informado';  
    $clientes_uf          = (!empty( $buscar_cliente['clientes']["clientes_uf"]))?  $buscar_cliente['clientes']["clientes_uf"] : 'Nao informado'; 


    $clientes_telefone    = (!empty( $buscar_cliente['clientes']["clientes_telefone"]))?  $buscar_cliente['clientes']["clientes_telefone"] :    '(00) 1000-1000'; 
    $clientes_telefone2   = (!empty( $buscar_cliente['clientes']["clientes_telefone2"]))?  $buscar_cliente['clientes']["clientes_telefone2"] : '(00) 1000-1000'; 
    $clientes_nascimento   = (!empty( $buscar_cliente['clientes']["clientes_nascimento"]))?  $buscar_cliente['clientes']["clientes_nascimento"] : '10/10/2000'; 
    $clientes_email   = (!empty( $buscar_cliente['clientes']["clientes_email"]))?  $buscar_cliente['clientes']["clientes_email"] : 'email@gmail.com'; 
    $clientes_cpf   = (!empty( $buscar_cliente['clientes']["clientes_cpf"]))?  $buscar_cliente['clientes']["clientes_cpf"] : 'email@gmail.com'; 


    $nome_cartao   = $request->input('nome_cartao'); 

    $parcela_x_valor = explode('x',$request->input('qnt_parcelas'));
    $parcela = $parcela_x_valor[0];
    $valor = $parcela_x_valor[1];

    $senderHash   = $request->input('senderHash'); 
    $tokencard   = $request->input('tokencard'); 


    $clientes_nascimento = implode("/",array_reverse(explode("-",$clientes_nascimento)));

    $pagseguro = PagSeguro::setReference('999888')
        ->setSenderInfo([
        'senderName' => $nome_cartao, //Deve conter nome e sobrenome
        'senderPhone' => $clientes_telefone, //Código de área enviado junto com o telefone
        'senderEmail' =>  $clientes_email,
        'senderHash' => $senderHash,
        'senderCPF' => $clientes_cpf//'132.629.167-06' //Ou CNPJ se for Pessoa Júridica
        ])
        ->setCreditCardHolder([
        'creditCardHolderName' => $nome_cartao, //Deve conter nome e sobrenome
        'creditCardHolderPhone' => $clientes_telefone, //Código de área enviado junto com o telefone
        'creditCardHolderCPF' => $clientes_cpf,//'132.629.167-06', //Ou CNPJ se for Pessoa Júridica
        'creditCardHolderBirthDate' => $clientes_nascimento //'10/02/2000',
        ])
        ->setShippingAddress([ // OPCIONAL
        'shippingAddressStreet' => $clientes_logradouro,
        'shippingAddressNumber' => $clientes_numero,
        'shippingAddressDistrict' => $clientes_bairro,
        'shippingAddressPostalCode' => $clientes_cep,
        'shippingAddressCity' => $clientes_cidade,
        'shippingAddressState' => $clientes_uf
        ])
        ->setBillingAddress([
        'billingAddressStreet' => $clientes_logradouro,
        'billingAddressNumber' => $clientes_numero,
        'billingAddressDistrict' =>  $clientes_bairro,
        'billingAddressPostalCode' =>  $clientes_cep,
        'billingAddressCity' => $clientes_cidade,
        'billingAddressState' => $clientes_uf
        ])
        ->setItems([$produtos])
        ->send([
        'paymentMethod' => 'creditCard',
        'creditCardToken' => $tokencard,
        'installmentQuantity' => 1,
        'installmentValue' => 90.00,
        ]);
         
     
    
    }

}
