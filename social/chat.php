
<?php 
    // Sesión
    require_once 'funciones/sesiones.php';
    // Funciones
    require_once 'funciones/funciones.php';
    //Header
    include_once 'templates/header.php';
    //Barra
    include_once 'templates/barra.php';
    //Navegacion
    include_once 'templates/navegacion.php';
	//Chat
	include_once 'consultas_chat.php';
?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper clearfix">
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row social">
					<!-- Muro Principal -->
					<?php
						$id_session = $_SESSION['id'];
						$sql = "SELECT * FROM miembros WHERE id_miembro = $id_session ";
						$resultado = $conn->query($sql);
						$info_miembro = $resultado->fetch_assoc();
						$chat = new Chat();
					?>
					<div class="col-md-4">

						<!-- Profile Image -->
						<div class="card card-primary card-outline">
							<div class="card-body box-profile">
								<div class="text-center">
									<img class="profile-user-img img-fluid img-circle" src="../img/miembros/<?php echo $info_miembro['img_miembro'] ?>" alt="User profile picture">
								</div>
								<h3 class="profile-username text-center"><?php echo $info_miembro['nombre_miembro'] . " " . $info_miembro['apellido_miembro'] ?></h3>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->

						<!-- Lista de Amigos -->
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Amigos en Fe</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<!-- Contacts are loaded here -->
								<ul class="contacts-list">
									<?php
									$chatUsers = $chat->chatUsers($_SESSION['id']);
									foreach ($chatUsers as $user) {
										$activeUser = '';
									?>
									<li id="<?php echo $user['id_miembro']?>" class="contacto contact <?php echo $activeUser?> " data-touserid="<?php echo $user['id_miembro']?>" data-tousername="<?php echo $user['nombre_miembro']?>">
										<img class="contacts-list-img" src="../img/miembros/<?php echo $user['img_miembro'] ?>" alt="img_<?php echo $user['nombre_miembro'] . " " . $miembro['apellido_miembro'] ?>">
										<div class="lista_contactos">
											<span class="contacts-list-name">
												<?php echo $user['nombre_miembro'] . " " . $user['apellido_miembro'] ?>
											</span>
											<span title="<?php echo $chat->getUnreadMessageCount($user['id_miembro'], $_SESSION['id'])?> Nuevos Mensajes" id="unread_<?php echo $user['id_miembro']?>" class="badge bg-danger float-right unread"><?php echo $chat->getUnreadMessageCount($user['id_miembro'], $_SESSION['id'])?></span>
										</div>
										<!-- /.contacts-list-info -->
									</li>
									<!-- End Contact Item -->
									<?php } ?>
								</ul>
								<!-- /.contatcts-list -->
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->

					<!----------------------------------------------------------------------------------->

					<!-- Chat -->
					<div class="col-md-8">
						<div class="card">

							<div class="card-header p-2">
								<ul class="nav nav-pills">
									<li class="nav-item" id="userSection">
										<a class="nav-link active" href="#activity" data-toggle="tab">Chat</a>
									</li>
								</ul>
							</div><!-- /.card-header -->

							<div class="card-body">
								<!-- Conversations are loaded here -->
								<div class="direct-chat-messages">
									<div class="messages" id="conversation">		
										<?php echo $chat->getUserChat($_SESSION['id'], $currentSession); ?>
										<h3>Bienvenido al Chat de Unidos en Fe, donde encontraras a amigos en Cristo para la eternidad.</h3>
									</div>
								</div>
								<!--/.direct-chat-messages-->
							</div>
							<!-- /.card-body -->

							
							<div class="card-footer">
								<div class="message-input" id="replySection">				
									<div class="message-input" id="replyContainer">
										<div class="input-group">
											<input class="form-control chatMessage" type="text" id="<?php echo $currentSession; ?>" placeholder="Escribe tu mensaje..." />
											<span class="input-group-append">
												<button class="btn btn-success submit chatButton" id="<?php echo $currentSession; ?>">Enviar</button>	
											</span>
										</div>
									</div>					
								</div>

							</div>
							<!-- /.card-footer-->

						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->

					<!-- Chat -->
					<?php //include_once 'templates/chat.php'?>
					<!-- Fin Chat -->
				</div>
				<!-- /.row -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

			
			
<!-- Footer -->
<?php include_once 'templates/footer.php'?>
<!-- Fin Footer -->
