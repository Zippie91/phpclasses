<?php
class DBConnection extends PDO
{
    private $db;
    private $error;
	
    public function __construct($file = "../config/config.ini") 
	{
        if (!$config = parse_ini_file($file, true)) throw new exception('Unable to open ' . $file . '.');
		
        $dsn = "{$config['engine']}:host={$config['host']};dbname={$config['name']}";
        $options = array(
            PDO:ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
		
        try {
		    $this->db = parent::__construct($dsn, $config['user'], $config['password'], $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }
	
    public function closeConnection() 
	{
        unset($this->db);
    }
}
?>