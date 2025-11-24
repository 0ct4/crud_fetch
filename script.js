ListarProductos();

function ListarProductos(busqueda) {
    const init = { method: "POST" };
    if (typeof busqueda !== 'undefined' && busqueda !== null) init.body = busqueda;
    fetch("controlador.php", {
        method: "POST",
        body: new FormData(new FormData(document.createElement('form')).append('accion', 'listar')) || 'accion=listar'
    }).then(response => response.text())
        .then(response => resultado.innerHTML = response);
}

// Registrar nuevo o editar existente
registrar.addEventListener("click", () => {
    const formData = new FormData(frm);
    formData.append('accion', idp.value ? 'editar' : 'registrar');
    
    fetch("controlador.php", {
        method: "POST",
        body: formData
    }).then(response => response.json())
        .then(response => {
            Swal.fire({
                icon: 'success',
                title: response.mensaje,
                showConfirmButton: false,
                timer: 1500
            });
            registrar.value = "Registrar";
            idp.value = "";
            ListarProductos();
            frm.reset();
        });
});

// Editar producto
function Editar(id) {
    const formData = new FormData();
    formData.append('accion', 'obtener');
    formData.append('id', id);
    
    fetch("controlador.php", {
        method: "POST",
        body: formData
    }).then(response => response.json())
        .then(response => {
            idp.value = response.id;
            codigo.value = response.codigo;
            producto.value = response.producto;
            precio.value = response.precio;
            cantidad.value = response.cantidad;
            registrar.value = "Actualizar";
        });
}

// Buscar productos
buscar.addEventListener("keyup", () => {
    const valor = buscar.value.trim();
    ListarProductos(valor === "" ? undefined : valor);
});
