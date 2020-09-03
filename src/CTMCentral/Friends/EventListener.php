<?php

namespace CTMCentral\Friends;

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
		Database::getDataBase()->collection("friends")->document($player->getName())->set(
			[
				"friendlist" => null,
				"requestlist" => null,
				"requestsentlist", null,
				"enabled" => true
			]
		);
	}
	public function getOwner(): Loader {
		return $this->owner;
	}
}