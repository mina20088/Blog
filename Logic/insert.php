<?php
include "../Class/DatabaseClass/Database.php";
include "../Class/HelperClass/Validation.php";
include "../Class/Posts.php";
include "../Config/Config.php";
if(isset($_POST['insert']))
{
    $Title = $_POST['Title'];
    $SEO = $_POST['SEO-Title'];
    $Category = $_POST['Category'];
    $Content = trim($_POST['Content']);
    $author = $_POST['Author'];
    $QueryString  = "";
    if(empty($Title)&& empty($SEO)&& $Category[0] == -1 && empty($Content))
    {
       $QueryString .=
           "Title=".
            "&SEO_title=" .
           "&Category=" .
           "&Content=" .
           "&Error=Please Fill The Title,Please Fill The SEO_Title,Please Choose Category,Please Fill Content" ;
    }


    if(isset($QueryString)){
            header("location:../InsertPost.php?" . $QueryString);
    }
}



