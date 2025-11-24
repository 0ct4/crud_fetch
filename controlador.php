<?php
require "conexion.php";

$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

switch ($accion) {
    case 'registrar':
        $codigo = $_POST['codigo'] ?? '';
        $producto = $_POST['producto'] ?? '';
        $precio = $_POST['precio'] ?? '';
        $cantidad = $_POST['cantidad'] ?? '';
        
        $query = $pdo->prepare("INSERT INTO productos (codigo, producto, precio, cantidad) VALUES (:cod, :pro, :pre, :cant)");
        $query->bindParam(":cod", $codigo);
        $query->bindParam(":pro", $producto);
        $query->bindParam(":pre", $precio);
        $query->bindParam(":cant", $cantidad);
        
        if ($query->execute()) {
            echo json_encode(['status' => 'ok', 'mensaje' => 'Producto registrado']);
        }
        break;
        
    case 'editar':
        $id = $_POST['idp'] ?? '';
        $codigo = $_POST['codigo'] ?? '';
        $producto = $_POST['producto'] ?? '';
        $precio = $_POST['precio'] ?? '';
        $cantidad = $_POST['cantidad'] ?? '';
        
        $query = $pdo->prepare("UPDATE productos SET codigo = :cod, producto = :pro, precio = :pre, cantidad = :cant WHERE id = :id");
        $query->bindParam(":cod", $codigo);
        $query->bindParam(":pro", $producto);
        $query->bindParam(":pre", $precio);
        $query->bindParam(":cant", $cantidad);
        $query->bindParam(":id", $id);
        
        if ($query->execute()) {
            echo json_encode(['status' => 'modificado', 'mensaje' => 'Producto actualizado']);
        }
        break;
        
    case 'listar':
        $data = file_get_contents("php://input");
        
        if ($data != "") {
            $query = $pdo->prepare("SELECT * FROM productos WHERE id LIKE ? OR codigo LIKE ? OR producto LIKE ? OR precio LIKE ? ORDER BY id DESC");
            $query->execute(["%$data%", "%$data%", "%$data%", "%$data%"]);
        } else {
            $query = $pdo->prepare("SELECT * FROM productos ORDER BY id DESC");
            $query->execute();
        }
        
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($resultado as $row) {
            echo "<tr>
                    <td data-label='ID'>" . htmlspecialchars($row['id']) . "</td>
                    <td data-label='Código'>" . htmlspecialchars($row['codigo']) . "</td>
                    <td data-label='Descripción'>" . htmlspecialchars($row['producto']) . "</td>
                    <td data-label='Precio'>" . htmlspecialchars($row['precio']) . "</td>
                    <td data-label='Cantidad'>" . htmlspecialchars($row['cantidad']) . "</td>
                    <td data-label='Acciones'>
                        <button type='button' class='btn btn-success' onclick=\"Editar('" . $row['id'] . "')\">Editar</button>
                    </td>        
                </tr>";
        }
        break;
        
    case 'obtener':
        $id = $_POST['id'] ?? '';
        $query = $pdo->prepare("SELECT * FROM productos WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
        break;
}
$pdo = null;
?>
