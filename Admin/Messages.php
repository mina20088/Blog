<?php
include "../Class/HelperClass/QueryString.php";
function Message()
{
    $QueryArgs = QueryString::getQuaryStringArgs();
    if(isset($QueryArgs))
    {
        var_dump($QueryArgs);
    }
}