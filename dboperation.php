<?php
class dboperation
{
    public $con,$res;
    function __construct()
    {
        $this->con=mysqli_connect("localhost","root","","dbeterna");
        if(!$this->con){
            
            die("Connection failed:".mysqli_connect_error());
        }
    }
    public function executequery($sql)
    
    {
        $this->res=mysqli_query($this->con,$sql);
        return $this->res;
    }

    public function select($sql, $params = [], $types = "")
    {
        $stmt = $this->con->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . $this->con->error);
        }

        if ($params) {
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    }
}
?>
