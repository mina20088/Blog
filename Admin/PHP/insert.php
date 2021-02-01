<?php

$Title = $_POST['Title'];
$SEO = $_POST['SEO-Title'];
$Category = $_POST['Category'];
$Content = $_POST['Content'];
$author = $_POST['Author'];


if(isset($_POST['insert'])){
    if(empty($Title)||empty($SEO)||$Content == "") {
        echo "Items Cant Be Empty";
    }else if($Category == -1){
        echo "Please Choose Category";
    }else{
        $Connection = new mysqli("localhost",'root','Lolo1986/*','themecell');
        if($Connection->connect_errno){
            echo "Cant Access The Database" . $Connection->connect_errno . " " . $Connection->connect_error;
        }
        if($Statment = $Connection->prepare( "insert into posts(title,seo_title,content,author) values (?,?,?,?)"))
        {
            var_dump($Statment);
            if($Statment->bind_param('sssi',$Title,$SEO,$Content,$author))
            {
                if($Statment->execute())
                {
                    echo "Row Inserted" . $Statment->affected_rows;
                    $Statment->close();

                }
            }
        }
    }
}
