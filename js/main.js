$(document).ready(function(){
    $("#ingrAdd").on("click", function(){
        ingr=$('#select option:selected').html();
        measure=$('#measure').html();
        num=$('#num').val();
        $("#ingrDiv").html($("#ingrDiv").html()+"<span style='background:#966636'><span>"+ingr+" "+num+" "+measure+"</span>" +
                                                "<button type='button'>X</button></span>&nbsp;");
    });
});