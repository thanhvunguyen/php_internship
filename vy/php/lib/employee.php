<?php
    global $conn;
    function connect_db()
    {
        global $conn;
        if (!$conn){
            $conn = mysqli_connect('localhost', 'root', '', 'phpintership') or die ('Can\'t not connect to database');
            mysqli_set_charset($conn, 'utf8');
        }
    }
    function disconnect_db()
    {
        global $conn;
        if ($conn){
            mysqli_close($conn);
        }
    }
    function get_employee($employee_id)
    {
        global $conn;
        connect_db();
        $sql = "select * from employee where id = {$employee_id}";
        $query = mysqli_query($conn, $sql);
        $result = array();
        if (mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $result = $row;
        }
        return $result;
    }
    function list_employee()
    {
        connect_db();
        global $conn;
        $sql = "select * from employee";
        $query = mysqli_query($conn,$sql);
        $result = array();
        if ($query){
            while ($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
            }
        }
        return $result;
    }
    function add_employee($employee_name, $employee_address, $employee_mail)
    {
        connect_db();
        global $conn;
        $employee_name = addslashes($employee_name);
        $employee_address = addslashes($employee_address);
        $employee_mail = addslashes($employee_mail);
        $sql = "INSERT INTO employee(name , address, mail) VALUES('$employee_name','$employee_address','$employee_mail')";
        $query = mysqli_query($conn,$sql);
        return $query;

    }
    function update_employee($employee_id, $employee_name, $employee_address, $employee_mail)
    {
        global $conn;
        connect_db();
        $employee_name = addslashes($employee_name);
        $employee_address = addslashes($employee_address);
        $employee_mail = addslashes($employee_mail);
        $sql = "update employee set name = '$employee_name', address = '$employee_address', mail = '$employee_mail' where id = $employee_id";
        echo $sql;
        $query = mysqli_query($conn,$sql);
        return $query;
    }
    function delete_employee($employee_id)
    {
        global $conn;
        connect_db();
        $sql = "delete from employee where id = $employee_id";
        $query = mysqli_query($conn,$sql);
        return $query;
    }
