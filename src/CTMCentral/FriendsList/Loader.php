<?php

namespace CTMCentral\FriendsList;

use CTMCentral\FriendsList\commands\FriendCommand;
use CTMCentral\FriendsList\mysql\Database;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase{

	public function onEnable() :void {
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
		$this->getServer()->getCommandMap()->register("friends", new FriendCommand($this, "friend", "Command used to show friends GUI", ["f"]));
		Database::load($this->getConfig()->getNested("database.mysql.host"), $this->getConfig()->getNested("database.mysql.schema"), $this->getConfig()->getNested("database.mysql.username"), $this->getConfig()->getNested("database.mysql.password"));
		FriendAPI::addFriend("provsalt", "provsalt2");
	}
}