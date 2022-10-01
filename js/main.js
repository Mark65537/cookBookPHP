$(document).ready(function(){
    $("#ingrAdd").on("click", function(){//кнопка для добавления ингредиентов
        ingr=$('#ingrSel option:selected').html();
        num=$('#num').val();
        measure=$('#measureLab').html();
        $("#ingrDiv").html($("#ingrDiv").html()+"<span><span id='ingrSpan' style='background:#966636'>"+ingr+" "+num+" "+measure+"</span>" +
                                                "<button id='but_X' type='button'>X</button>&nbsp;</span>");
    });

    $("#ingrSel").on("change", function(e){// для того что бы отображалась правельная мера
        $("#measureLab").html($(this).val());
    });

    $("#ingrDiv").on("click", function(e){// кнопка для удаления отдельного элемента
        if(e.target.id=="but_X")
            e.target.parentElement.remove();
    });

    $("#formRecipe").on("submit", function(e){//обработка функции для упаковки всех ингредиентов в один input
        //
        // $("#ingrSpan").each(function() {
        //         console.log($(this).text());
        // });
        $("#ingrDiv").children().each(function() {
            if($(this)[0].localName=="span"){
                $("#ingrInp").val($("#ingrInp").val()+$(this)[0].firstChild.innerText+"; ");
            }
        });
    });
});