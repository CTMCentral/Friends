<?php

namespace CTMCentral\FriendsList\commands;

use CortexPE\Commando\BaseCommand;
use CTMCentral\FriendsList\commands\subcommands\AddSubCommand;
use jasonwynn10\HubTools\Main;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\PluginOwned;
use pocketmine\utils\TextFormat as TF;

class FriendCommand extends BaseCommand implements PluginOwned {

	public function onRun(CommandSender $sender, string $aliasUsed, array $args): void{
		if (!$sender instanceof Player) {
			$sender->sendMessage(TF::RED . "You can only run this command in game");
			return;
		}
		Main::sendFriendsAndPartyForm($sender);
	}

	protected function prepare(): void{
		$this->registerSubCommand(new AddSubCommand($this->getPlugin(), "add", "Add a friend"));
	}
}