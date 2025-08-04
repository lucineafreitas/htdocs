$(document).ready(function () {
    $('.date').mask('00/00/0000');
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('.cep').mask('00000-000');
    $('.celular').mask('(00) 00000-0000');
    $('.phone_with_ddd').mask('(00) 0000-0000');
    $('.phone_us').mask('(000) 000-0000');
    $('.mixed').mask('AAA 000-S0S');
    $('.cpf').mask('000.000.000-00', { reverse: true });
    $('.cnpj').mask('00.000.000/0000-00', { reverse: true });
    $('.money').mask('000.000.000.000.000,00', { reverse: true });
    $('.money2').mask("#.##0,00", { reverse: true });
    $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
            'Z': {
                pattern: /[0-9]/, optional: true
            }
        }
    });
    $('.ip_address').mask('099.099.099.099');
    $('.percent').mask('##0,00%', { reverse: true });
    $('.clear-if-not-match').mask("00/00/0000", { clearIfNotMatch: true });
    $('.placeholder').mask("00/00/0000", { placeholder: "__/__/____" });
    $('.fallback').mask("00r00r0000", {
        translation: {
            'r': {
                pattern: /[\/]/,
                fallback: '/'
            },
            placeholder: "__/__/____"
        }
    });
    $('.selectonfocus').mask("00/00/0000", { selectOnFocus: true });
});

let table = new DataTable('#tabela', {
    // options
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.3.2/i18n/pt-BR.json',
    },
});

// function visualizar(){
//     var senha = $('senha');
//     var icone = $('#olho');

//     if(senha.attr('type') === 'password'){
//         senha.attr('type, text');
//         icone.removeClass('fa-eye'),addclass('fa-eye-slash');  
//     }else{
//         senha.attr('type', 'password');
//         icone.removeClass('fa-eye-slash').addClass('fa-eye');

//     }
// }

document.getElementById("toggleSenha").addEventListener("click", function () {
    const senha = document.getElementById("senha");
    const icone = document.getElementById("iconeOlho");

    if (senha.type === "password") {
        senha.type = "text";
        icone.classList.remove("fa-eye");
        icone.classList.add("fa-eye-slash");
    } else {
        senha.type = "password";
        icone.classList.remove("fa-eye-slash");
        icone.classList.add("fa-eye");
    }
});
