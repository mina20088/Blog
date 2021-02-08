<?php
error_reporting(-1);
if(isset($_POST['insert'])) {
    $Title = $_POST['Title'];
    $SEO = $_POST['SEO-Title'];
    $Category = $_POST['Category'];
    $Content = trim($_POST['Content']);
    $author = $_POST['Author'];
    $Querystring = "";
    $Success = "";
    if (empty($Title) || empty($SEO) || empty($Content) || empty($author)) {
        $Querystring .= "please insert the empty values,";
        if ($Category[0] == "-1") {
            $Querystring .= "please Select Category";
        }
    } elseif ($Category[0] == "-1") {
        $Querystring .= "please Select Category";
    } else {
        $Connection = new mysqli("localhost", 'root', '22058149', 'Blog');
        if ($Connection->connect_errno) {
            $Querystring .= "Cant Access The Database" . $Connection->connect_errno . " " . $Connection->connect_error;
        } else {
            if($Statement = $Connection->query("select `seo_title` from posts where `seo_title` = '$SEO'")){
                while($Result = $Statement->fetch_assoc()){
                    if($Result['seo_title'] == $SEO){
                        $Querystring .= "Row Exists";
                    }else{

                    }
                }
            }
            if ($Statement = $Connection->prepare("insert into posts(title,seo_title,content,author) values (?,?,?,?)")) {
                if ($Statement->bind_param('sssi', $Title, $SEO, $Content, $author)) {
                    if ($Statement->execute()) {
                        $Success .= "Row Inserted" . $Statement->affected_rows;
                        $Statement->close();
                    }
                    if ($Statement = $Connection->query("select id from posts where seo_title  ='$SEO'")) {
                            while ($Result = $Statement->fetch_assoc()) {
                                $Post_Id = $Result['id'];
                                foreach ($Category as $Cat) {
                                    if ($Statement3 = $Connection->prepare("insert into has_category values (?,?)")) {
                                        if ($Statement3->bind_param('ii', $Cat, $Post_Id)) {
                                            if ($Statement3->execute()) {
                                                $Statement3->close();
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    if (isset($Querystring) || isset($Success)) {
        if (!empty($Querystring)) {
            header("location:http://localhost/Admin/InsertPost.php?Query=" . $Querystring);
        } elseif (!empty($Success)) {
            header("location:http://localhost/Admin/InsertPost.php?Successs=" . $Success);
        }
    }
}