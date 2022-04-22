<?php
require "DataBaseConfig.php";

class DataBase
{
    public $connect;
    public $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $dbc = new DataBaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
    }

    function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        return $this->connect;
    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }

    function logIn($table, $username, $password)
    {
        $username = $this->prepareData($username);
        $password = $this->prepareData($password);
        $this->sql = "select * from " . $table . " where username = '" . $username . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
            $dbusername = $row['username'];
            $dbpassword = $row['password'];
            if ($dbusername == $username && password_verify($password, $dbpassword)) {
                $login = true;
            } else $login = false;
        } else $login = false;

        return $login;
    }

    function signUp($table, $firstName, $email, $username, $password,$middleInitial,$lastName,$sectionID,$contactNo,$address,$age,
                  $gender, $civilStatus)
    {
        $firstName = $this->prepareData($firstName);
        $email = $this->prepareData($email);
        $username = $this->prepareData($username);
         $middleInitial = $this->prepareData($middleInitial);
         $lastName = $this->prepareData($lastName);
         $sectionID = $this->prepareData($sectionID);
         $contactNo = $this->prepareData($contactNo);
         $address = $this->prepareData($address);
         $age = $this->prepareData($age);
         $gender = $this->prepareData($gender);
         $civilStatus = $this->prepareData($civilStatus);
         $password = $this->prepareData($password);
        $this->sql =
           "INSERT INTO users (username, email, password, firstName, middleInitial, lastName, role, sectionID, contactNo, address, age, gender, civilStatus) VALUES ('$username', '$email', '$password', '$firstName', '$middleInitial', '$lastName', 'user', '$sectionID', '$contactNo', '$address', '$age', '$gender', '$civilStatus')";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

}

?>
