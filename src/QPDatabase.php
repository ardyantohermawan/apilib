<?php
namespace API\Lib;

use Illuminate\Database\Capsule\Manager as Capsule;
use Exception;
use PDOException;
use API\Lib\QPException;

class QPDatabase extends Capsule {

	public $db;

	public function connect()
	{
		date_default_timezone_set('UTC');
		
		try {
			
			$this->db = new Capsule();
			$this->db->addConnection([
					'driver'    => 'mysql',
					'host'      => 'localhost',
					'database'  => 'api_qpoin',
					'username'  => 'root',
					'password'  => '1234',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
			]);

			$this->db->setAsGlobal();
			return $this->db;
			
		} catch (PDOException $e) {

			throw new QPException($e->getMessage());
		
		} catch (Exception $e) {

			throw new QPException($e->getMessage());
		
		}
	}

}

?>