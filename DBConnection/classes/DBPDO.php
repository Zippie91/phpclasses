<?php
class DBConnection extends PDO
{
    public function __construct($file = "../config/config.ini") 
	{
        if (!$config = parse_ini_file($file, true)) throw new exception('Unable to open ' . $file . '.');
		
        $dsn = "{$config['database']['engine']}:host={$config['database']['host']};dbname={$config['database']['name']}";
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
		
        try {
		    parent::__construct($dsn, $config['database']['user'], $config['database']['password'], $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }
}
?>