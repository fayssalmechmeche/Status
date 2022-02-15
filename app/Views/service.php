<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | eZStatus</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" name="meta_description" content="<?= $meta['meta_description'] ?>">
	<meta name="title" name="meta_title" content="<?= $meta['meta_title'] ?>">

	<link rel="shortcut icon" href="<?php echo base_url("/assets/images/favicon.png"); ?>" />
	<!-- Basic CSS -->


	<link rel="stylesheet" href="<?php echo base_url("/assets/css/style.css"); ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
	<?php require "template/sidebar.php" ?>
	<?php $session = \Config\Services::session();

	if ($session->getFlashdata('success')) {
		echo '
            <div class="alert alert-success">' . $session->getFlashdata("success") . '</div>
            ';
	} ?>
	<main id="dashboard">
		<div class="main-title">
			Liste des services
		</div>
		<div class="subtitle">Services</div>
		<?php echo $pager->links('default', 'full_pagination');

		?>
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
							<?php if (isset($validationModal)) : ?>
								<div class="alert alert-danger"><?= $validationModal->listErrors() ?></div>
							<?php endif; ?>
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Modifier le service</h5>
										<button type="button" class="close" data-dismiss="modal">
											<span>&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="edit">
											<div class="col-lg-12">
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
														<div class="form-group col-lg-6">
															<label for="link">Lien</label>
															<input type="text" class="form-control" id="link" name="link" value="<?= $service['link'] ?>">
														</div>
														<div class="form-group col-lg-6" id="ip">
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
														<div class="form-group col-lg-6" id="state">
															<label for="status">Statut</label>
															<select name="state" class="form-control">

																<option <?php if ($service['state'] == 'En ligne') echo 'selected="selected"' ?>>En ligne</option>
																<option <?php if ($service['state'] == 'Panne partielle') echo 'selected="selected"' ?>>Panne partielle</option>
																<option <?php if ($service['state'] == 'Maintenance') echo 'selected="selected"' ?>>Maintenance</option>
																<option <?php if ($service['state'] == 'Hors-ligne') echo 'selected="selected"' ?>>Hors-ligne</option>
															</select>
														</div>
														<div class="form-group col-lg-6">
															<label for="monitoring">Monitoring automatique</label>
															<select class="form-control" name="monitoring" id="monitoring" onchange="Modal();">
																<option value="0">Non</option>
																<option value="1">Oui</option>
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
		<div class="subtitle">Ajouter un service</div>
		<div class="edit">
			<div class="col-lg-12">
				<?php if (isset($validation)) : ?>
					<div class="alert alert-danger"><?= $validation->listErrors() ?></div>
				<?php endif; ?>
				<form action=' <?= route_to('addService') ?>' method='post'>
					<div class="row">
						<div class="form-group col-lg-6">
							<label for="name">Intitulé</label>
							<input type="text" class="form-control" id="title" name="title">
						</div>

						<div class="form-group col-lg-6">
							<label for="link">Lien</label>
							<input type="text" class="form-control" id="link" name="link">
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
						<div class=" form-group col-lg-6">
							<label for="monitoring">Monitoring automatique</label>
							<select class="form-control" name="monitoring" id="monitoringPage" onchange="contact1();">

								<option value="0">Non</option>
								<option value="1">Oui</option>

							</select>
						</div>
					</div>
					<button type="submit" class="btn btn-secondary">Ajouter</button>
				</form>
			</div>
		</div>
	</main>


	<script src="js/script.js"></script>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
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
		$(document).ready(function() {
			$(".modal").on("hidden.bs.modal", function() {
				$(".modal-body").removeData('bs.modal');
			});
		});
	</script>

	<script>
		if (document.getElementById("monitoringPage").selectedIndex == 1) {
			document.getElementById("statePage").style.display = "none";
			document.getElementById("ipPage").style.display = "block";
		}
		if (document.getElementById("monitoringPage").selectedIndex == 0) {
			document.getElementById("statePage").style.display = "block";
			document.getElementById("ipPage").style.display = "none";
		}

		function contact1() {

			if (document.getElementById("monitoringPage").selectedIndex == 1) {
				document.getElementById("statePage").style.display = "none";
				document.getElementById("ipPage").style.display = "block";
			}
			if (document.getElementById("monitoringPage").selectedIndex == 0) {
				document.getElementById("statePage").style.display = "block";
				document.getElementById("ipPage").style.display = "none";
			}

		}


		var elms = document.querySelectorAll("[id='btn']");
		elms[i].addEventListener("click", Modal);
		var elms = document.querySelectorAll("[id='monitoring']");
		for (var i = 0; i < elms.length; i++)
			if (elms[i].selectedIndex == 1) {

				var elms = document.querySelectorAll("[id='state']");
				for (var i = 0; i < elms.length; i++)
					elms[i].style.display = 'none';

				var elms = document.querySelectorAll("[id='ip']");
				for (var i = 0; i < elms.length; i++)
					elms[i].style.display = 'block';
			}
		for (var i = 0; i < elms.length; i++)
			if (elms[i].selectedIndex == 0) {

				var elms = document.querySelectorAll("[id='state']");
				for (var i = 0; i < elms.length; i++)
					elms[i].style.display = 'block';

				var elms = document.querySelectorAll("[id='ip']");
				for (var i = 0; i < elms.length; i++)
					elms[i].style.display = 'none';
			}

		function Modal() {
			var elms = document.querySelectorAll("[id='monitoring']");
			for (var i = 0; i < elms.length; i++)
				if (elms[i].selectedIndex == 1) {

					var elms = document.querySelectorAll("[id='state']");
					for (var i = 0; i < elms.length; i++)
						elms[i].style.display = 'none';

					var elms = document.querySelectorAll("[id='ip']");
					for (var i = 0; i < elms.length; i++)
						elms[i].style.display = 'block';
				}
			for (var i = 0; i < elms.length; i++)
				if (elms[i].selectedIndex == 0) {

					var elms = document.querySelectorAll("[id='state']");
					for (var i = 0; i < elms.length; i++)
						elms[i].style.display = 'block';

					var elms = document.querySelectorAll("[id='ip']");
					for (var i = 0; i < elms.length; i++)
						elms[i].style.display = 'none';
				}

		}
	</script>



</body>

</html>