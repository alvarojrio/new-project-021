@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Perfil | Visualizar
@stop

@section('conteudo')

<div class="page-title">
    <div class="title_left">
        <h3>Meu Perfil</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <div class="the-box">

                        Visualize abaixo a configuração atual do seu perfil:

                        <br /><br />

                        <div class="the-box bg-warning">

                            <table>
                                <caption><strong>Informações da <u> conta </u></strong>:</caption>
                                
                                <?php if (!empty($usuario)) { ?>

                                    <tr>
                                        <td><strong>Nome completo:</strong> <?php echo $usuario->nome; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nome de usuário:</strong> <?php echo $usuario->usuario; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>E-mail:</strong> <?php echo $usuario->email; ?></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>


                                <?php } ?>

                            </table>

                        </div>
                        
                        <br/>

                        <button id="alterar" type="submit" class="btn btn-success btn-lg" onclick="window.location.replace('#'); ? > ');">
                            <i class="fas fa-edit"></i> Alterar Senha
                        </button> 


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop