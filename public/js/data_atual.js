/*
 Data Atual
 
 
 
 @see // http://codare.aurelio.net/2009/04/03/javascript-obter-e-mostrar-data-e-hora/
*/


/*
 * // Obtém a data/hora atual
    var data = new Date();

    // Guarda cada pedaço em uma variável
    var dia     = data.getDate();           // 1-31
    var dia_sem = data.getDay();            // 0-6 (zero=domingo)
    var mes     = data.getMonth();          // 0-11 (zero=janeiro)
    var ano2    = data.getYear();           // 2 dígitos
    var ano4    = data.getFullYear();       // 4 dígitos
    var hora    = data.getHours();          // 0-23
    var min     = data.getMinutes();        // 0-59
    var seg     = data.getSeconds();        // 0-59
    var mseg    = data.getMilliseconds();   // 0-999
    var tz      = data.getTimezoneOffset(); // em minutos

    // Formata a data e a hora (note o mês + 1)
    var str_data = dia + '/' + (mes+1) + '/' + ano4;
    var str_hora = hora + ':' + min + ':' + seg;

    // Mostra o resultado
    alert('Hoje é ' + str_data + ' às ' + str_hora);
 *   
 * 
 * 
 */

function data_atual_br() {
 
    
    // Obtém a data/hora atual
    var data = new Date();

    // Guarda cada pedaço em uma variável
    var dia_hj     = data.getDate();           // 1-31
    var mes_hj     = data.getMonth();          // 0-11 (zero=janeiro)
    var ano_hj     = data.getFullYear();       // 4 dígitos

    // Formata a data e a hora (note o mês + 1)
    var data_hj = dia_hj + '/' + (mes_hj+1) + '/' + ano_hj;
 
   return data_hj;
    
} // retorna a data atual formato BR

function data_atual_us() {
 
    
    // Obtém a data/hora atual
    var data = new Date();

    // Guarda cada pedaço em uma variável
    var dia_hj    = data.getDate();           // 1-31
    var mes_hj    = data.getMonth();          // 0-11 (zero=janeiro)
    var ano_hj    = data.getFullYear();       // 4 dígitos

    // Formata a data e a hora (note o mês + 1)
    var data_hj = ano_hj + '-' + (mes_hj+1) + '-' + dia_hj;
 
   return data_hj;
    
} // retorna a data atual formato USA
 
