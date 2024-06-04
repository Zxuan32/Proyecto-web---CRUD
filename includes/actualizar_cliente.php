<?php
if (isset($_POST['editar'])) {
    //Se sacan todos los valores de los inputs
    $nuevo_cliente_nombre = $_POST['nombre'];
    $nuevo_cliente_apellido_paterno = $_POST['apellido_paterno'];
    $nuevo_cliente_apellido_materno = $_POST['apellido_materno'];
    $nuevo_cliente_calle = $_POST['calle'];
    $nuevo_cliente_colonia = $_POST['colonia'];
    $nuevo_cliente_codigo_postal = $_POST['codigo_postal'];
    $nuevo_cliente_telefono = $_POST['telefono'];
    $nuevo_cliente_correo = $_POST['correo'];
    $nuevo_cliente_sexo = $_POST['sexo'];
    $nuevo_cliente_banco = $_POST['banco'];
    $nuevo_cliente_numero_cuenta = $_POST['numero_cuenta'];
    $nuevo_cliente_tipo_cuenta_bancaria = $_POST['tipo_cuenta_bancaria'];

    //Si todos los campos son iguales muestra un mensaje de que no se realizaron cambios
    if (
        $nuevo_cliente_nombre == $cliente_nombre_seleccionado &&
        $nuevo_cliente_apellido_paterno == $cliente_apellido_paterno_seleccionado &&
        $nuevo_cliente_apellido_materno == $cliente_apellido_materno_seleccionado &&
        $nuevo_cliente_calle == $cliente_calle_seleccionado &&
        $nuevo_cliente_colonia == $cliente_colonia_seleccionado &&
        $nuevo_cliente_codigo_postal == $cliente_codigo_postal_seleccionado &&
        $nuevo_cliente_telefono == $cliente_telefono_seleccionado &&
        $nuevo_cliente_correo == $cliente_correo_seleccionado &&
        $nuevo_cliente_sexo == $cliente_sexo_seleccionado &&
        $nuevo_cliente_banco == $cliente_banco_seleccionado &&
        $nuevo_cliente_numero_cuenta == $cliente_numero_cuenta_seleccionado &&
        $nuevo_cliente_tipo_cuenta_bancaria == $cliente_tipo_cuenta_bancaria_seleccionado
    ) {
        echo "Sin cambios por hacer xc";
    }
    //Si se realizo un cambio en algun campo
    else {
        //si el usuario fue el que cambio se realiza una validacion para que no se use otro usuario ya existente
        if ($nuevo_cliente_correo != $cliente_correo_seleccionado) {
            $consulta = mysqli_query($conn, "SELECT correo FROM clientes WHERE LOWER(correo) = LOWER('$nuevo_cliente_correo')");
            if ($consulta->num_rows > 0) {
                echo "El correo ya esta en uso";
            } else {
                $actualizar = "correo";
                actualizar($conn, $actualizar, $nuevo_cliente_correo, $cliente_id_seleccionado);
                $cliente_correo_seleccionado = $nuevo_cliente_correo;
            }
        }
        //Si el correo fue el que se cambio se aplica la misma logica
        if ($nuevo_cliente_telefono != $cliente_telefono_seleccionado) {
            $consulta = mysqli_query($conn, "SELECT telefono FROM clientes WHERE telefono = '$nuevo_cliente_telefono'");
            if ($consulta->num_rows > 0) {
                echo "El telefono ya esta en uso";
            } else {
                $actualizar = "telefono";
                actualizar($conn, $actualizar, $nuevo_cliente_telefono, $cliente_id_seleccionado);
                $cliente_telefono_seleccionado = $nuevo_cliente_telefono;
            }
        }

        $consulta = mysqli_query($conn, "UPDATE clientes SET 
            nombre = '$nuevo_cliente_nombre', 
            apellido_paterno = '$nuevo_cliente_apellido_paterno', 
            apellido_materno = '$nuevo_cliente_apellido_materno', 
            sexo = '$nuevo_cliente_sexo', 
            calle = '$nuevo_cliente_calle', 
            colonia = '$nuevo_cliente_colonia', 
            telefono = '$nuevo_cliente_telefono', 
            banco = '$nuevo_cliente_banco',
            numero_cuenta = '$nuevo_cliente_numero_cuenta',
            tipo_cuenta_bancaria = '$nuevo_cliente_tipo_cuenta_bancaria',
            codigo_postal = '$nuevo_cliente_codigo_postal',
            correo = '$nuevo_cliente_correo'
            WHERE id = '$cliente_id_seleccionado'");

        //actualizar en las textbox
        $cliente_nombre_seleccionado = $nuevo_cliente_nombre;
        $cliente_apellido_paterno_seleccionado = $nuevo_cliente_apellido_paterno;
        $cliente_apellido_materno_seleccionado = $nuevo_cliente_apellido_materno;
        $cliente_calle_seleccionado = $nuevo_cliente_calle;
        $cliente_colonia_seleccionado = $nuevo_cliente_colonia;
        $cliente_codigo_postal_seleccionado = $nuevo_cliente_codigo_postal;
        $cliente_telefono_seleccionado = $nuevo_cliente_telefono;
        $cliente_correo_seleccionado = $nuevo_cliente_correo;
        $cliente_sexo_seleccionado = $nuevo_cliente_sexo;
        $cliente_banco_seleccionado = $nuevo_cliente_banco;
        $cliente_numero_cuenta_seleccionado = $nuevo_cliente_numero_cuenta;
        $cliente_tipo_cuenta_bancaria_seleccionado = $nuevo_cliente_tipo_cuenta_bancaria;
    }
}
function actualizar($conexion, $actualizar, $dato_actualizar, $id)
{
    $consulta = mysqli_query($conexion, "UPDATE clientes SET $actualizar = '$dato_actualizar' WHERE id = '$id'");
}
?>