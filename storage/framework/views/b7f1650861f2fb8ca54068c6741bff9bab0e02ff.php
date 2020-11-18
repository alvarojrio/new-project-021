<?php $__env->startSection('titulo_pagina'); ?>
CMRJ | Sala de espera | Cadastrar
<?php $__env->stopSection(); ?>

<?php $__env->startSection('includes_no_head'); ?>
<link href="<?php echo e(asset('plugins/select2/dist/css/select2.min.css')); ?>" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
    
 <link rel="stylesheet" href="<?php echo e(asset('site/css/login-estilo.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

<?php
/*if(Auth::guard('cliente')->check())
     php
        header("Location: " . URL::to('/'), true, 302);
        exit();
    endphp
 endif*/

 ?>


<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="d-flex flex-grow-1">
                <!-- A logo no menu -->
                <a class="texto-logo navbar-brand d-lg-inline-block" href="#">
                    eventbrite
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
                  
                </ul>
            </div>
        </nav>

    </header>


    <main class="container mt-5">


        <div>
            <h3 class="m-0 mr-3 texto-titulo">
                    <img class=" img-fluid" src="https://img.icons8.com/dusk/38/000000/password.png">
                Login</h3>
           
        </div>


        <!--<?php if(isset($errors) && count($errors) > 0 ): ?>
             @$foreach($errors->all() as $erro)
                 <?php echo e($erro); ?>

             @$endforeach;
          
        <?php endif; ?>-->
      
        <div class="p-3 mb-2 bg-danger text-white msg-error" style="display: none"> teste</div>

        <hr class="mt-0">

        <section class="row mt-3">

            <div class="col-md-5 col-sm-12 col-12 mb-5">

                <div class="card">

                    <div class="card-body">
                        <form action="" id="form" method="post" >

                            <div class="form-group">
                                <label for="usuario" class="texto-label">DIGITE SEU E-MAIL/USUÁRIO</label>
                                <input type="text" class="form-control" name="" id="usuario"
                                    placeholder="e-mail/usuário" required>
                            </div>

                            <div class="form-group">
                                <label for="senha" class="texto-label">DIGITE SUA SENHA</label>
                                <input type="password" class="form-control" name="" id="senha" placeholder="senha"
                                    required>
                            </div>

                            <a href="#" class="btn-link texto-pequeno">Esqueci minha senha</a>
                            <button type="submit" class="btn btn-success float-right bnt-block">Entrar</button>
                        </form>

                    </div>

                </div>

            </div>
            <div class="col-md-3"></div>
            <div class="col-md-4 col-sm-12 col-12 mb-5">

                <div class="card">

                    <div class="card-body">
                        <h6>Cadastro</h6>
                        <hr class="m-0">
                        <form action="" class="mt-3">

                            <div class="form-group">
                                <label for="usuario" class="texto-label">DIGITE SEU CPF</label>
                                <input type="text" class="form-control" name="" id="usuario" placeholder="CPF" required>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Iniciar Cadastro</button>
                        </form>

                    </div>
                </div>


            </div>

        </section>



    </main>


   
</body>

</html>

<?php 

    if(!empty( app('request')->input('checkout') )){ 
       $checkout = 1; 
     }else{ 
       $checkout = 0; 
    } 




?>
<script type="text/javascript">
  
let redirectType = <?=$checkout?>

console.log(redirectType);

$("#form").submit(function() {
     
    let login = $("#usuario").val();
    let senha = $("#senha").val();

    $(".bnt-block").prop('disabled', true);

  if(login.length < 3 && senha.length < 3  ){
   
     $(".msg-error").css("display","block");
     $(".msg-error").html(" ");
     $(".msg-error").html("Digite as informação corretamente  ! ");
     return false;
  }

  $.ajax({
      cache: false,
      type: "POST",
      url: "<?php echo url('/loginuser'); ?>",
      data: { 
          "usuario": login,
          "senha": senha
      },
      beforeSend: function() {  
            //loand
      },
      success: function(response) {
            
              console.log(response);
    $(".bnt-block").prop('disabled', false);

            if(response == 1){
             
                 alert("Login realizado com sucesso ");

                 if(redirectType == 1){
                   
                    window.location= "<?php echo url('/checkout?login=true'); ?>";
                 
                   }else{

                    window.location= "<?php echo url('/'); ?>";

                   }

            }else{

                   $(".msg-error").css("display","block");
                   $(".msg-error").html(" ");
                   $(".msg-error").html("Ops.. Senha e/ou Login invalidos ! ");

            }

        }

  });
            


                return false;
  });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new-project-021\resources\views/site/login.blade.php ENDPATH**/ ?>