<?php

namespace CTMCentral\FriendsList;

use CTMCentral\FriendsList\commands\FriendCommand;
use Google\Cloud\Firestore\FirestoreClient;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase{

	/**
	 * @var FirestoreClient
	 */
	public static $db;

	public function onLoad() :void {
		require $this->getFile() . "vendor/autoload.php";
	}

	public function onEnable() :void {
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
		$this->getServer()->getCommandMap()->register("friends", new FriendCommand($this, "friend", "Command used to show friends GUI", ["f"]));
		self::$db = new FirestoreClient(['projectId' => $this->getConfig()->getNested("database.projectId")]);
		FriendAPI::addFriend("provsalt", "test1");
	}
}