function onlyNumbers(objeto) {
    objeto.value = objeto.value.replace(/[^\d,]/g, '');
}

function onlyLetters(objeto) {
    objeto.value = objeto.value.replace(/[^\a-zA-Z,]/g, '');
}


$(document).ready(function () {
    let arrayIdProductos = [];
    let arrayCantidad = [];

    $('#agregarProducto').click(function () {
		let idservicioproducto = parseInt($('#idservicioproducto option:selected').val());
		let nombre = $('#idservicioproducto option:selected').text()
        let precio = $('#precio').val();
		let cantidad =parseInt($('#cantidad').val());
		let iva =parseFloat($('#iva').val());
		let subtotal = $('#subtotal').val()
		let preciototal =$('#preciototal').val();
        //alert(precio);
        if (arrayIdProductos.includes(idservicioproducto)) {
            $('#tr-' + idservicioproducto).remove();
            let indice = arrayIdProductos.indexOf(idservicioproducto);
            cantidad += arrayCantidad[indice];
            arrayCantidad.splice(1, indice);
            arrayIdProductos.splice(1, indice);
            arrayIdProductos.push(idservicioproducto);
			arrayCantidad.push(cantidad);

        } else {
            arrayIdProductos.push(idservicioproducto);
            arrayCantidad.push(cantidad);
        }
        $('#cajaDetalle').append(`
		<tr id="tr-${idservicioproducto}">
		<input type="hidden" name="idservicioproducto[]" value="${idservicioproducto}">
        <input type="hidden" name="cantidad[]" value="${cantidad}">
		<td>${nombre}</td>
		<td>${precio}</td>
		<td>${cantidad}</td>
		<td>${iva}</td>
		<td>${subtotal}</td>
		<td>${preciototal}</td>
	<td>
	<button type="button" class="btn btn-danger" onclick="eliminarProducto(${idservicioproducto}
		)">x</button>
	</td>
	</tr>
	`);


    });
});

function eliminarProducto(idservicioproducto) {
    $('#tr-' + idservicioproducto).remove();
    let indice = arrayIdProductos.indexOf(idservicioproducto);
    arrayCantidad.splice(1, indice);
    arrayIdProductos.splice(1, indice);
}
