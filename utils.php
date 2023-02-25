<?php
function dataBanco($data)
{
    //dd/mm/aaaa -> aaaa-mm-dd
    $data = explode("/", $data); //
    $data = array_reverse($data); //  
    $data = implode("-", $data); //

    return $data;

}
?>