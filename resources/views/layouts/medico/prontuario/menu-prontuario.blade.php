<!-- INICIO DIV#MENU_PRONTUARIO -->
<div class="menu_prontuario">

    <!--<div class="item_menu_prontuario">
        <a class="link_menu_prontuario" href="<?php //echo url('medico/painel/prontuarios/resumo/' . $codigo_subprontuario_crypt); ?>">
            <i class="fas fa-fw fa-address-book"></i> Prontuário
        </a>
    </div>-->

    <div class="item_menu_prontuario">
        <a class="link_menu_prontuario" href="<?php echo url('medico/painel/prontuarios/ultimas-consultas/' . $codigo_subprontuario_crypt); ?>">
            <i class="fas fa-history"></i> Últimas Consultas
        </a>
    </div>

    <div class="item_menu_prontuario active">
        <a class="link_menu_prontuario" href="<?php echo url('medico/painel/prontuarios/queixa/' . $codigo_subprontuario_crypt); ?>">
            <i class="fas fa-fw fa-comment-medical"></i> Queixa
        </a>
    </div>

    <div class="item_menu_prontuario">
        <a class="link_menu_prontuario" href="<?php echo url('medico/painel/prontuarios/medicamentos-em-uso/' . $codigo_subprontuario_crypt); ?>">
            <i class="fas fa-fw fa-prescription-bottle-alt"></i> Medicamentos em Uso
        </a>
    </div>

    <div class="item_menu_prontuario">
        <a class="link_menu_prontuario" href="<?php echo url('medico/painel/prontuarios/antecedentes/' . $codigo_subprontuario_crypt); ?>">
            <i class="fas fa-fw fa-clock"></i> Antecedentes
        </a>
    </div>

    <div class="item_menu_prontuario">
        <a class="link_menu_prontuario" href="<?php echo url('medico/painel/prontuarios/vacinas/' . $codigo_subprontuario_crypt); ?>">
            <i class="fas fa-syringe"></i> Vacinas
        </a>
    </div>

    <div class="item_menu_prontuario">
        <a class="link_menu_prontuario" href="<?php echo url('medico/painel/prontuarios/exame-fisico/' . $codigo_subprontuario_crypt); ?>">
            <i class="fas fa-fw fa-stethoscope"></i> Exame Físico
        </a>
    </div>

    <div class="item_menu_prontuario">
        <a class="link_menu_prontuario" href="<?php echo url('medico/painel/prontuarios/anamneses/' . $codigo_subprontuario_crypt); ?>">
            <i class="fas fa-fw fa-laptop-medical"></i> Anamneses
        </a>
    </div>

    <div class="item_menu_prontuario">
        <a class="link_menu_prontuario" href="<?php echo url('medico/painel/prontuarios/diagnostico/' . $codigo_subprontuario_crypt); ?>">
            <i class="fas fa-fw fa-diagnoses"></i> Diagnóstico
        </a>
    </div>

    <div class="item_menu_prontuario">
        <a class="link_menu_prontuario" href="<?php echo url('medico/painel/prontuarios/condutas/' . $codigo_subprontuario_crypt); ?>">
            <i class="fas fa-notes-medical"></i> Conduta
        </a>
    </div>

</div>
<!-- FIM DIV#MENU_PRONTUARIO -->