<?php

function src($filename, $tyle='full')
{
    $path = '.upload/product/';

    if($tyle != 'full')
        $path .=$tyle .'/';

    return $path . $filename;
}

?>