<?php

namespace CTMCentral\Friends\commands\subcommands;

use CortexPE\Commando\args\RawStringArgument;
use CortexPE\Commando\BaseSubCommand;
use CTMCentral\Friends\exceptions\FriendNotFoundException;
use CTMCentral\Friends\exceptions\FriendUsernameSameException;
use CTMCentral\Friends\exceptions\NoFriendsException;
use CTMCentral\Friends\exceptions\NotYourFriendException;
use CTMCentral\Friends\FriendAPI;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

class removeSubCommand extends BaseSubCommand {

	public function onRun(CommandSender $sender, string $aliasUsed, array $args): void{
		if (!$sender instanceof Player) {
			$sender->sendMessage(TextFormat::RED . "You can only run this command in gane");
		}
		if (!isset($args["remove"])) {
			$sender->sendMessage(TextFormat::RED . "You would need to mention someone to remove");
			return;
		}
		$api = new FriendAPI();
		try {
			FriendAPI::removeFriend($sender->getName(), $args["remove"]);
		}catch(FriendNotFoundException $exception) {
			$sender->sendMessage(TextFormat::RED . "This user can not be found");
			return;
		}catch(FriendUsernameSameException $exception) {
			$sender->sendMessage("Woops you can't remove yourself as a friend");
			return;
		}catch (NotYourFriendException $exception) {
			$sender->sendMessage(TextFormat::RED . "This user is not your friend sadnoises");
			return;
		}catch(NoFriendsException $exception) {
			$sender->sendMessage(TextFormat::RED . "Who are you removing when you have no one to remove lol");
			return;
		}
	}

	protected function prepare(): void{
		$this->registerArgument(0, new RawStringArgument("remove", true));
	}
}