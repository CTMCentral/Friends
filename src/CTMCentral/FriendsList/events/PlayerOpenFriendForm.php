<?php

namespace CTMCentral\FriendsList\events;

use pocketmine\event\Cancellable;
use pocketmine\event\Event;
use pocketmine\player\Player;

class PlayerOpenFriendForm extends Event implements Cancellable{

	/**
	 * @var Player
	 */
	private $player;

	public function __construct(Player $player){
		$this->player = $player;
	}
}