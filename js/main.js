$(document).ready(function(){
    $("#fotoInp").change(function() {
        if (window.FormData === undefined) {
            alert('В вашем браузере загрузка файлов не поддерживается');
        }
    });

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

    $("#fotoInp").on("click", function(e){
    });

});
// $(document).domContentLoadedEventStart(function() {
//     console.log("DOMContentLoaded");
// })
document.addEventListener("DOMContentLoaded", readyy);

function readyy(event) {
    let fileName = document.querySelector('#fotoInp').defaultValue
    let file = new File([fileName], fileName,{lastModified:new Date().getTime()}, 'utf-8');
    let container = new DataTransfer();
    container.items.add(file);
    document.querySelector('#fotoInp').files = container.files;
}

function loadURLToInputFiled(url){
    getImgURL(url, (imgBlob)=>{
        // Load img blob to input
        // WIP: UTF8 character error
        let fileName = 'hasFilename.jpg'
        let file = new File([imgBlob], fileName,{type:"image/jpeg", lastModified:new Date().getTime()}, 'utf-8');
        let container = new DataTransfer();
        container.items.add(file);
        document.querySelector('#foto').files = container.files;

    })
}

// xmlHTTP return blob respond
function getImgURL(url, callback){
    console.log("xml");
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        callback(xhr.response);
    };
    xhr.open('GET', url);
    xhr.responseType = 'blob';
    xhr.send();
}