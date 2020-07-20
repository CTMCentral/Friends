<?php

namespace CTMCentral\FriendsList\commands\subcommands;

use CortexPE\Commando\BaseSubCommand;
use CTMCentral\FriendsList\exceptions\FriendOfflineException;
use CTMCentral\FriendsList\FriendAPI;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;

class AddSubCommand extends BaseSubCommand {

	public function onRun(CommandSender $sender, string $aliasUsed, array $args): void{
		try {
			FriendAPI::addFriend($sender->getName(),$args[0]);
		}catch(FriendOfflineException $exception) {
			$sender->sendMessage(TextFormat::RED . "User is offline, thus your friend request has not been send.");
		}
	}

	protected function prepare(): void{
		return;
	}
}