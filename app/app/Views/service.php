<!doctype html>
<html lang="en">

<?php require "template/header.php" ?>

<body>
	<?php require "template/sidebar.php" ?>
	<?php $session = \Config\Services::session(); ?>

	<main id="dashboard">
		<div class="main-title">
			Liste des services
		</div>

		<?php


		if ($session->getFlashdata('success')) { ?>
			<div class="alert alert-success alert-dismissable fade show"><?= session()->getFlashdata('success') ?>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span> </button>
			</div>
		<?php } ?>
		<?php if (isset($validationModal)) : ?>
			<script>
				$(window).on('load', function() {
					$('#services-modal<?= $id ?>').modal('show');
				});
			</script>

		<?php endif; ?>

		<div class="subtitle">Services</div>

		<table>
			<thead>
				<tr>
					<th>Intitulé</th>
					<th>Catégorie</th>
					<th>IP/Hôte</th>
					<th>Statut</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php

				if ($services) {
					foreach ($services as $service) : ?>

						<tr>
							<td><a href="<?= $service['link'] ?>"><?= $service["title"] ?></a></td>
							<td><?= $service["category"] ?></td>
							<td><?= $service["ip"] ?></td>
							<td><?= $service["state"] ?></td>
							<td>
								<button class="btn btn-info" type="button" data-toggle="modal" onclick="Modal()" id="btn" data-target="#services-modal<?= $service['id'] ?>">Modifier</button>
							</td>


						</tr>
						<div class="modal fade" id="services-modal<?= $service['id'] ?>" tabindex=" -1">

							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Modifier le service</h5>
										<button type="button" id='close' class="close" data-dismiss="modal">
											<span>&times;</span>
										</button>
									</div>
									<div class="modal-body">

										<div class="edit">
											<div class="col-lg-12">
												<?php if (isset($validationModal)) : ?>

													<div class="alert alert-danger"><?= $validationModal->listErrors() ?></div>
												<?php endif; ?>

												<form action="" method="post">
													<div class="row">
														<div class="form-group col-lg-12">
															<label for="name">Intitulé</label>
															<input type="text" class="form-control" id="title" name="title" value="<?= $service['title'] ?>">
														</div>
														<div class="form-group col-lg-12">
															<label for="description">Description</label>
															<input type="text" class="form-control" id="description" name="description" value="<?= $service['description'] ?>">
														</div>
														<div class="form-group col-lg-6" id="link<?= $service['id'] ?>">
															<label for="link">Lien</label>
															<input type="text" class="form-control" name="link" value="<?= $service['link'] ?>">
														</div>
														<div class="form-group col-lg-6" id="ip<?= $service['id'] ?>">
															<label for="hostname">IP/Hôte</label>
															<input type="text" class="form-control" id="hostname" name="ip" value="<?= $service['ip'] ?>">
														</div>
														<div class="form-group col-lg-12">
															<label for="category">Catégorie</label>
															<select name="category" class="form-control">
																<?php if ($categorys) {
																	foreach ($categorys as $category) : ?>
																		<option <?php if ($service['category'] == $category['title']) echo 'selected="selected"' ?>> <?= $category['title'] ?></option>

																<?php endforeach;
																} ?>
															</select>
														</div>
														<div class="form-group col-lg-6" id="state<?= $service['id'] ?>">
															<label for="status">Statut</label>
															<select name="state" class="form-control" id="state">

																<option <?php if ($service['state'] == 'En ligne') echo 'selected="selected"' ?>>En ligne</option>
																<option <?php if ($service['state'] == 'Panne partielle') echo 'selected="selected"' ?>>Panne partielle</option>
																<option <?php if ($service['state'] == 'Maintenance') echo 'selected="selected"' ?>>Maintenance</option>
																<option <?php if ($service['state'] == 'Hors-ligne') echo 'selected="selected"' ?>>Hors-ligne</option>
															</select>
														</div>
														<div class="form-group col-lg-6" id='monitoringContainer<?= $service['id'] ?>'>
															<label for="monitoring">Monitoring automatique</label>
															<select class="form-control" name="monitoring" id="monitoring<?= $service['id'] ?>" onchange="Modal();">
																<option value="0" <?php if ($service['monitoring'] == 0) echo 'selected="selected"' ?>>Non</option>

																<option value="1" <?php if ($service['monitoring'] == 1) echo 'selected="selected"' ?>>Oui</option>
															</select>
														</div>



														<div class="modal-footer">
															<input type="hidden" name="id" value="<?php echo $service["id"]; ?>">
															<button type="submit" class="btn btn-secondary" formaction="<?= route_to('service/update/') ?>">Modifier</button>
															<button type="submit" class="btn btn-danger" formaction="<?= route_to('service/delete/') ?>">Supprimer le service</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
				<?php endforeach;
				} ?>

			</tbody>
		</table>
		<?php
		if ($pager->getPageCount() > 1) {
			echo $pager->links('default', 'full_pagination');
		}


		?>
		<div class="subtitle">Ajouter un service</div>
		<div class="edit">
			<div class="col-lg-12">
				<?php if (isset($validation)) : ?>
					<div class="alert alert-danger"><?= $validation->listErrors() ?></div>
				<?php endif; ?>
				<form action=' <?= route_to('addService') ?>' method='post'>
					<div class="row">
						<div class="form-group col-lg-12">
							<label for="name">Intitulé</label>
							<input type="text" class="form-control" id="title" name="title">
						</div>
						<div class="form-group col-lg-12">
							<label for="description">Description</label>
							<input type="text" class="form-control" id="description" name="description">
						</div>

						<div class="form-group col-lg-6" id="linkPage">
							<label for="link">Lien</label>
							<input type="text" class="form-control" name="link">
						</div>
						<div class="form-group col-lg-6" id="ipPage">
							<label for="hostname">IP/Hôte</label>
							<input type="text" class="form-control" name="ip">
						</div>
						<div class="form-group col-lg-12">
							<label for="category">Catégorie</label>
							<select class="form-control" name="category">
								<?php if ($categorys) {
									foreach ($categorys as $category) : ?>
										<option> <?= $category['title'] ?></option>

								<?php endforeach;
								} ?>

							</select>
						</div>
						<div class="form-group col-lg-6" id="statePage">
							<label for="status">Statut</label>
							<select class="form-control" name="state">

								<option>En ligne</option>
								<option>Panne partielle</option>
								<option>Maintenance</option>
								<option>Hors-ligne</option>
							</select>
						</div>





						<div class="form-group col-lg-6" id="monitoringPageContainer">
							<label for="monitoring">Monitoring automatique</label>
							<select class="form-control" name="monitoring" id="monitoringPage" onchange="contact1();">
								<option value="0">Non</option>

								<option value="1">Oui</option>
							</select>
						</div>

					</div>
					<div>

						<button type="submit" class="btn btn-secondary">Ajouter</button>
					</div>
				</form>
			</div>
		</div>
	</main>


	<script src="js/script.js"></script>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
	</script>
	<script>
		$(function() {
			$('[data-toggle="tooltip"]').tooltip()
		})

		$('#services-modal').on('shown.bs.modal', function() {
			$('#services-edit').trigger('focus')
		})
	</script>


	<script>
		if (document.getElementById("monitoringPage").selectedIndex == 1) {
			document.getElementById('linkPage').className = "form-group col-lg-6";
			document.getElementById("statePage").style.display = "none";
			document.getElementById("ipPage").style.display = "block";
			document.getElementById('linkPage').className = "form-group col-lg-6";
			document.getElementById('monitoringPageContainer').className = "form-group col-lg-12";
		}
		if (document.getElementById("monitoringPage").selectedIndex == 0) {
			document.getElementById('linkPage').className = "form-group col-lg-12";
			document.getElementById("statePage").style.display = "block";
			document.getElementById("ipPage").style.display = "none";
			document.getElementById('linkPage').className = "form-group col-lg-12";
			document.getElementById('monitoringPageContainer').className = "form-group col-lg-6";

		}

		function contact1() {

			if (document.getElementById("monitoringPage").selectedIndex == 1) {
				document.getElementById('linkPage').className = "form-group col-lg-6";
				document.getElementById("statePage").style.display = "none";
				document.getElementById("ipPage").style.display = "block";
				document.getElementById('linkPage').className = "form-group col-lg-6";
				document.getElementById('monitoringPageContainer').className = "form-group col-lg-12";

			}
			if (document.getElementById("monitoringPage").selectedIndex == 0) {
				document.getElementById("statePage").style.display = "block";
				document.getElementById("ipPage").style.display = "none";
				document.getElementById('linkPage').className = "form-group col-lg-12";
				document.getElementById('monitoringPageContainer').className = "form-group col-lg-6";
			}

		}
	</script>


	<script>
		// MODAL

		<?php foreach ($services as $service) : ?>



			$('#services-modal<?= $service['id'] ?>').on('hidden.bs.modal', function() {
				$(this).find('form').trigger('reset');
			})
			if (document.getElementById("monitoring<?= $service['id'] ?>").selectedIndex == 1) {
				document.getElementById("state<?= $service['id'] ?>").style.display = "none";
				document.getElementById("ip<?= $service['id'] ?>").style.display = "block";
				document.getElementById('link<?= $service['id'] ?>').className = "form-group col-lg-6";
				document.getElementById('monitoringContainer<?= $service['id'] ?>').className = "form-group col-lg-12";
			}
			if (document.getElementById("monitoring<?= $service['id'] ?>").selectedIndex == 0) {
				document.getElementById("state<?= $service['id'] ?>").style.display = "block";
				document.getElementById("ip<?= $service['id'] ?>").style.display = "none";
				document.getElementById('link<?= $service['id'] ?>').className = "form-group col-lg-12";
				document.getElementById('monitoringContainer<?= $service['id'] ?>').className = "form-group col-lg-6";
			}
		<?php endforeach; ?>

		function Modal() {
			<?php foreach ($services as $service) : ?>
				if (document.getElementById("monitoring<?= $service['id'] ?>").selectedIndex == 1) {
					document.getElementById("state<?= $service['id'] ?>").style.display = "none";
					document.getElementById("ip<?= $service['id'] ?>").style.display = "block";
					document.getElementById('link<?= $service['id'] ?>').className = "form-group col-lg-6";
					document.getElementById('monitoringContainer<?= $service['id'] ?>').className = "form-group col-lg-12";
				}
				if (document.getElementById("monitoring<?= $service['id'] ?>").selectedIndex == 0) {
					document.getElementById("state<?= $service['id'] ?>").style.display = "block";
					document.getElementById("ip<?= $service['id'] ?>").style.display = "none";
					document.getElementById('link<?= $service['id'] ?>').className = "form-group col-lg-12";
					document.getElementById('monitoringContainer<?= $service['id'] ?>').className = "form-group col-lg-6";
				}
			<?php endforeach; ?>

		}
	</script>






</body>

</html>