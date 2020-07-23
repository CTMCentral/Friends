<?php
declare(strict_types=1);

namespace CTMCentral\FriendsList\mysql;

use CTMcentral\FriendsList\mysql\tasks\BulkDatabaseQueryTask;
use CTMcentral\FriendsList\mysql\tasks\DatabaseQueryTask;
use PDO;
use PDOException;
use pocketmine\Server;
use function is_array;

class Database{

	/** @var PDO */
	private static $database;
	/** @var mixed[] */
	private static $credentials = [];

	public static function load(string $host, string $schema, string $user, string $password) : void{
		self::$credentials = [
			"host" => $host,
			"schema" => $schema,
			"user" => $user,
			"password" => $password
		];
		self::$database = $database = self::getDatabase(self::$credentials, true);
		$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$database->exec("CREATE TABLE IF NOT EXISTS friends(username TEXT NOT NULL, friendlist TEXT, enabled BOOL);");
	}

	/**
	 * @param bool  $new
	 * @param array $credentials
	 *
	 * @return PDO
	 */
	public static function getDatabase(array $credentials, bool $new = false) : PDO{
		return $new ? new PDO("mysql:host=" . $credentials["host"] . ";dbname=" . $credentials["schema"], $credentials["user"], $credentials["password"]) : self::$database;
	}

	/**
	 * @param string $query
	 * @param array  $params
	 *
	 * @return mixed[]
	 */
	public static function querySync(string $query, array $params = []) : array{
		try{
			$stmt = self::$database->prepare($query);
			if($stmt->execute($params)){
				$retval = $stmt->fetchAll();

				return is_array($retval) ? $retval : [];
			}
		}catch(PDOException $exception){

			Server::getInstance()->getLogger()->error($exception->getMessage());

			return [];
		}

		return [];
	}

	/**
	 * @param string        $query
	 * @param array         $params
	 * @param callable|null $onComplete
	 */
	public static function queryAsync(string $query, array $params = [], ?callable $onComplete = null) : void{
		Server::getInstance()->getAsyncPool()->submitTask(new DatabaseQueryTask($query, $params, self::$credentials, $onComplete));
	}

	/**
	 * @param array $queries
	 */
	public static function bulkQuerySync(array $queries = []) : void{
		foreach($queries as $query){
			try{
				$stmt = self::$database->prepare($query["query"] ?? "");
				$stmt->execute($query["params"] ?? []);
			}catch(PDOException $exception){
				Server::getInstance()->getLogger()->error($exception->getMessage());
			}
		}
	}

	/**
	 * @param array $queries
	 */
	public static function bulkQueryAsync(array $queries = []) : void{
		Server::getInstance()->getAsyncPool()->submitTask(new BulkDatabaseQueryTask($queries, self::$credentials));
	}
}