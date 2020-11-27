
<div class="modal fade" id="modal-ingresso2" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalScrollableTitle">Selecionar quantidade/tipos de ingressos</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               

               <div class="produtos"></div>
               
               <ul class="nav m-auto">
                    <li class="nav-item">
                        <img title="mastercard" src="https://img.icons8.com/color/50/000000/mastercard.png">
                        <span></span>
                    </li>
                    <li class="nav-item">
                        <img title="visa" src="https://img.icons8.com/color/48/000000/visa.png">
                        <span></span>
                    </li>

                    <li class="nav-item">
                        <img title="amex" src="https://img.icons8.com/color/48/000000/amex.png">
                        <span></span>
                    </li>

                    <li class="nav-item">
                        <img title="boleto" src="https://img.icons8.com/color/48/000000/boleto-bankario.png">
                        <span></span>
                    </li>

                </ul>

            </div>
            <div class="modal-footer">

                <button type="button" data-toggle="modal" data-target="#modal-ingresso" data-dismiss="modal"
                    class="btn btn-danger">Voltar</button>
                <a href="<?php echo url('/checkout'); ?>" class="btn btn-success disabled" id="button-ingresso" role="button" disabled>Continue</a>
            </div>
        </div>
    </div>
</div>