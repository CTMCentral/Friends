<?php

namespace CTMCentral\Friends\commands\subcommands

use CortexPE\Commando\args\RawStringArgument;
use CortexPE\Commando\BaseSubCommand;
use pocketmine\command\CommandSender;

class admin extends BaseSubCommand {

	protected function prepare(): void{
		$this->registerArgument(0, new RawStringArgument("admin", true));
	}

	public function onRun(CommandSender $sender, string $aliasUsed, array $args): void{
		if (!$sender->hasPermission("friends.admin")) return;

		if ($args[0] === "addfriend") {
			//TODO
		}
	}
}