<?php
$data = file_get_contents("php://input");
require "conexion.php";
$consulta = $pdo->prepare("SELECT * FROM productos ORDER BY id DESC");
$consulta->execute();
if ($data != "") {
    $consulta = $pdo->prepare("SELECT * FROM productos WHERE id LIKE '%".$data."%' OR producto LIKE '%".$data."%' OR precio LIKE '%".$data."%'");
    $consulta->execute();
}
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
foreach ($resultado as $data) {
    echo "<tr>
            <td data-label='ID'>" . $data['id'] . "</td>
            <td data-label='Código'>" . $data['codigo'] . "</td>
            <td data-label='Descripción'>" . $data['producto'] . "</td>
            <td data-label='Precio'>" . $data['precio'] . "</td>
            <td data-label='Cantidad'>" . $data['cantidad'] . "</td>
            <td data-label='Acciones'>
                <button type='button' class='btn btn-success' onclick=Editar('" . $data['id'] . "')>Editar</button>
            </td>        
        </tr>";
}
