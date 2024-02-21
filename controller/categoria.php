<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Categoria.php");
    $categoria = new Categoria();

    $body = json_decode(file_get_contents("php://input"), true);

    switch ($_GET["op"]) {
        case "getall":
            $datos=$categoria->get_categoria();
            echo json_encode($datos);
        break;
        
        case "getid":
            $datos=$categoria->get_categoria_x_id($body["cat_id"]);
            echo json_encode($datos);
        break;

        case "insert":
            $datos=$categoria->insert_categoria($body["cat_nom"],$body["cat_obs"]);
            echo json_encode("Insert Ejecutado Correctamente");
        break;

        case "update":
            $datos=$categoria->update_categoria($body["cat_id"],$body["cat_nom"],$body["cat_obs"]);
            echo json_encode("Update Ejecutado Correctamente");
        break;
        
        case "delete":
            $datos=$categoria->delete_categoria($body["cat_id"]);
            echo json_encode("Delete Ejecutado Correctamente");
        break;
    }
?>