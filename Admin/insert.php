<?php
include "../Class/DatabaseClass/Database.php";
include "../Class/Posts.php";
include "../Config/Config.php";
include "../Class/HelperClass/QueryString.php";
error_reporting(-1);
if(isset($_POST['insert'])) {
    $Title = $_POST['Title'];
    $SEO = $_POST['SEO-Title'];
    $Category = $_POST['Category'];
    $Content = trim($_POST['Content']);
    $author = $_POST['Author'];
    $Querystring = [];
    if (empty($Title) || empty($SEO) || empty($Content) || empty($author) && $Category[0]== '-1')
    {
        $Querystring['EmptyFields'] = "please insert the empty values,";
        $Querystring['EmptyCategory'] = "please Select Category";
    }
    elseif(empty($Title) && empty($SEO) && empty($Content) && empty($author))
    {
        $Querystring['EmptyFields'] = "please insert the empty values,";
    }
    elseif ($Category[0] == "-1")
    {
        $Querystring['EmptyCategory'] = "please Select Category";
    }
    else {
        $Connection = new Database(host, username, password, Database);
        $Post = new Posts($Connection);
        $Querystring['inserted'] = $Post->insertPost('ssss', $Title, $SEO, $Content, $author,$Category);

    }
    if(isset($Querystring)){
        QueryString::setQueryString($Querystring);
        QueryString::setDomain('localhost/InsertPost.php');
        header('location:' . 'http://' . QueryString::getDomain() . "?" . QueryString::getQueryString());
    }
}

