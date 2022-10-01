<?php
if(isset($_POST["usuario"]) && isset($_POST["contraseña"]))
{
    #Comprobamos que el usuario no esté ya.
    $archivo=fopen("../Modelo/usuarios.txt","r");
    $usuarioexistente = false;
    while(!feof($archivo))
    {
        $line = fgets($archivo);
        $array = explode(";",$line);
        if(trim($array[0]) == $_POST['usuario'])
        {
            $usuarioexistente=true;
            break;
        }
    }
    fclose($archivo);
 
    // Si no esta,lo registramos y mandamos un mensaje al usuario
    if( $usuarioexistente )
    {
        echo $_POST["usuario"];
        echo ' ya está registrado.!\r\n';
        include '../Vista/registrar.html';
    }
    else
    {
        $archivo = fopen("../Modelo/usuarios.txt", "a");
        fputs($archivo,$_POST["usuario"].";".$_POST["contraseña"].";".$_POST["opcion"]."\r\n");
        fclose($archivo);
        echo $_POST["usuario"];
        echo " registrado con éxito!";
    }
}
else
{
    include '../Vista/registrar.html';
}
?>

