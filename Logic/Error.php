<?php

function Errors(string $Arg , string $Separators): void
{
    $errorArray = [];
    if(isset($_GET[$Arg]))
    {
        $errorArray = explode($Separators,$_GET[$Arg]);
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
        echo '<ul>';
        foreach ($errorArray as $error)
        {
            echo "<li>$error</li>";
        }
        echo '</ul>';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    }
}

function errorArray(string $Arg , string $Separators):array
{
    $errorArray = [];
    if(isset($_GET[$Arg])){
        $errorArray = explode($Separators,$_GET[$Arg]);
    }
    return $errorArray;
}


