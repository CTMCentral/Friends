<?php

namespace CTMCentral\FriendsList;

use CTMCentral\FriendsList\mysql\Database;
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
		$player = $event->getPlayer();
		if ($player->hasPlayedBefore()) return;
		Database::queryAsync("REPLACE INTO friends(username, enabled) VALUES (:username, :enabled);",
		[
			":username" => $player->getName(),
			":enabled" => true
		]);
	}
	public function getOwner(): Loader {
		return $this->owner;
	}
}