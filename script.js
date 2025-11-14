ListarProductos();
function ListarProductos(busqueda) {
    const init = { method: "POST" };
    if (typeof busqueda !== 'undefined' && busqueda !== null) init.body = busqueda;
    fetch("listar.php", init)
        .then(response => response.text())
        .then(response => {
            resultado.innerHTML = response;
        })
}
// función para registrar
registrar.addEventListener("click", () => {
    fetch("registrar.php", {
        method: "POST",
        body: new FormData(frm)
    }).then(response => response.text()).then(response => {
        // Uso del switch
        let title = '';
        switch (response) {
            case 'ok':
                title = 'Registrado';
                break;
            case 'modificado':
                title = 'Modificado';
                break;
            default:
                title = response;
        }
        Swal.fire({
            icon: 'success',
            title: title,
            showConfirmButton: false,
            timer: 1500
        })
        registrar.value = "Registrar";
        idp.value = "";
        ListarProductos();
        frm.reset();
    })
});
// función para editar
function Editar(id) {
    fetch("editar.php", {
        method: "POST",
        body: id
    }).then(response => response.json()).then(response => {
        idp.value = response.id;
        codigo.value = response.codigo;
        producto.value = response.producto;
        precio.value = response.precio;
        cantidad.value = response.cantidad;
        registrar.value = "Actualizar"
    })
}
// función para buscar
buscar.addEventListener("keyup", () => {
    const valor = buscar.value.trim();
    ListarProductos(valor === "" ? undefined : valor);
});
