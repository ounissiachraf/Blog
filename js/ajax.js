'use strict'

function affiche(data){
    let success=JSON.parse(data);
   console.log(success);
   return
}


function confirmation(){
    
    let Vid=$("[name='id']").val();
    $.post("delete.php",{id:Vid},affiche);
}


$(function(){

    $("#confirm").on('click',confirmation);
});