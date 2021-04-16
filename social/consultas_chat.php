<?php
	class Chat{
		private $host  = 'localhost';
		private $user  = 'root';
		private $password   = "root";
		private $database  = "unidosenfe";      
		private $chatTable = 'chat';
		private $chatUsersTable = 'miembros';
		private $dbConnect = false;
		public function __construct(){
			if(!$this->dbConnect){ 
				$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
				if($conn->connect_error){
					die("Error failed to connect to MySQL: " . $conn->connect_error);
				}else{
					$this->dbConnect = $conn;
				}
			}
		}
		private function getData($sqlQuery) {
			$result = mysqli_query($this->dbConnect, $sqlQuery);
			if(!$result){
				die('Error in query: '. mysqli_error($conn));
			}
			$data= array();
			/*while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {*/
			while ($row = mysqli_fetch_assoc ($result)) {
				$data[]=$row;            
			}
			return $data;
		}
		private function getNumRows($sqlQuery) {
			$result = mysqli_query($this->dbConnect, $sqlQuery);
			if(!$result){
				die('Error in query: '. mysqli_error($conn));
			}
			$numRows = mysqli_num_rows($result);
			return $numRows;
		}	
		public function chatUsers($userid){
			$sqlQuery = "
				SELECT * FROM ".$this->chatUsersTable." 
				WHERE id_miembro != '$userid'";
			return  $this->getData($sqlQuery);
		}
		public function getUserDetails($userid){
			$sqlQuery = "
				SELECT * FROM ".$this->chatUsersTable." 
				WHERE id_miembro = '$userid'";
			return  $this->getData($sqlQuery);
		}
		public function getUserAvatar($userid){
			$sqlQuery = "
				SELECT img_miembro 
				FROM ".$this->chatUsersTable." 
				WHERE id_miembro = '$userid'";
			$userResult = $this->getData($sqlQuery);
			$userAvatar = '';
			foreach ($userResult as $user) {
				$userAvatar = $user['img_miembro'];
			}	
			return $userAvatar;
		}
		public function getUserName($userid){
			$sqlQuery = "
				SELECT nombre_miembro, apellido_miembro 
				FROM ".$this->chatUsersTable." 
				WHERE id_miembro = '$userid'";
			$userResult = $this->getData($sqlQuery);
			$userName = '';
			foreach ($userResult as $user) {
				$userName = $user['nombre_miembro'] . " " . $user['apellido_miembro'];
			}	
			return $userName;
		}
		
		public function insertChat($reciever_userid, $user_id, $chat_message) {		
			$sqlInsert = "
				INSERT INTO ".$this->chatTable." 
				(id_sender, id_reciever, mensaje, estado) 
				VALUES ('".$user_id."', '".$reciever_userid."', '".$chat_message."', '1')";
			$result = mysqli_query($this->dbConnect, $sqlInsert);
			if(!$result){
				return ('Error in query: '. mysqli_error($conn));
			} else {
				$conversation = $this->getUserChat($user_id, $reciever_userid);
				$data = array(
					"conversation" => $conversation			
				);
				echo json_encode($data);
			}
		}
		public function getUserChat($from_user_id, $to_user_id) {
			$senderName = $this->getUserName($from_user_id);
			$recieverName = $this->getUserName($to_user_id);
			$fromUserAvatar = $this->getUserAvatar($from_user_id);	
			$toUserAvatar = $this->getUserAvatar($to_user_id);		
			$sqlQuery = "
				SELECT * FROM ".$this->chatTable." 
				WHERE (id_sender = '".$from_user_id."' 
				AND id_reciever = '".$to_user_id."') 
				OR (id_sender = '".$to_user_id."' 
				AND id_reciever = '".$from_user_id."') 
				ORDER BY fecha ASC	";
			$userChat = $this->getData($sqlQuery);
			
			foreach($userChat as $chat){
				$user_name = '';
				if($chat["id_sender"] == $from_user_id) {
					$conversation .= '<!-- Message. Default to the left -->
					<div class="direct-chat-msg message" >
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$senderName.'</span>
							<span class="direct-chat-timestamp float-right">'.$chat['fecha'].'</span>
						</div>
						<!-- /.direct-chat-infos -->
						<img class="direct-chat-img uploaded_image" src="../img/miembros/'.$fromUserAvatar.'" alt="Message User Image">
						<!-- /.direct-chat-img -->
						<div class="direct-chat-text">
							<p>'.$chat["mensaje"].'</p>
						</div>
						<!-- /.direct-chat-text -->		
					</div>
					<!-- direct-chat-msg -->';
				} else {
					$conversation .= '<!-- Message to the right -->
					<div class="direct-chat-msg right">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-right">'.$recieverName.'</span>
							<span class="direct-chat-timestamp float-left">'.$chat['fecha'].'</span>
						</div>
						<!-- /.direct-chat-infos -->
						<img class="direct-chat-img" src="../img/miembros/'.$toUserAvatar.'" alt="Message User Image">
						<!-- /.direct-chat-img -->
						<div class="direct-chat-text">
							<p>'.$chat["mensaje"].'</p>
						</div>
						<!-- /.direct-chat-text -->
					</div>
					<!-- /.direct-chat-msg -->';
				}
			}
			return $conversation;
		}
		public function showUserChat($from_user_id, $to_user_id) {		
			$userDetails = $this->getUserDetails($to_user_id);
			$toUserAvatar = '';
			foreach ($userDetails as $user) {
				$toUserAvatar = $user['img_miembro'];
				$userSection = '<a class="nav-link active" href="#activity" data-toggle="tab">'.$user['nombre_miembro'].' '.$user['apellido_miembro'].'</a>';
			}		
			// get user conversation
			$conversation = $this->getUserChat($from_user_id, $to_user_id);	
			// update chat user read status		
			$sqlUpdate = "
				UPDATE ".$this->chatTable." 
				SET estado = '0' 
				WHERE id_sender = '".$to_user_id."' AND id_reciever = '".$from_user_id."' AND estado = '1'";
			mysqli_query($this->dbConnect, $sqlUpdate);
			$data = array(
				"userSection" => $userSection,
				"conversation" => $conversation			
			);
			echo json_encode($data);		
		}	
		public function getUnreadMessageCount($senderUserid, $recieverUserid) {
			$sqlQuery = "
				SELECT * FROM ".$this->chatTable."  
				WHERE id_sender = '$senderUserid' AND id_reciever = '$recieverUserid' AND estado = '1'";
			$numRows = $this->getNumRows($sqlQuery);
			$output = '0';
			if($numRows > 0){
				$output = $numRows;
			}
			return $output;
		}	
	}
?>