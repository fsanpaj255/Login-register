<?php
#Función que coge el contenido de un archivo csv
function comprobar_csv($archivo) {
    $n = 0;
    if (!file_exists($archivo)) {
      /* Decidir qué hacer en caso de que no exista el archivo */
      return false;
    }
    $fh = @fopen($archivo, 'r');
    if ($fh === false) {
      /* Decidir qué hacer en caso de error de apertura */
      return false;
    }
    while (($datos = fgetcsv($fh, 1000, ',')) !== false && ++$n) {
      /* En caso de no tener 6 campos cerramos y salimos */
      if (count($datos) != 6) {
        fclose($fh);
        return false;
      }
    }
    fclose($fh);
    /* Comprobamos que tenga al menos una línea */
    return $n > 0;
  }



?>