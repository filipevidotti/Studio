var inputText = '';
var clicou = true;
var j = jQuery.noConflict();
j(document).ready(function() {
    j('#data_contador, #data_webinario, #data_video_1, #data_video_2, #data_video_3, #data_video_4').datetimepicker({
        lang: 'ptBR',
        i18n: {
            ptBR: {
                months: [
                    'Janeiro', 'Fevereiro', 'Março', 'Abril',
                    'Maio', 'Junho', 'Julho', 'Agosto',
                    'Setembro', 'Outubro', 'Novembro', 'Dezembro',
                ],
                dayOfWeek: [
                    "Seg", "Ter", "Qua", "Qui",
                    "Sex", "Sáb", "Dom",
                ]
            }
        },
        timepicker: true,
        format: 'd/m/Y H:i'
    });


    j("#page_template option:selected").each(function() {
        inputText = j(this).val();
    });
    if (! j("#exibir_campos").is(":checked")) {
        j("#rotulo_1").parent().parent().hide();
        j("#rotulo_2").parent().parent().hide();
        j("#rotulo_3").parent().parent().hide();
        
        j("#icon_rotulo_1").parent().parent().hide();
        j("#icon_rotulo_2").parent().parent().hide();
        j("#icon_rotulo_3").parent().parent().hide();
    }
    j("#exibir_campos").click(function() {
        if (j("#exibir_campos").is(":checked")) {
            j("#rotulo_1").parent().parent().show(500);
            j("#rotulo_2").parent().parent().show(500);
            j("#rotulo_3").parent().parent().show(500);
            
            j("#icon_rotulo_1").parent().parent().show(500);
        j("#icon_rotulo_2").parent().parent().show(500);
        j("#icon_rotulo_3").parent().parent().show(500);
        }
        else {
            j("#rotulo_1").parent().parent().hide(500);
            j("#rotulo_2").parent().parent().hide(500);
            j("#rotulo_3").parent().parent().hide(500);
            
            j("#icon_rotulo_1").parent().parent().hide();
        j("#icon_rotulo_2").parent().parent().hide();
        j("#icon_rotulo_3").parent().parent().hide();
        }
    });
    if (! j("#exibir_contador").is(":checked")) {
        j("#titulo_contador").parent().parent().hide();
        j("#data_contador").parent().parent().hide();
    }
    
    j("#exibir_contador").click(function() {
        if (j("#exibir_contador").is(":checked")) {
            j("#titulo_contador").parent().parent().show(500);
            j("#data_contador").parent().parent().show(500);
        }
        else {
            j("#titulo_contador").parent().parent().hide(500);
            j("#data_contador").parent().parent().hide(500);
        }
    });
    
    if (! j("#exit_popup").is(":checked")) {
        j("#texto_exit").parent().parent().hide();
        j("#url_exit").parent().parent().hide();
    }
    
    j("#exit_popup").click(function() {
        if (j("#exit_popup").is(":checked")) {
            j("#texto_exit").parent().parent().show(500);
            j("#url_exit").parent().parent().show(500);
        }
        else {
            j("#texto_exit").parent().parent().hide(500);
            j("#url_exit").parent().parent().hide(500);
        }
    });
    
    if (! j("#form_modal").is(":checked")) {
        j("#texto_modal").parent().parent().parent().parent().parent().hide();
        j("#botao_cta_modal").parent().parent().hide();
        
    }
    
    j("#form_modal").click(function() {
        if (j("#form_modal").is(":checked")) {
            j("#texto_modal").parent().parent().parent().parent().parent().show(500);
            j("#botao_cta_modal").parent().parent().show();
        }
        else {
            j("#texto_modal").parent().parent().parent().parent().parent().hide(500);
            j("#botao_cta_modal").parent().parent().hide(500);
        }
    });
    
    
});