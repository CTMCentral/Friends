<?php

namespace CTMCentral\FriendsList;

use CTMCentral\FriendsList\commands\FriendCommand;
use pocketmine\plugin\PluginBase;
use poggit\libasynql\DataConnector;
use poggit\libasynql\libasynql;

class Loader extends PluginBase{

	/**w
	 * @var DataConnector
	 */
	public $db;

	public function onEnable() :void {
		$this->db = libasynql::create($this,$this->getConfig()->get("database"), [
			"mysql" => "mysql.sql"
		]);
		$this->db->executeGeneric("friends.init");
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
		$this->getServer()->getCommandMap()->register("friends", new FriendCommand($this, "friend", "Command used to show friends GUI", ["f"]));
	}

	public function onDisable(){
		if(isset($this->database)) $this->database->close();
	}
}