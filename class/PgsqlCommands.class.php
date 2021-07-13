<?php

/**
 * 
 * PgsqlCommands = class that connect and execute querys on database
 * 
 * @return json
 * 
 **/ 

class PgsqlCommands extends PDO 
{
    
    private $conn;

    public function __construct()
    {

        /**
         * 
         * @var $ini = read mainDatabase.ini file
         * @var $paramsForAcess = array with connection params (array)
         * 
         */

        if(file_exists('../connection/mainDatabase.ini'))
        {
            $ini = parse_ini_file('../connection/mainDatabase.ini', true);
        }
        elseif(file_exists('../../connection/mainDatabase.ini'))
        {
            $ini = parse_ini_file('../../connection/mainDatabase.ini', true);
        }
        
        $paramsForAcess = array(
            'host' => $ini['connection']['host'],
            'dbname' => $ini['connection']['dbname'],
            'port' => $ini['connection']['port'],
            'user' => $ini['connection']['username'],
            'password' => $ini['connection']['password']
        );

        $this->conn = new PDO('pgsql:host='.$paramsForAcess['host'].';
        port='.$paramsForAcess['port'].';
        dbname='.$paramsForAcess['dbname'].';
        user='.$paramsForAcess['user'].';
        password='.$paramsForAcess['password'].'');
    }
    

    private function setParams($statment, $parameters = array())
    {
        
        foreach($parameters as $key => $value)
        {
            
            $this->setParam($statment, $key, $value);
        }
    }

    private function setParam($statment, $key, $value)
    {
        
        $statment->bindParam($key, $value);

        
    }

    public function query($rawQuery, $params = array())
    {

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
    }

    public function select($rawQuery, $params = array()):array
    {
        $stmt = $this->query($rawQuery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>