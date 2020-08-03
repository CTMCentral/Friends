<?php
declare(strict_types=1);

namespace CTMCentral\FriendsList\mysql\tasks;

use CTMCentral\FriendsList\mysql\Database;
use pocketmine\scheduler\AsyncTask;
use pocketmine\Server;
use function serialize;
use function unserialize;

class DatabaseQueryTask extends AsyncTask{

	/** @var string */
	private $query;
	/** @var string */
	private $params;

	/** @var string */
	private $credentials;

	/** @var callable|null */
	private $onComplete;

	/**
	 * DatabaseQueryTask constructor.
	 *
	 * @param string        $query
	 * @param array         $params
	 * @param array         $credentials
	 * @param callable|null $onComplete
	 *
	 */
	public function __construct(string $query, array $params = [], array $credentials = [], ?callable $onComplete = null){
		$this->query = $query;
		$this->params = serialize($params);
		$this->credentials = serialize($credentials);
		$this->onComplete = $onComplete;
	}

	public function onRun() : void{
		$stmt = Database::getDatabase(unserialize($this->credentials), true)->prepare($this->query);
		if($stmt->execute(unserialize($this->params))){
			$this->setResult($stmt->fetchAll());
		}
	}

	public function onCompletion() : void{
		$onComplete = $this->onComplete;
		if($onComplete !== null){
			$onComplete(Server::getInstance(), $this->getResult());
		}
	}
}