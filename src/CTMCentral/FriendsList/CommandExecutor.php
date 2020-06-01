<?php
declare(strict_types=1);
namespace CTMCentral\FriendsList;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

class CommandExecutor implements \pocketmine\command\CommandExecutor {

	/** @var Main $plugin */
	protected $plugin;

	public function __construct(Main $plugin) {
		$this->plugin = $plugin;

		foreach($this->plugin->getServer()->getCommandMap()->getCommands() as $command) {
			if($command instanceof PluginCommand and $command->getOwningPlugin() instanceof Main) {
				$command->setExecutor($this);
			}
		}
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
		if(!$sender instanceof Player) {
			$sender->sendMessage("Please run this command in-game.");
			return false;
		}
		try{
			$ref = new \ReflectionClass($this);
			$method = $ref->getMethod("on".ucfirst(strtolower($command->getName()))."Command");
			return $method->invoke($this, $sender, $args);
		}catch(\ReflectionException $e) {
			$sender->sendMessage(TextFormat::RED."Unknown command. Try /help for a list of commands");
			return true;
		}
	}

	protected function onAddfriendCommand(Player $player, array $args) : bool {
		return false;
	}
}