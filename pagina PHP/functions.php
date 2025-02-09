<?php 

//habilita chequeos de tipos de datos
declare(strict_types=1); // <- a nivel de archivo y arriba de todo

function get_data(string $url): array
{
    // Inicializar una nueva sesión de curl; ch = cURL handle
    $ch = curl_init(API_URL);

    // Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);



    // Ejecutar la petición y guardamos el resultado
    $result = curl_exec($ch);

    // Verificar si hubo algún error en la petición cURL
    if (curl_errno($ch)) {
        echo 'Error en la solicitud cURL: ' . curl_error($ch);
    } //else {
        // Mostrar la respuesta antes de decodificar para verificar si es válida
        //var_dump($result);
    //}

    // Transformar el JSON del resultado en un array asociativo
    $data = json_decode($result, true);


    // Cerrar la sesión de cURL
    curl_close($ch);

    return $data;
}
?>