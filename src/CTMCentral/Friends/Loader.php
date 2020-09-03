<?php

namespace CTMCentral\Friends;

use CTMCentral\Friends\commands\FriendCommand;
use Google\Auth\CredentialsLoader;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase{

	public function onLoad() :void {
		require $this->getFile() . "vendor/autoload.php";
	}

	public function onEnable() :void {
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
		$this->getServer()->getCommandMap()->register("friends", new FriendCommand($this, "friend", "Command used to show friends GUI", ["f"]));
		(new Database())->init(CredentialsLoader::fromWellKnownFile());
		$api = new FriendAPI();
	}
}