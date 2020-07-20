<?php

namespace CTMCentral\FriendsList;

use pocketmine\plugin\PluginBase;
use poggit\libasynql\DataConnector;
use poggit\libasynql\libasynql;

class Loader extends PluginBase{

	/**
	 * @var DataConnector
	 */
	private $db;

	public function onEnable() :void {
		$this->db = libasynql::create($this,$this->getConfig()->get("database"), [
			"mysql" => "mysql.sql"
		]);
		$this->db->executeGeneric("friends.init");
	}

	public function onDisable(){
		if(isset($this->database)) $this->database->close();
	}
}