<?php

namespace CTMCentral\Friends\commands\subcommands

use CortexPE\Commando\args\RawStringArgument;
use CortexPE\Commando\BaseSubCommand;
use pocketmine\command\CommandSender;

class adminSubCommand extends BaseSubCommand {

	protected function prepare(): void{
		$this->registerArgument(0, new RawStringArgument("adminSubCommand", true));
	}

	public function onRun(CommandSender $sender, string $aliasUsed, array $args): void{
		if (!$sender->hasPermission("friends.adminSubCommand")) return;

		if ($args[0] === "addfriend") {
			//TODO
		}
	}
}