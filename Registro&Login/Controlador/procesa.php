<?php

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$listausuariost = file ('../Modelo/usuarios.txt');

$success = false;
foreach ($listausuariost as $user) {
    $infousuarios = explode(';', $user);
    if ($infousuarios[0] == $usuario && $infousuarios[1] == $contraseña) {
        $success = true;
        break;
    }
}

if ($success) {
    echo "<br> Hola $usuario estas dentro. <br>";
} else {
    echo "<br> Algo ha ido mal,intentalo de nuevo campeón. <br>";
}

if ($infousuarios[2] == "admin") {
    echo "ADMIN.";
    header("Location: ../Vista/listadousuarios.html");
} else {
    echo "";
}

var_dump($infousuarios[2]);


?>