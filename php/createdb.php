<?php

class createdb
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;


    public function __construct($dbname = "catalogdb", $tablename = "catalog", $servername = "localhost", $username = "root", $password = "") {
            $this->dbname = $dbname;
            $this->tablename = $tablename;
            $this->servername = $servername;
            $this->username = $username;
            $this->password = $password;

            $this->con = mysqli_connect($servername, $username, $password);

            //Debug connection
            if(!$this->con) {
                die("Connection failed: ". mysqli_connect_error());
            }

            //Query
            $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

            //Execute Query
            if(mysqli_query($this->con, $sql)) {
                $this->con = mysqli_connect($servername, $username, $password, $dbname);

                //Query to Create Table
                $sql = "CREATE TABLE IF NOT EXISTS $tablename
                        (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        prod_name VARCHAR(25) NOT NULL,
                        prod_price FLOAT,
                        prod_image VARCHAR(100),
                        prod_desc VARCHAR(100)
                        );";

                if(!mysqli_query($this->con, $sql)) {
                    echo "Error creating table: ". mysqli_error($this->con);
                }

            }else {
                return false;
            }
    }

    public function getData() {
        $sql = "SELECT * FROM $this->tablename";
        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
}
?>