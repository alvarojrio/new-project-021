/*
*
* FUNÇÕES CUSTOMIZADAS
* Funções de carregamento e manipulação de dados e elementos
*
*/

/************************************
 #
 # Acessa variavel do relogio de atendimento e inicia a contagem de tempo
 # 
*************************************/ 
function iniciar_relogio(hora, minuto, segundo) {

	// Defino valores padrão para o caso dos parametros estarem vazios
	if (hora == '') { hora = 0; }
	if (minuto == '') { minuto = 0; }
	if (segundo == '') { segundo = 0; }

	// Inicio a contagem de tempo, passando o horario de inicio da contagem
	atendimento_clock.countimer({ autoStart: true, initHours: hora, initMinutes: minuto, initSeconds: segundo });

}



/************************************
 #
 # Acessa variavel do relogio de atendimento e finaliza a contagem de tempo
 # 
*************************************/ 
function parar_relogio() {

	// Encerra a contagem de tempo
	atendimento_clock.countimer('stop');

}



/************************************
 #
 # Acessa variavel do relogio de atendimento e descobre o tempo atual dele
 # 
*************************************/ 
function tempo_atual_relogio() {

	// Retorna a contagem de tempo
	return atendimento_clock.countimer('current');

}