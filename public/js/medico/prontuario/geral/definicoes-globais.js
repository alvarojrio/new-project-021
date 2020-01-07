/*
*
* DEFINICOES GLOBAIS
*
*/

// Desativa cache do ajax
$.ajaxSetup ({cache: false});

// Crio variavel para guardar o COUNTIMER do tempo da consulta
var atendimento_clock = $('.well-horas').countimer({
	enableEvents: true,
	displayMillis: false,
	destroyDOMElement: false,
	autoStart: false,
	separator: ':',
	leadingZeros: 2,
	useHours: true,
	// Horario Inicial
	/*initHours: 0,
	initMinutes: 0,
	initSeconds: 0*/
});
