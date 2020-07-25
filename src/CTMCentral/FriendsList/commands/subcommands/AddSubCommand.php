<?php

namespace CTMCentral\FriendsList\commands\subcommands;

use CortexPE\Commando\args\RawStringArgument;
use CortexPE\Commando\BaseSubCommand;
use CTMCentral\FriendsList\exceptions\FriendNotFoundException;
use CTMCentral\FriendsList\exceptions\FriendOfflineException;
use CTMCentral\FriendsList\exceptions\FriendUsernameSameException;
use CTMCentral\FriendsList\FriendAPI;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

class AddSubCommand extends BaseSubCommand {

	public function onRun(CommandSender $sender, string $aliasUsed, array $args): void{
		if (!$sender instanceof Player) return;
		if (!isset($args["add"])) {
			$sender->sendMessage("You will need to specify who you are adding");
			return;
		}
		try {
			FriendAPI::addFriend($sender->getName(), $args["add"]);
		}catch(FriendNotFoundException $exception) {
			$sender->sendMessage(TextFormat::RED . "User is offline, thus your friend request has not been sent.");
		}catch(FriendUsernameSameException $exception) {
			$sender->sendMessage("Thats sad, try adding someone else?");
		}

	}

	protected function prepare(): void{
		$this->registerArgument(0, new RawStringArgument("add", true));
	}
}