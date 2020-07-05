<?php

namespace CTMCentral\FriendsList;

use pocketmine\plugin\PluginBase;
use poggit\libasynql\DataConnector;
use poggit\libasynql\libasynql;

class Loader {

	/**
	 * @var PluginBase
	 */
	private $owner;
	/**
	 * @var DataConnector
	 */
	private $db;
	/**
	 * @var String
	 */
	private $host;
	/**
	 * @var String
	 */
	private $username;
	/**
	 * @var String
	 */
	private $password;
	/**
	 * @var String
	 */
	private $schema;
	/**
	 * @var Int
	 */
	private $workerlimit;

	/**
	 * Loader constructor.
	 *
	 * @param PluginBase $main
	 * @param String     $host
	 * @param String     $username
	 * @param String     $password
	 * @param String     $schema
	 * @param Int        $workerlimit
	 */
	public function __construct(PluginBase $main, String $host, String $username, String $password, String $schema, Int $workerlimit){
		$this->owner = $main;
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->schema = $schema;
		$this->workerlimit = $workerlimit;
	}

	public function init() :void {
		$this->db = libasynql::create($this->getOwner(), [
			"database" => [
				"type" => "mysql",
				"mysql" => [
					"host" => $this->host,
					"username" => $this->username,
					"password" => $this->password,
					"schema" => $this->schema
				],
				"worker-limit" => $this->workerlimit

			]
		], ["mysql" => "mysql.sql"]);
	}

	/**
	 * @return PluginBase
	 */
	public function getOwner() :PluginBase {
		return $this->owner;
	}

	public function close() {
		if(isset($this->db)) $this->db->close();
	}
}