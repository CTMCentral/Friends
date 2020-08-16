<?php

namespace CTMCentral\FriendsList\asynctasks;

use CTMCentral\FriendsList\Database;
use pocketmine\scheduler\AsyncTask;

class addFriendTask extends AsyncTask {

	/**
	 * @var String
	 */
	private $friendsname;
	/**
	 * @var String
	 */
	private $username;

	public function __construct(String $username, String $friendsname){
		$this->username = $username;
		$this->friendsname = $friendsname;
	}

	public function onRun(): void{
		$player = Database::getDataBase()->collection("friends")->document($this->username);
		$playersnapshot = $player->snapshot();
		/**
		 * Update friendlist for the user
		 */
		if($playersnapshot["friendlist"] === null) {
			$player->update([["path" => "friends", "value" => [$this->friendsname]]]);
		}else{
			$playerfriends = $playersnapshot->get("friends");
			array_push($playerfriends, $this->friendsname);
			$player->update([["path" => "friends", "value" => $playerfriends]]);
		}
		/**
		 * Update friendslist for the friend
		 */

		$frienddata =  Database::getDataBase()->collection("friends")->document($this->friendsname);

		$friendsnapshot = $frienddata->snapshot();

		if($friendsnapshot->data()["friendlist"] === null) {
			$frienddata->update([["path" => "friends", "value" => [$this->username]]]);
			return;
		}else{
			$frinedlist = $friendsnapshot->get("friends");
			array_push($frinedlist, $this->username);
			$frienddata->update([["path" => "friends", "value" => $frinedlist]]);
			return;
		}
	}
}