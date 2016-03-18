<?php
    try{
        $pdo = new PDO ('mysql:host=localhost;dbname=mabase', 'root', '');
    }
    catch (PDOException $e){
        echo $e->getMessage();
    }
?>