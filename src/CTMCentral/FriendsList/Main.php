<?php
declare(strict_types=1);
namespace CTMCentral\FriendsList;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

	/** @var Main $instance */
	protected static $instance;

	/**
	 * @return Main
	 */
	public static function getInstance() : Main {
		return self::$instance;
	}

	public function onLoad() {
		self::$instance = $this;
	}

	public function onEnable() {
		// TODO
	}
}