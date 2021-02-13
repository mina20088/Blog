<?php
include "../Class/DatabaseClass/Database.php";
include "../Class/Posts.php";
include "../Config/Config.php";
error_reporting(-1);
if(isset($_POST['insert']))
{
    $Title = $_POST['Title'];
    $SEO = $_POST['SEO-Title'];
    $Category = $_POST['Category'];
    $Content = trim($_POST['Content']);
    $author = $_POST['Author'];
    $Querystring = "";

    if ((empty($Title) && empty($SEO) && empty($Content) && empty($author)) && $Category[0] == "-1" )
    {
        $Querystring .= "EmptyTitle=Title Is Mandatory&EmptySEO=SEO Is Mandatory&EmptyContent=Content Is Mandatory&EmptyAuthor=Author Is Mandatory&EmptyCategory=Please choose Category";
    }
    elseif(empty($Title) && empty($SEO) && empty($Content) && empty($author))
    {
        $Querystring .= "EmptyTitle=Title Is Mandatory&EmptySEO=SEO Is Mandatory&EmptyContent=Content Is Mandatory&EmptyAuthor=Author Is Mindator";
    }
    elseif (empty($Title) || empty($SEO) || empty($Content) || empty($author))
    {
        if(empty($Title))
        {
            $Querystring .= "EmptyTitle=Title Is Mandatory";
        }
        if(empty($SEO))
        {
            $Querystring .= "&EmptySEO=SEO Is Mandatory";
        }
        if(empty($Content))
        {
            $Querystring .= "&EmptyContent=Content Is Mandatory";
        }
        if(empty($author)){
            $Querystring .= "&Author=Author Is Mandatory";
        }
    }
    else {
        $Connection = new Database(host, username, password, Database);
        $Post = new Posts($Connection);
        $Post->insertPost('ssss', $Title, $SEO, $Content, $author,$Category);
        $Querystring .= "Inserted=Row Inserted";

    }
    if(isset($Querystring))
    {
        header("location:/InsertPost.php?".$Querystring);
    }
}

