<?php

namespace CTMCentral\Friends\asynctasks;

use Google\Cloud\Firestore\FirestoreClient;
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
	/**
	 * @var array
	 */
	private $json;

	public function __construct(String $username, String $friendsname, array $json){
		$this->username = $username;
		$this->friendsname = $friendsname;
		$this->json = $json;
	}

	public function onRun(): void{
		$db = new FirestoreClient(['projectId' => $this->json]);
		$player = $db->collection("friends")->document($this->username);
		$playersnapshot = $player->snapshot();
		/**
		 * Update friendlist for the user
		 */
		if($playersnapshot["friendlist"] === null) {
			$player->update([["path" => "friends", "value" => [$this->friendsname]]]);
		}else{
			$playerfriends = $playersnapshot->get("friendlist");
			array_push($playerfriends, $this->friendsname);
			$player->update([["path" => "friends", "value" => $playerfriends]]);
		}
		/**
		 * Update friendslist for the friend
		 */

		$frienddata =  $db->collection("friends")->document($this->friendsname);

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