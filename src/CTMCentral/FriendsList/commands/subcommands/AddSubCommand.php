<?php

namespace CTMCentral\FriendsList\commands\subcommands;

use CortexPE\Commando\BaseSubCommand;
use pocketmine\command\CommandSender;

class AddSubCommand extends BaseSubCommand {

	public function onRun(CommandSender $sender, string $aliasUsed, array $args): void{
		var_dump($args);
	}

	protected function prepare(): void{
		$this->setUsage("/friends add <username>");
	}
}