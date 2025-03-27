
function generarOpcionesProductos(selectElement) {
    selectElement.innerHTML = '<option value="0">Seleccione el producto</option>';

    productos.forEach(producto => {
        const option = document.createElement('option');
        option.value = producto.id;
        option.textContent = producto.nombre;
        option.setAttribute('data-max', producto.cantidad); 
        selectElement.appendChild(option);
    });
}

function actualizarMaxCantidad(selectElement, inputCantidad) {
    const selectedOption = selectElement.options[selectElement.selectedIndex];
    const maxCantidad = selectedOption.getAttribute('data-max'); 
    inputCantidad.max = maxCantidad; 
}

function agregarProducto() {
    const productosContainer = document.getElementById('productosContainer');

    const newRow = document.createElement('div');
    newRow.classList.add('row', 'g-3', 'mt-3');

    const selectProductHTML = `
        <div class="col-md-8 select-product">
            <label for="productos" class="form-label">Producto a comprar</label>
            <select name="productos[]" class="form-select" required></select>
        </div>
    `;

    const inputCantidadHTML = `
        <div class="col-md-4 cantidad-product">
            <label for="cantidad" class="form-label">Cantidad del Producto</label>
            <input type="number" class="form-control cantidad" name="cantidad[]" value="1" min="1" required>
        </div>
    `;

    newRow.innerHTML = selectProductHTML + inputCantidadHTML;

    productosContainer.insertBefore(newRow, productosContainer.querySelector('.col-12'));

    const nuevoSelectProducto = newRow.querySelector('select');
    const nuevoInputCantidad = newRow.querySelector('input[type="number"]');

    generarOpcionesProductos(nuevoSelectProducto);

    nuevoSelectProducto.addEventListener('change', function() {
        actualizarMaxCantidad(nuevoSelectProducto, nuevoInputCantidad);
    });
}

document.getElementById('btnAgregarProducto').addEventListener('click', agregarProducto);

document.addEventListener('DOMContentLoaded', function() {
    const primerSelectProducto = document.querySelector('#productosContainer select');
    const primerInputCantidad = document.querySelector('#productosContainer input[type="number"]');

    generarOpcionesProductos(primerSelectProducto);

    primerSelectProducto.addEventListener('change', function() {
        actualizarMaxCantidad(primerSelectProducto, primerInputCantidad);
    });
});
