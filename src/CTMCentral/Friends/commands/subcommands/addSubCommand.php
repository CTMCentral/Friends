<?php

namespace CTMCentral\Friends\commands\subcommands;

use CortexPE\Commando\args\RawStringArgument;
use CortexPE\Commando\BaseSubCommand;
use CTMCentral\Friends\exceptions\FriendNotFoundException;
use CTMCentral\Friends\exceptions\FriendUsernameSameException;
use CTMCentral\Friends\FriendAPI;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

class addSubCommand extends BaseSubCommand {

	public function onRun(CommandSender $sender, string $aliasUsed, array $args): void{
		if (!$sender instanceof Player) return;
		if (!isset($args["add"])) {
			$sender->sendMessage("You will need to specify who you are adding");
			return;
		}
		try {
			FriendAPI::sendFriendRequest($sender->getName(), $args["add"]);
		}catch(FriendNotFoundException $exception) {
			$sender->sendMessage(TextFormat::RED . "User is not found, thus your friend request has not been sent.");
			return;
		}catch(FriendUsernameSameException $exception) {
			$sender->sendMessage("Thats sad, try adding someone else?");
			return;
		}
		$sender->sendMessage("Your request has been sent to {$args['add']}");
		return;
	}

	protected function prepare(): void{
		$this->registerArgument(0, new RawStringArgument("add", true));
	}
}