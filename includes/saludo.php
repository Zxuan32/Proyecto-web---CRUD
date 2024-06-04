<?php
date_default_timezone_set("America/Mexico_City");
$hora_actual = date("H");
if ($hora_actual > 0 && $hora_actual < 12) {
    $imagen = "public_html/img/dias.png";
    $mensaje = "Buenos Días";
    $imagen_log = "../assets/img/dias_log.png";
    $mensaje_log = "
                        ¡Empieza el día con una sonrisa <br>
                            y todo saldrá bien! <br>
                        <strong>¡Buenos días!</strong>";
} elseif ($hora_actual >= 12 && $hora_actual <= 19) {
    $imagen = "public_html/img/tardes.png";
    $mensaje = "Buenas Tardes";
    $imagen_log = "../assets/img/tardes_log.png";
    $mensaje_log = "
                            <strong>¡Buenas tardes!</strong> <br> 
                              Recuerda tomarte un descanso <br> 
                              y disfrutar del momento.";
} else {
    $imagen = "public_html/img/noches.png";
    $mensaje = "Buenas Noches";
    $imagen_log = "../assets/img/noches_log.png";
    $mensaje_log = "
                            Que la luz de la luna  <br>
                            guíe tus sueños esta noche. <br> 
                            <strong>¡Buenas noches!</strong>";
}
?>