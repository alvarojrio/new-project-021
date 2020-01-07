$(document).ready(function () {

    var cellMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
        cellOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(cellMaskBehavior.apply({}, arguments), options);
            }
        };

    $('.celular').mask(cellMaskBehavior, cellOptions);
    $('.mask-phone').mask('(00) 0000-0000');
    $(".moeda").mask('R$ 000.000.000.000.000,00', { reverse: true, placeholder: "R$ 0,00" });
    $(".percent").mask('##0,00%', { reverse: true });
    $(".data").mask('00/00/0000');
    $(".cnpj").mask('00.000.000/0000-00', {
        reverse: true
    });

    $(".cpf").mask('000.000.000-00', {
        reverse: true
    });
    // SEARCH ZIPCODE
    $(".cep").blur(function () {

        function emptyForm() {
            $(".logradouro").val("");
            $(".bairro").val("");
            $(".cidade").val("");
            $(".estado").val("");
        }

        var cep = $(this).val().replace(/\D/g, '');
        var validate_zip_code = /^[0-9]{8}$/;

        if (cep != "" && validate_zip_code.test(cep)) {

            $(".logradouro").val("");
            $(".bairro").val("");
            $(".cidade").val("");
            $(".estado").val("");

            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (data) {

                if (!("erro" in data)) {
                    $(".logradouro").val(data.logradouro);
                    $(".bairro").val(data.bairro);
                    $(".cidade").val(data.localidade);
                    $(".estado").val(data.uf);
                } else {
                    emptyForm();
                    alert("CEP não encontrado.");
                }
            });
        } else {
            emptyForm();
            alert("Formato de CEP inválido.");
        }
    });
});