<?php
	// Sesión
	require_once 'funciones/sesiones.php';
	// Consulta de Datos
	include 'consultas_chat.php';
	
	$chat = new Chat();
	if($_POST['action'] == 'update_user_list') {
		$chatUsers = $chat->chatUsers($_SESSION['id']);
		$data = array(
			"profileHTML" => $chatUsers,	
		);
		echo json_encode($data);	
	}
	if($_POST['action'] == 'insert_chat') {
		$chat->insertChat($_POST['to_user_id'], $_SESSION['id'], $_POST['chat_message']);
	}
	if($_POST['action'] == 'show_chat') {
		$chat->showUserChat($_SESSION['id'], $_POST['to_user_id']);
	}
	if($_POST['action'] == 'update_user_chat') {
		$conversation = $chat->getUserChat($_SESSION['id'], $_POST['to_user_id']);
		$data = array(
			"conversation" => $conversation			
		);
		echo json_encode($data);
	}
	if($_POST['action'] == 'update_unread_message') {
		$count = $chat->getUnreadMessageCount($_POST['to_user_id'], $_SESSION['id']);
		$data = array(
			"count" => $count			
		);
		echo json_encode($data);
	}	
?>