'use strict'
$(document).ready(function () {

    var months = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

    var WeekDays = new Array("Doming", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");

    var f = new Date();

    var strDate = WeekDays[f.getDay()] + " , " + f.getDate() + " " + months[f.getMonth()] + ", " + f.getFullYear();

    $(function () {
        $('footer').append("  " + '<h3>' + strDate + '</h3>');
    });

});
