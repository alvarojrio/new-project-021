/*
*
* FUNÇÕES CUSTOMIZADAS 
*
*/

// ::: Função para preencher campos de endereço da área do titular e do responsável financeiro :::
function preencheEndereco(conteudo, elemento) {

	if (!("erro" in conteudo)) {

		// Variaveis básicas
    	var cod_estado = "";
    	var cod_cidade = "";

        // Localiza combobox com classe .estado relacionada aos campos de endereço atualmente em edição
        var combo_estado = $(elemento).closest('.panel-body').find('.estado');

		// Preencho os campos
        $(elemento).closest('.panel-body').find('.logradouro').val(conteudo.logradouro);
        $(elemento).closest('.panel-body').find('.bairro').val(conteudo.bairro);

        // Busca dados no banco de acordo com a UF / ESTADO retornada pelo VIACEP
        $.ajax({
         	url: UrlBuscarEstadoPorUf,
         	data: { 'uf': conteudo.uf },
         	type: 'POST',
         	dataType: 'json',
            beforeSend: function() { 

                // Resetando todos os possiveis Toast
                $.toast().reset('all');

                // Mostra mensagem 'processando...'
                toast_processando = $.toast({
                    text: 'Processando...',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    hideAfter: false,
                    allowToastClose: false
                });

            },
            complete: function(response) {
                // Oculta mensagem 'processando...'
                toast_processando.reset();
            },
         	success: function(result) {

            	// Checo informações retornadas
            	if (result == 'uf-vazia') {

            		//console.log('A UF passada estava vazia');

            	} else if (result == 'nada-encontrado') {

            		//console.log('Nenhum estado encontrado');

            	} else {

                	// Guardo código do estado
			        cod_estado = result.cod_estado;

			        // Marca estado correto no combobox
                    $(elemento).closest('.panel-body').find('.estado option[value="' + cod_estado + '"]').prop('selected', true);

			        // Busca dados no banco de acordo com a LOCALIDADE / CIDADE retornada pelo VIACEP
			        $.ajax({
			         	url: UrlBuscarCidadePorNomeEstado,
			         	data: { 'cod_estado': cod_estado, 'localidade': conteudo.localidade },
			         	type: 'POST',
			         	dataType: 'json',
			         	success: function(result) {

			            	// Checo informações retornadas
            				if (result == 'localidade-vazia') {

            					//console.log('A localidade passada estava vazia');

            				} else if (result == 'cod-estado-vazio') {

            					//console.log('O código do estado passado estava vazio');

            				} else if (result == 'nada-encontrado') {

            					//console.log('Nenhuma cidade encontrada');

            				} else {

            					// Guardo código da cidade
			        			cod_cidade = result.cod_cidade;

			                	// Atualiza combo de cidade de acordo com o estado
			                	atualizaComboCidade(combo_estado, cod_estado, cod_cidade);

					    	}

			          	},
			          	error: function (xhr, ajaxOptions, thrownError) {
					        //console.log(xhr.responseText);
					    }
			        });

		    	}

          	},
          	error: function (xhr, ajaxOptions, thrownError) {
		        //console.log(xhr.responseText);
		    }
        });

	} else {

    	//console.log('CEP não localizado.');

    }

}

// ::: Função para puxar dados de endereço através do CEP :::
function puxaEndereco(elemento) {

	// Variaveis básicas
	var cep = "";

    // Recebo CEP
    var cep = $(elemento).val();
    var cep = cep.replace(/\D/g, ''); // Garante que tenha apenas digitos

    // Checo se existe algo na variavel CEP
    if (cep != "") {

    	// Crio o padrão a ser procurado com auxilio do regex
        var cepvalido = /^[0-9]{8}$/;

        // Valida o CEP informado com o comando test(), que procura por um valor dentro de outro valor (padrão)
        if (cepvalido.test(cep)) {

        	// Verifica se o browser possui suporte ao XDomainRequest (Para IE 9)
        	if ('XDomainRequest' in window && window.XDomainRequest !== null) {

			    // Faço requisição de dados JSON utilizando o Microsoft XDR
			    var xdr = new XDomainRequest();
			    xdr.open("post", "//viacep.com.br/ws/" + cep + "/json/");
			    xdr.onload = function () {			    	
				    var JSON = $.parseJSON(xdr.responseText);
				    if (JSON == null || typeof (JSON) == 'undefined') {
				        JSON = $.parseJSON(dados.firstChild.textContent);
				    }
				    preencheEndereco(JSON, elemento);
			    };
			    xdr.send();

			} else {

	        	// Faz requisição de dados JSON através de AJAX
	        	$.getJSON("//viacep.com.br/ws/" + cep + "/json/", function(dados) {

                    // Chamo função para preencher campos do formulario
                    preencheEndereco(dados, elemento);

	        	}); // Fecha $.getJSON

        	}

        } else {

        	//console.log('Formato de CEP inválido.');

        }

    } else {

    	//console.log('CEP vazio.');

    }

}