
                <input type="text" id="senderHash" value="">
                <input type="text" id="band" name="band" value="">
                <input type="text" id="tokencard" name="tokencard" value="">

<div id="pagseguro" class="bkg-gray clearfix" style="display: block;">


            <h3>PagSeguro</h3>
            <hr>
         <form id="form_pagseguro" class="form2" name="form_pagseguro" method="post">
           
             <div class="card-wrapper2" style="float: left"></div>
                                


<div class="row">
  

    <div class="col-md-6">


            <div class="form-group">
            <label>Nome do Titular</label>
            <input name="name" type="text" class="form-control namecampo" 
            id="titular_pagseguro" required>
            </div>

            </div>

    <div class="col-md-6">


            <div class="form-group">
            <label>Número do Cartão<small class="bandeira_text"></small></label>
            <input id="cc-number" name="number" type="tel" 
            class="input-lg form-control pagseguro_cc_card_num numero_cartao_pagseguro" 
            placeholder="•••• •••• •••• ••••" required>

            </div>

    </div>

</div>


                                 
   <div class="row">
  

    <div class="col-md-6">

            <div class="form-group">
            <label>Data Vencimento <small class="bandeira_text"></small></label>

            <input placeholder="MM/YYYY" class="input-lg form-control validade_pagseguro" type="tel" id="validade_pagseguro" name="expiry">

            <!--  <input name="cartao_codigo_cielo" type="text" class="input-lgform-control cc-cvc" id="cartao_codigo_cielo" type="tel" autocomplete="cc-cvc" required>-->
            </div>

     </div>

    <div class="col-md-6">


        <div class="form-group">
            <label>Código CVC <small class="bandeira_text"></small></label>
        <input name="cvc" type="text" class="input-lg form-control cc-cvc" id="cod_cartao_pagseguro" type="tel" autocomplete="cc-cvc" required>
        </div>

    </div>

</div>



   <div class="row">
  

    <div class="col-md-6">

        <label>Parcelas</label>
        <div class="select-helper">
        <select name="pagseguroParcelas" id="pagseguroParcelas"  class="form-control" style="min-width:80px;margin-left:0px;">
            <option value='1'>1</option>
        </select>
        </div>
     </div>

    <div class="col-md-6">


    

    </div>

</div>
        </div>

  </form>


 </div><?php /**PATH C:\xampp\htdocs\new-project-021\resources\views/site/pagseguro.blade.php ENDPATH**/ ?>