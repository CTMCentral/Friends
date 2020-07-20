<?php

namespace CTMCentral\FriendsList;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerLoginEvent;

class EventListener implements Listener {

	/**
	 * @var Loader
	 */
	private $owner;

	public function __construct(Loader $owner){
		$this->owner = $owner;
	}

	public function onJoin(PlayerLoginEvent $event) {
		if ($event->getPlayer()->hasPlayedBefore()) return;
		$this->getOwner()->db->executeInsert("friends.player.init", [
			"username" => $event->getPlayer()->getName(),
			"enabled" => true
		]);
	}
	public function getOwner(): Loader {
		return $this->owner;
	}
}