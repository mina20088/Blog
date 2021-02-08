<?php
$Connection = new mysqli("localhost", 'root', '22058149', 'Blog');
if($Connection->connect_error){
    echo "Cant Connect Because " . $Connection->connect_error;
}
$Category = [];
if($Statement = $Connection->prepare('select id,name from category')){
    if($Statement->bind_result($id,$name)){
        if($Statement->execute()){
            while($Statement->fetch()){
                $Category[$id] = $name;
            }
        }
    }
}

$Connection->close();
