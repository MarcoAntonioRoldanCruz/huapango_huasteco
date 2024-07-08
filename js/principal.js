/**Cuando el documento principal ha cargado y está en modo listening
 * Funciones que realiza cuando index y principal estén cargados completamente
 */
$(function() {

});

/**
 * Modifica el nivel de progreso de la barra de progreso.
 * @param {*} porcentaje Etiqueta y valor de progreso de la barra de progreso
 */
function progresar(porcentaje) {
    $('#progresando').attr('style', 'width:' + porcentaje + '%');
    $('#progresando').text("" + porcentaje + "%");
}