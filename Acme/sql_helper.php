<?php

    $servername = "127.0.0.1"; //127.0.0.1
    $username = "root"; //root
    $password = "p@sswerd"; //p@sswerd
    $dbname = "Acme";
    $employee = "Employee";
    $admin = "admin";
    $dep = "Department";
    $role = "Role";
    $loc = "Branch";
    $EmpD = "EmpDepartments";
    $EmpL = "EmpBranch";
    $EmpR = "EmployeeRoles";
    
    $conn = mysqli_connect($servername, $username, $password);
    
    if (!$conn) 
    {
        die("Connection failed: ".mysqli_connect_error());
    }
    
    else
    {
        mysqli_select_db($conn, $dbname); // at this point, we have (1) a connection to the MySQL instance, and (2) we've selected our project database
    }

    function tableExists($table) 
    {
        $sql = "SELECT * FROM $table";
        if (query($sql) !== FALSE) 
            return true;
        else 
            return false; 
    }
    
    function query($sql) 
    {
        global $conn;
        return mysqli_query($conn, $sql);
    }
    
    function createTable($table, $columns) 
    {
        $sql = "CREATE TABLE $table (" . implode(", ", $columns) . ")";
        echo "Creating table with SQL Statement: $sql\n<br>";
        return query($sql);
    }
    
    function createRecord($table, $values) 
    {
        return insertInto($table, ["name","year","capacity","available","kitchen","laundry","specialNeeds"], $values);
    }
    
    function createReservationRecord($table, $values) 
    {
        return insertInto($table, ["reservationRecordID", "raID", "studentName", "class", "gender", "cwid", "kitchen", "laundry", "specialNeeds"], $values);
    }
    
    function createUsersRecord($table, $values)
    {
        return insertInto($table, ['Id', 'username', 'password', 'firstname', 'lastname', 'class', 'gender', 'kitchen', 'laundry', 'specialneeds', 'email', 'UserID', 'admin'], $values);
    }
    
    function insertInto($table, $columns, $values) 
    {
        $sql = "INSERT INTO $table (" . implode(", ", $columns). ") VALUES (" . implode(", ", $values) . ")";
        echo "Inserting a new record with SQL Statement: $sql\n<br>";
        return query($sql);
    }
    
?>