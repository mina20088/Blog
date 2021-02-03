<?php

$Title = $_POST['Title'];
$SEO = $_POST['SEO-Title'];
$Category = $_POST['Category'];
$Content = $_POST['Content'];
$author = $_POST['Author'];
$QueryString = "";
if(isset($_POST['insert']))
{
    if(empty($Title)||empty($SEO)||$Content == "")
    {
        $QueryString .= "Items Cant Be Empty";
    }
    else {
        $Connection = new mysqli("localhost",'root','22058149','Blog');
        if($Connection->connect_errno){
            $QueryString .= "Cant Access The Database" . $Connection->connect_errno . " " . $Connection->connect_error;
        }
        foreach ($Category as $Cat){
            if($Cat == -1){
                $QueryString .= "Please Choose A Category";
            }else{
                if($Statement = $Connection->prepare( "insert into posts(title,seo_title,content,author) values (?,?,?,?)"))
                {
                    if($Statement->bind_param('sssi',$Title,$SEO,$Content,$author))
                    {
                        if($Statement->execute())
                        {
                            $QueryString .= "Row Inserted" . $Statement->affected_rows;
                        }
                    }
                }
            }
        }
        if($statement = $Connection->query("select id from posts where seo_title = '$SEO'")){
            while($Result = $statement->fetch_assoc()){
                $post_Id = $Result['id'];
                foreach ($Category as $Cat){
                    if($Cat == -1){
                        $QueryString .= "Not Inserted";
                    }else{
                        if($Statement= $Connection->prepare('insert into has_category values (?,?)')){
                            if($Statement->bind_param('ii',$post_Id,$Cat)){
                                if($Statement->execute()){

                                }
                            }
                        }
                    }
                }
            }
        }
        else{
            echo $Connection->error;
        }
        $Connection->close();
    }
}

if(isset($QueryString)){
    header("location:http://localhost/Admin/InsertPost.php?quary=$QueryString");
}