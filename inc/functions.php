<?php
/**
 * function generarImagenUrl(string $url, string $alt = "imagen", int $height = 400, int $width = 400): string
 * {
 * return '<img src="' . $url . '" alt="' . $alt . '" height="' . $height . 'px" $width="' . $width . 'px" />';
 * }
 * @param string $ruta
 * @param string $url
 * @param string $alt
 * @param string $class
 * @param int $height
 * @param int $width
 * @return string
 */

function generar_imagen_local(string $ruta, string $url, string $alt = "imagen",string $class="",
                              int $height = 0, int $width = 0): string
{

    $img = "<img class=\"$class\" src=\"$ruta$url\" alt='$alt'";
        if ($height > 0)
            $img .= " height=$height";
        if ($width > 0)
            $img .= " width=$width";
    $img .= "/>";
    return $img;
}


