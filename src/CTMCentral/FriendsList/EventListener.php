<?php
declare(strict_types=1);
namespace CTMCentral\FriendsList;

use jasonwynn10\HubTools\Main;
use pocketmine\event\Listener;

class EventListener implements Listener {
	/** @var Main $plugin */
	protected $plugin;

	public function __construct(Main $plugin) {
		$this->plugin = $plugin;
		$plugin->getServer()->getPluginManager()->registerEvents($this, $plugin);
	}
}