<?php

namespace CTMCentral\FriendsList;

use CTMCentral\FriendsList\commands\FriendCommand;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase{

	public function onLoad() :void {
		require $this->getFile() . "vendor/autoload.php";
	}

	public function onEnable() :void {
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
		$this->getServer()->getCommandMap()->register("friends", new FriendCommand($this, "friend", "Command used to show friends GUI", ["f"]));
		(new Database())->init($this->getConfig()->getNested("database.projectId"));
	}
}