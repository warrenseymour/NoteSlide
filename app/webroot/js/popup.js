var popupStatus = 0;

$(function() {
var loadPopup = function loadPopup(){

if(popupStatus==0){
$("#overlay").css({
"opacity": "0.7"
});
$("#overlay").fadeIn("slow");
$("#loginbox").fadeIn("slow");
popupStatus = 1;
}
}


function disablePopup(){

if(popupStatus==1){
$("#overlay").fadeOut("slow");
$("#loginbox").fadeOut("slow");
popupStatus = 0;
}
}



function centerPopup(){

var windowWidth = document.documentElement.clientWidth;
var windowHeight = document.documentElement.clientHeight;
var popupHeight = $("#loginbox").height();
var popupWidth = $("#loginbox").width();

$("#loginbox").css({
"position": "absolute",
"top": windowHeight/2-popupHeight/2,
"left": windowWidth/2-popupWidth/2
});


$("#overlay").css({
"height": windowHeight
});

}


$(document).ready(function(){

});


$("#loginlink").click(function(){

centerPopup();

loadPopup();
});


$("#loginboxClose").click(function(){
disablePopup();
});

$("#overlay").click(function(){
disablePopup();
});



})

