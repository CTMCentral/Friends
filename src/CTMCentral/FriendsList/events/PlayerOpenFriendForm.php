<?php

namespace CTMCentral\FriendsList\events;

use pocketmine\event\Cancellable;
use pocketmine\event\player\PlayerEvent;
use pocketmine\player\Player;

class PlayerOpenFriendForm extends PlayerEvent implements Cancellable{
	public function __construct(Player $player){
		$this->player = $player;
	}
}