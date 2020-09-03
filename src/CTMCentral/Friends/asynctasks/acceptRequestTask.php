<?php

namespace CTMCentral\Friends\asynctasks;

use CTMCentral\Friends\Database;
use CTMCentral\Friends\exceptions\RequestNotFound;
use pocketmine\scheduler\AsyncTask;

class acceptRequestTask extends AsyncTask {

	/**
	 * @var String
	 */
	private $username;
	/**
	 * @var String
	 */
	private $friendname;
	/**
	 * @var array
	 */
	private $json;

	public function __construct(String $username, String $friendname, array $json){
		$this->username = $username;
		$this->friendname = $friendname;
		$this->json = $json;
	}

	public function onRun(): void{
		$db = (new Database())::getDataBase();
		$requestsentlist = $db->collection("friends")->document($this->username)->snapshot();
		if (!array_search($this->friendname, $requestsentlist->get("requestsentlist"))) {
			throw new RequestNotFound();
		}

		if (($key = array_search($this->username, $requestsentlist[0]["requestsentlist"])) !== false) {
			unset($requestsentlist[$key]);
			$db->collection("friends")->document($this->username)->update([["path" => "requestsentlist", "value" => $requestsentlist]]);
		}

		$requestlist = $db->collection("friends")->document($this->friendname)->snapshot();
		if (($key = array_search($this->friendname, $requestlist[0]["requestlist"])) !== false) {
			unset($requestlist[$key]);
			$db->collection("friends")->document($this->username)->update([["path" => "requestlist", "value" => $requestlist]]);
		}
	}
}