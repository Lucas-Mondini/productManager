<?php
    require_once('./DB/DBConfig.php');

    function DB_func($query, $pdo){
        try{
                                
        $q = $pdo->query($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        return $q;
        }catch (PDOException $e){
            echo "$pdo";
            die("Could not connect to the database $DB :" . $e->getMessage());
        }
    }

    function DQuery($query, $pdo, $where){
        $c = $pdo->prepare($query.$where);
        $c->execute();
        $c->fetch(PDO::FETCH_ASSOC);
    }

?>