/*
*
* AÇÕES EM EVENTOS DE ELEMENTOS HTML
*
*/

$(document).ready(function() {

	// Ativo relógio no carregamento da página
	iniciar_relogio(InicioSessaoSubProntuarioHora, InicioSessaoSubProntuarioMinuto, InicioSessaoSubProntuarioSegundo);



    /************************************
     #
     # Aplicando efeitos na navegação mobile do prontuário (MOBILE-FIRST MORPHING HAMBURGER MENU)
     # 
    *************************************/ 
    class Menu {
        constructor(settings) {
            this.nodeMenu = settings.nodeMenu;
            settings.nodeMenuButton.addEventListener('click', this.toggle.bind(this));
        }

        toggle() {
            return this.nodeMenu.classList.toggle('js-menu_activated');
        }
    }

    let nodeMenu = document.querySelector('body');

    new Menu({
        nodeMenu: nodeMenu,
        nodeMenuButton: nodeMenu.querySelector('.js-menu__toggle')
    });




    /************************************
     #
     # Aplicando função ao evento click do botão #btn_finalizar_atendimento
     # 
    *************************************/ 
    $(document).on('click', '#btn_finalizar_atendimento', function(event) {

        // Redirecionamento
        window.location.replace(UrlConfirmarFinalizacao);

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });


}); // Fecha $(document).ready