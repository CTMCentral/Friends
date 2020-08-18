<?php

namespace CTMCentral\FriendsList\asynctasks;

use Google\Cloud\Firestore\FirestoreClient;
use pocketmine\scheduler\AsyncTask;

class sendFriendRequestTask extends AsyncTask {

	/**
	 * @var String
	 */
	private $username;
	/**
	 * @var String
	 */
	private $friendsname;

	public function __construct(String $username, String $friendsname, String $projectid){
		$this->username = $username;
		$this->friendsname = $friendsname;
		$this->projectid = $projectid;
	}

	public function onRun(): void{
		$db = new FirestoreClient(['projectId' => $this->projectid]);
		$requests = $db->collection("friends")->document($this->username);

		if($requests->snapshot()->get("requestsentlist") === null) {
			$requests->update(["path" => "requestsentlist", "value" => $this->friendsname]);
		}else{
			$requstlist = $requests->snapshot()->get("requestsentlist");
			array_push($requstlist, $this->friendsname);
			$requests->update(["path" => "requestsentlist", "value" => $requstlist]);
		}

		$requests = $db->collection("friends")->document($this->friendsname);

		if($requests->snapshot()->get("requestlist") === null) {
			$requests->update(["path" => "requestlist", "value" => $this->username]);
			return;
		}else{
			$requstlist = $requests->snapshot()->get("requestlist");
			array_push($requstlist, $this->username);
			$requests->update(["path" => "requestlist", "value" => $requstlist]);
			return;
		}

	}
}