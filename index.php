<?php
/**
 * Created by PhpStorm.
 * User: Dayanna
 * Date: 1/04/2019
 * Time: 12:34
 */
$msj="";
if(isset($_POST['enviar'])) {
    if (strlen(trim($_POST["cadena"]))>=1){
        $cad=trim($_POST['cadena']);
        $inicio='q0';
        $estado=$inicio;
        $fin='q0';
        $longi=strlen($cad);
        var_dump($longi);
        for ($i = 0; $i < $longi; $i++) {
            if ($estado == 'q0') {
                if ($cad[$i] == '1') {
                    $estado = 'q1';
                } else{
                    $estado = 'q2';
                }
            } else if ($estado == 'q1') {
                if ($cad[$i] == '1') {
                    $estado = 'q0';
                } else{
                    $estado = 'q3';
                }
            } else if ($estado == 'q2') {
                if ($cad[$i] == '1') {
                    $estado = 'q3';
                } else{
                    $estado = 'q0';
                }
            } else{
                if ($cad[$i] == '1') {
                    $estado = 'q2';
                } else{
                    $estado = 'q1';
                }
            }
            var_dump($cad[$i]);
            var_dump($estado);
        }
        var_dump($i);

        if ($estado==$fin){
            $msj=$estado." es el estado de aceptacion. La cadena ".$cad." es aceptada";
        }else{
            $msj=$estado." no es el estado de aceptacion. La cadena ".$cad." es rechazada";
        }
    }else{
        $msj="ingresar cadena";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Automata</title>
</head>
<body>
<h1>AFD</h1>
<div>
    <form action="" method="post">
        <tr>
            <td>ingresar cadena:</td>
            <td><input type="text" name="cadena"></td>
            <td><input type="submit" name="enviar"></td>
            <td><?= $msj ?></td>
        </tr>
    </form>
</div>
</body>
</html>
