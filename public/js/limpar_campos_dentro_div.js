/*
*
* FUNÇÕES CUSTOMIZADAS 
*
*/

// ::: Função para limpar campos de formulário que estejam dentro de uma determinada DIV, referenciada através de um nome de classe :::
// Inspiração: https://stackoverflow.com/questions/10543104/how-to-clear-all-input-fields-in-a-specific-div-with-jquery/10892768#10892768
function limpar_campos_dentro_div(elemento) {

	$(elemento).find(':input').each(function() {

		switch (this.type) {
			case 'password':
			case 'text':
			case 'textarea':
			case 'file':
			case 'select-one':
			//case 'select-multiple':
			case 'date':
			case 'number':
			case 'tel':
			case 'email':
				$(this).val('');
			break;
			case 'checkbox':
			case 'radio':
				this.checked = false;
			break;
			case 'select-multiple':
				$(this)[0].selectedIndex = -1;
			break;
		}

	});

	return true;

}
