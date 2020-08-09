<?php

namespace CTMCentral\FriendsList\asynctasks;

use CTMCentral\FriendsList\Loader;
use pocketmine\scheduler\AsyncTask;

class removeFriendTask extends AsyncTask {

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
		$player = Loader::getDataBase()->collection("friends")->document($this->username);
		$playersnapshot = $player->snapshot();
		/**
		 * Update friendlist for the user
		 */
			$player->update([["path" => "friendlist", "value" => [$this->friendsname]]]);
			// ty stackoverflow
			if (($key = array_search($this->friendsname, $friendsarray)) !== false) {
				unset($friendsarray[$key]);
			}
			$playerfriends = $playersnapshot->get("friendlist");
			array_push($playerfriends, $this->friendsname);
			$player->update([["path" => "friendlist", "value" => $playerfriends]]);
		/**
		 * Update friendslist for the friend
		 */

		$frienddata =  Loader::getDataBase()->collection("friends")->document($this->friendsname);

		$friendsnapshot = $frienddata->snapshot();

		if($friendsnapshot->data()["friendlist"] === null) {
			$frienddata->update([["path" => "friendlist", "value" => [$this->username]]]);
			return;
		}else{
			$frinedlist = $friendsnapshot->get("friendlist");
			array_push($frinedlist, $this->username);
			$frienddata->update([["path" => "friendlist", "value" => $frinedlist]]);
			return;
		}
	}
}