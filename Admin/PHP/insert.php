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
        $Connection = new mysqli("localhost",'root','22058149','Blog');
        if($Connection->connect_errno){
            echo "Cant Access The Database" . $Connection->connect_errno . " " . $Connection->connect_error;
        }
        if($Statement = $Connection->prepare( "insert into posts(title,seo_title,content,author) values (?,?,?,?)"))
        {
            if($Statement->bind_param('sssi',$Title,$SEO,$Content,$author))
            {
                if($Statement->execute())
                {
                    echo "Row Inserted" . $Statement->affected_rows;
                }
            }
        }
        if($statement = $Connection->query("select id from posts where seo_title = '$SEO'")){
            while($Result = $statement->fetch_assoc()){
                $post_Id = $Result['id'];
                foreach ($Category as $Cat){
                    if($Cat == -1){
                        echo "Not Inserted";
                    }else{
                        if($Statement= $Connection->prepare('insert into has_category values (?,?)')){
                            if($Statement->bind_param('ii',$post_Id,$Cat)){
                                if($Statement->execute()){
                                    echo "Row Inserted" . $Statement->affected_rows;
                                }
                            }
                        }
                    }
                }
            }
            $Statement->close();
        }else{
            echo $Connection->error;
        }
        $Connection->close();
    }
}
