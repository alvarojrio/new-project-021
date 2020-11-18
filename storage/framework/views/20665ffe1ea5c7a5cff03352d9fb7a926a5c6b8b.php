<?php $__env->startSection('titulo_pagina'); ?>
CMRJ | Sala de espera | Cadastrar
<?php $__env->stopSection(); ?>

<?php $__env->startSection('includes_no_head'); ?>
<link href="<?php echo e(asset('plugins/select2/dist/css/select2.min.css')); ?>" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

<body>
    
   
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="d-flex flex-grow-1">
                <!-- A logo no menu -->
                <a class="texto navbar-brand d-lg-inline-block" href="#">
                    GRUPO 021
                </a>

                <!-- O botão de esconder menu quando diminuir a tela  -->
                <div class="w-100 text-right">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>

            <!-- O Menu -->
            <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
                <ul class="navbar-nav ml-auto flex-nowrap">
                    <li class="nav-item">
                        <a href="#" class="nav-link m-2 menu-item nav-active">Procruar Evento</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link m-2 menu-item">Criar Evento</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class=" nav-link m-2 menu-item dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ajuda
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link m-2 menu-item">Login</a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    <main class="container w-80 mt-5 bg-white">

        <section class="row">
            <div class="col-md-8 p-0">
                <img src="<?php echo e(asset('site/img/logo.jpg')); ?>" alt="Villa Mix" class="img-fluid">
            </div>

            <div class="col-md-4 border p-3 posicionamento-detalhe">
                <i style=' text-transform: uppercase;'><?=$mes?></i> <br /><?=substr($dados['data_inicio'], 8, 6)?>

                   
                <h5 class="mb-5"><?=$dados['nome_evento']?></h5>
               
                <div class="p-3">
                    
                    <p>R$60 – R$1.000<p>
                </div>
            </div>
        </section>


        <section class="row border p-2">

            <div class="col-md-8 col-sm-6 col-6">
                <!-- Botão de compartilhar -->
                <a href="#">
                    <img src="https://img.icons8.com/windows/32/000000/upload.png">
                </a>
                <!-- Botão de Curtir -->
                <a href="#">
                    <img src="https://img.icons8.com/ios/32/000000/hearts.png">
                </a>
            </div>

            <div class="col-md-4 col-sm-6 col-6 text-right">
                <button class="btn btn-block btn-cor"  id="btn-ingresso">Ingressos</button>
            </div>
        </section>

        <section class="row cor-texto">
            <!-- Descrição do Evento -->
            <div class="col-md-8 col-sm-8 col-12 p-5">

                <?=$dados['detalhes']['descricao']?>

            </div>

          



            <div class="col-md-4 col-sm-4 col-12 mb-3">

                <div class="mt-5">
                    <h6> Data E Hora </h6>
                    <?=$dia_semana?>, <?=substr($dados['data_inicio'], 8, 6)?> de <?=$mes?> de <?=substr($dados['data_inicio'], 0, 4)?>

                    <?=substr($dados['hora_inicio'], 0, 5)?> – 
                    <?=substr($dados['hora_fim'], 0, 5)?> 

                    Horário Padrão de Brasília Horário Brasil (São Paulo) <br>

                    <a href="#" class="btn-link"> Adicionar ao calendário</a>
                </div>

                <div class="mt-5">
                    <h6>Localização</h6>
                    Mineirão

                    1001 Avenida Antônio Abrahão Caran

                    São José, MG 31275-000 <br>

                    <a href="#" class="btn-link">Ver mapa</a>
                </div>

            </div>


        </section>

        <section class="row">
            <!-- Mapa do google incorporado com a localização do evento -->
            <div class="embed-responsive embed-responsive-21by9">
                <iframe class="embed-responsive-item"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17849.0419564544!2d-43.97181666770698!3d-19.869598896480163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa690f7ef4b8959%3A0x3dea902c03827392!2sAv.+Ant%C3%B4nio+Abrah%C3%A3o+Caram%2C+1001+-+S%C3%A3o+Jos%C3%A9%2C+Belo+Horizonte+-+MG%2C+31275-200!5e0!3m2!1spt-BR!2sbr!4v1560801737419!5m2!1spt-BR!2sbr"
                    width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </section>

        <section class="row">
            <div class="text-center p-3 m-auto">
                <h5> <?=$dados['nome_evento']?></h5>
                em
                <h6>Mineirão</h6>
                <p class="cor-texto">1001 Avenida Antônio Abrahão Caran, São José, MG 31275-000</p>
            </div>
        </section>

    </main>


    <footer class="p-3 mt-5 cor-fundo">

        <section class="row cor-lista">

            <div class="col-md-3 col-sm-12 col-12">
                <ul class="lista-estilo">
                    <span>Use a Eventbrite</span>
                    <li><a href="#">Como funciona</a></li>
                    <li><a href="#">Quanto custa</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-12 col-12">
                <ul class="lista-estilo">
                    <span>Planeje eventos</span>
                    <li><a href="#">Inscrições Online</a></li>
                    <li><a href="#"> Organizar Eventos</a></li>
                    <li><a href="#">Organização de Congressos</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-12 col-12">
                <ul class="lista-estilo">
                    <span>Encontre eventos</span>
                    <li><a href="#">Procurar eventos: Local</a></li>
                    <li><a href="#">Obter o aplicativo da Eventbrite</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-12 col-12">
                <ul class="lista-estilo">
                    <span>Conecte-se com a gente</span>
                    <li><a href="#">Denunciar evento</a></li>
                    <li><a href="#">Centro de ajuda</a></li>
                    <li><a href="#">Termos</a></li>
                    <li><a href="#">Privacidade</a></li>
                    <li><a href="#">Diretrizes da comunidade</a></li>
                </ul>
            </div>

        </section>

    </footer>


  <script type="text/javascript" src="<?php echo e(asset('site/js/index-script.js')); ?>"></script>

 <script type="text/javascript">

var id_evento =     <?=$dados['cod_evento']?> ;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function addAoCarrinho(select, valor, preco, ingresso){
    
    let produto_valor   =   valor;
    let produto_preco   =   preco;
    
    let produto_id      =   ingresso;
    let quantidade      = $(select).val();


 $.ajax({
      cache: false,
      type: "POST",
      url: "<?php echo url('/add-cart'); ?>",
      data: { 
          "id_evento"    : id_evento,
          "produto"      :  produto_id,
          "produto_quantidade":  quantidade,
          "produto_preco":  produto_preco
      },
      beforeSend: function() {  
            //loand
      },
      success: function(response) {
          console.log(response);
      }
  });

}

function openPf(){
    
    $(".produtos").html('');
    $.ajax({
      cache: false,
      type: "POST",
      url: "<?php echo url('/buscar-ingressos-pf'); ?>",
      data: { 
          "id_evento": id_evento
      },
      beforeSend: function() {  
            //loand
      },
      success: function(response) {
            
             
                var l = JSON.parse(response);

                if(l.return == 1){

                    l.dados.forEach(function(valor, chave){
                        //console.log(chave, valor);
                   let produtos =  `<div class="card borda-azul mb-3">
                    <div class="card-body">
                        
                        <form action="" class="float-right w-20">
                            <div class="form-group">
                                <select class="form-control" 
                                 onchange="addAoCarrinho(this,`+valor.cod_ingresso+`,`+valor.preco+`,`+valor.cod_ingresso+` )" id="select-ingresso-duplo">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </form>
                        <h6 class="card-title m-0">`+valor.nome+`</h6>
                        <p class="card-text">R$ `+valor.preco+`</p>
                        <hr>
                        <span class="texto-pequeno">*VALOR POR PESSOA</span>
                    </div>
                </div>`;

                 $(".produtos").append(produtos);

               });


                }else{

                    alert('Nenhum Ingresso Encontrato neste pacote !');
                
                }

              $("#modal-ingresso").modal('hide');
              $("#modal-ingresso2").modal('show');

      }
  });

    return false;
}



$("#btn-ingresso").click(function(){
let pf =  `<div class="card">
        <div class="card-header bg-white" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link open-pf" onclick=(openPf(id_evento)) type="button" data-toggle="modal"
                  aria-expanded="true"
                    aria-controls="collapseOne">
                    Pessoa Física
                </button>
            </h2>
        </div>
    </div>`;

let pj =  `    <div class="card">
        <div class="card-header bg-white" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="modal"
                    onclick=(openPj(id_evento)) 
                    aria-expanded="true"
                    aria-controls="collapseOne">
                    Grupo
                </button>
            </h2>
        </div>
    </div>`;


$.ajax({
      cache: false,
      type: "POST",
      url: "<?php echo url('/buscar-tipos-ingresso'); ?>",
      data: { 
          "id_evento": id_evento
      },
      beforeSend: function() {  
            //loand
      },
      success: function(response) {
            console.log(response);
            if(response == 'pf'){
        
                  $('.add-tipo-ingresso').html('');
                  $('.add-tipo-ingresso').html(pf);

                }else{
                  
                  $('.add-tipo-ingresso').html('');
                  $('.add-tipo-ingresso').append(pf);
                  $('.add-tipo-ingresso').append(pj);
                 
             }   

              $("#modal-ingresso").modal('show');

      }
  });
     
      });
  </script>
  

 


</body>

</html>



<!-- ingresso PESSOA FISIC OU GRUPO --> 
<?php echo $__env->make('site.modal.ingresso', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

<!-- CARREGA O TIPO DE INGRESSO, PESSOA FISICA OU GRUPO -->
<?php echo $__env->make('site.modal.tipo_ingresso', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new-project-021\resources\views/site/index.blade.php ENDPATH**/ ?>