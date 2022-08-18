<?php
    require_once('db-connect.php');

    # Errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    # Database Manipulation
    function converter($query)
    {
        $arr = array();
        while( $data = $query->fetch_assoc()):
            $arr[] = $data;
        endwhile;
        return $arr;
    }

    function execSql($sql)
    {
        global $connection;
        $query  = $connection->query($sql);
        $result = converter($query);
        return $result;
    }

    function innerJoin()
    {
        $sql = '
        # SELECT U.id, U.fname, U.lname, C.type, C.amount
        SELECT count(*)
        FROM `users` AS U 
        INNER JOIN `cards` AS C 
        ON C.uid = U.id
        ';

        return $sql;
    }

    function leftJoin()
    {
        $sql = '
        # SELECT U.id, U.fname, U.lname, C.type, C.amount
        SELECT count(*)
        FROM `users` AS U 
        LEFT JOIN `cards` AS C 
        ON C.uid = U.id
        ';

        return $sql;
    }

    function rightJoin()
    {
        $sql = '
        # SELECT U.id, U.fname, U.lname, C.type, C.amount
        SELECT count(*)
        FROM `users` AS U 
        RIGHT JOIN `cards` AS C 
        ON C.uid = U.id
        ';

        return $sql;
    }

    function jsonBuild()
    {
        $sql = "
        SELECT 
        vip_list.id AS id,
        vip_list.name AS name,
        vip_list.surname AS surname,
        JSON_OBJECT(
            'qa', vip_list.qa,
            'status', vip_list.status,
            'net_worth', vip_list.net_worth,
            'registered_at', vip_list.registered_at
        ) AS details
        FROM vip_list
        LIMIT 10
        ";

        return $sql;
    }

?>