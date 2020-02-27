window.onload = function () {

    'use strict'

    $("#select-ingresso-duplo").change(function () {

        let qtdIngressoTriplo = Number($("#select-ingresso-triplo").val());
        let qtdIngressoPista = Number($("#select-ingresso-pista").val());
        
        if (Number(this.value) !== 0 && $("#button-ingresso").hasClass("disabled")) {

            $("#button-ingresso").removeClass("disabled");
        }
        else if (Number(this.value) == 0 && qtdIngressoTriplo == 0 && qtdIngressoPista == 0) {

            $("#button-ingresso").addClass("disabled");
        }

    });


    $("#select-ingresso-triplo").change(function () {

        let qtdIngressoDuplo = Number($("#select-ingresso-duplo").val());
        let qtdIngressoPista = Number($("#select-ingresso-pista").val());
        
        if (Number(this.value) !== 0 && $("#button-ingresso").hasClass("disabled")) {

            $("#button-ingresso").removeClass("disabled");
        }
        else if (Number(this.value) == 0 && qtdIngressoDuplo == 0 && qtdIngressoPista == 0) {

            $("#button-ingresso").addClass("disabled");
        }

    });


    $("#select-ingresso-pista").change(function () {

        let qtdIngressoDuplo = Number($("#select-ingresso-duplo").val());
        let qtdIngressoTriplo = Number($("#select-ingresso-triplo").val());
        
        if (Number(this.value) !== 0 && $("#button-ingresso").hasClass("disabled")) {

            $("#button-ingresso").removeClass("disabled");
        }
        else if (Number(this.value) == 0 && qtdIngressoDuplo == 0 && qtdIngressoTriplo == 0) {

            $("#button-ingresso").addClass("disabled");
        }

    });

}