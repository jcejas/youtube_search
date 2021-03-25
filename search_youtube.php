<?php
ob_start();
require "config/constantes.php";

$data_result = array();
$data_result["success"] = false;

if (isset($_POST["busqueda"]) && $_POST["busqueda"] != "")
{
    $busqueda = str_replace(" ","%",trim($_POST["busqueda"]));

    $url = URL_API;
    $url .= "?key=".KEY;
    $url .= "&RegionCode=".REGION;
    $url .= "&part=".PART;
    $url .= "&type=".TYPE;
    $url .= "&maxResults=".MAX_RESULT;
    $url .= "&q=".$busqueda;
    $url .= "&order=".ORDER;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_VERBOSE, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);

    if (!$response)
    {
        $data_result["error"] = "fail_conection";
        $data_result["error_desc"] = "Error al establecer conexion con el servidor de Youtube";
    } else {
        $ArrayResult = json_decode($response, true);

        $i = 0;
        $data_result["pageInfo"] = $ArrayResult["pageInfo"];
        foreach ($ArrayResult["items"] as $dato)
        {
            $data_result["resultados"][$i]["videoId"] = $dato["id"]["videoId"];
            $data_result["resultados"][$i]["publishedAt"] = $dato["snippet"]["publishedAt"];
            $data_result["resultados"][$i]["title"] = $dato["snippet"]["title"];
            $data_result["resultados"][$i]["description"] = $dato["snippet"]["description"];
            $data_result["resultados"][$i]["thumbnails"] = $dato["snippet"]["thumbnails"];
            $data_result["resultados"][$i]["channelTitle"] = $dato["snippet"]["channelTitle"];
            $i++;
        }

        if ($data_result["pageInfo"]["totalResults"] == 0)
        {
            $data_result["error"] = "search_empty";
            $data_result["error_desc"] = "No se encontraron resultados para esta busqueda";
        }else{
            $data_result["success"] = true;
        }
    }
}else{
    $data_result["error"] = "data_empty";
    $data_result["error_desc"] = "Debe ingresar una busqueda valida";
}

ob_clean();
echo json_encode($data_result);
ob_end_flush();
?>