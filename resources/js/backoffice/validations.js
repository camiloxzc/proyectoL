function soloNumeros(objeto) {
    objeto.value = objeto.value.replace(/[^\d,]/g, '');
}

function soloLetras(objeto) {
    objeto.value = objeto.value.replace(/[^\a-zA-Z,]/g, '');
}