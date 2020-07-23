<?php
declare(strict_types=1);

namespace CTMcentral\FriendsList\mysql\tasks;

use CTMCentral\FriendsList\mysql\Database;
use pocketmine\scheduler\AsyncTask;
use function serialize;
use function unserialize;

class BulkDatabaseQueryTask extends AsyncTask{

	/** @var string */
	private $queries;

	/** @var string */
	private $credentials;

	/**
	 * BulkDatabaseQueryTask constructor.
	 *
	 * @param array $queries
	 * @param array $credentials
	 *
	 */
	public function __construct(array $queries = [], array $credentials = []){
		$validQueries = [];
		foreach($queries as $query){
			if(isset($query["query"])){
				$validQueries[] = [
					"query" => $query["query"],
					"params" => serialize($query["params"] ?? [])
				];
			}
		}
		$this->queries = serialize($validQueries);

		$this->credentials = serialize($credentials);
	}

	public function onRun() : void{
		$database = Database::getDatabase(unserialize($this->credentials), true);
		foreach(unserialize($this->queries) as $query){
			$stmt = $database->prepare($query["query"]);
			$stmt->execute(unserialize($query["params"]));
		}
	}
}