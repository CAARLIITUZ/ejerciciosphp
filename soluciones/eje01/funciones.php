<?php

// Incluye el archivo Cliente.php donde está definida la clase Cliente
include "dat/Cliente.php";

/**
 * Lee el fichero de clientes y lo carga en un array de objetos Cliente
 * @return array - array asociativo donde la clave es el DNI
 */
function cargarTablaClientes (): array {

    // Crea un array vacío donde se guardarán los clientes
    $tclientes = [];

    // Abre el fichero clientes.csv en modo lectura ('r')
    $fich = fopen('dat/clientes.csv', 'r');

    // Lee el fichero línea a línea mientras haya datos
    while ($datoscli = fgetcsv($fich)) {

        // Asigna cada campo del CSV a una variable
        list($dni, $nombre, $clavehash, $puntos) = $datoscli;

        // Crea un nuevo objeto Cliente con los datos leídos
        $cli = new Cliente($dni, $nombre, $clavehash, $puntos);

        // Guarda el objeto Cliente en el array usando el DNI como clave
        $tclientes[$dni] = $cli;
    }

    // Devuelve el array completo de clientes
    return $tclientes;
}

/**
 * Escribe una tabla de objetos Cliente en el fichero CSV
 */
function salvarTablaClientes(array $tabla){

    // Abre el fichero clientes.csv en modo escritura ('w')
    // Esto borra el contenido anterior
    $fich = fopen('dat/clientes.csv', 'w');

    // Recorre el array de clientes
    foreach ($tabla as $cli){

        // Crea un array con los valores del objeto Cliente
        $valores = [
            $cli->dni,
            $cli->nombre,
            $cli->clavehash,
            $cli->puntos
        ];

        // Escribe los valores en una línea del CSV
        fputcsv($fich, $valores);
    }

    // Cierra el fichero para liberar recursos
    fclose($fich);
}

/**
 * Valida usuario y contraseña contra el fichero clientes.csv
 * @param string $dni DNI del cliente
 * @param string $clave Contraseña en texto plano
 * @return bool true si el usuario y la contraseña son correctos
 */
function validarCliente($dni, $clave) : bool {

    // Carga todos los clientes desde el CSV
    $tablacli = cargarTablaClientes();

    // Comprueba:
    // 1. Si existe el DNI en el array
    // 2. Si la contraseña coincide con el hash guardado
    if (
        array_key_exists($dni, $tablacli) &&
        password_verify($clave, $tablacli[$dni]->clavehash)
    ) {
        // Usuario y contraseña correctos
        return true;
    }

    // Si algo falla, devuelve false
    return false;
}

/**
 * Anota los puntos logrados en la última partida
 * @param string $dni DNI del cliente a modificar
 * @param int $puntos Puntos a almacenar
 * @return bool true si se ha podido guardar
 */
function anotarPuntos($dni, $puntos): bool {

    // Carga la tabla de clientes
    $tablaCli = cargarTablaClientes();

    // Comprueba si existe el cliente con ese DNI
    if (key_exists($dni, $tablaCli)) {

        // Actualiza los puntos del cliente
        $tablaCli[$dni]->puntos = $puntos;

        // Guarda la tabla actualizada en el CSV
        salvarTablaClientes($tablaCli);

        // Indica que la operación fue correcta
        return true;
    }

    // Si el cliente no existe, devuelve false
    return false;
}



