<?php


class Database
{
    protected string $Host;
    protected string $UserName;
    protected string $Password;
    protected string $DatabaseName;
    protected mysqli $Connection;
    protected int $ConnectionErrorNumber;
    protected string $ConnectionErrorMessage;
    protected  bool $isConnected;


    public function __construct(string $Host, string $UserName,string $Password,string $DatabaseName)
    {
        $this->Host = $Host;
        $this->UserName = $UserName;
        $this->Password = $Password;
        $this->DatabaseName = $DatabaseName;
        $this->Connection = new mysqli($this->Host,$this->UserName,$this->Password,$this->DatabaseName);
        $this->isConnected = true;
    }
    public function getConnection():mysqli{
        return $this->Connection;
    }
    public function CheckConnection():bool
    {
        if($this->Connection->connect_errno){
            $this->isConnected = false;
        }
        return $this->isConnected;
    }
    public function ConnectionError():string
    {
        return "Connection Can`t Be Established Because  Error#: " . $this->Connection->connect_errno ." Error Message : " . $this->Connection->connect_error;
    }
//    public function __destruct()
//    {
//        $this->Connection->close();
//    }
}