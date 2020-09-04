<?php

namespace CTMCentral\Friends\events;

use pocketmine\event\Cancellable;
use pocketmine\event\CancellableTrait;
use pocketmine\event\player\PlayerEvent;
use pocketmine\player\Player;

class PlayerOpenFriendFormEvent extends PlayerEvent implements Cancellable{
	use CancellableTrait;

	/**
	 * @var Player
	 */
	protected $player;

	public function __construct(Player $player){
		$this->player = $player;
	}
	public function getPlayer(): Player{
		return $this->player;
	}
}