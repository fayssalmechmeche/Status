<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | eZStatus</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="shortcut icon" href="<?php echo base_url("/assets/images/favicon.png"); ?>" />
	<!-- Basic CSS -->


	<link rel="stylesheet" href="<?php echo base_url("/assets/css/style.css"); ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
	<?php require "template/navbar.php" ?>
	<main id="dashboard">
		<div class="main-title">
			Liste des services
		</div>
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
					foreach ($services as $service) {
						echo '
<tr>
<td><a href="' . $service["link"] . '">' . $service["title"] . '</a></td>
<td>' . $service["category"] . '</td>
<td>' . $service["ip"] . '</td>
<td>' . $service["state"] . '</td>
<td>
						<button class="btn btn-info" type="button" data-toggle="modal" data-target="#services-modal">Modifier</button>
					</td>


</tr>';
					}
				}

				?>
				<tr>
					<td><a href="#">Service 1</a></td>
					<td>Sites web</td>
					<td>127.0.0.1</td>
					<td class="d-flex justify-content-center">
						<div class="status warning"></div>
					</td>
					<td>
						<button class="btn btn-info" type="button" data-toggle="modal" data-target="#services-modal">Modifier</button>
					</td>
				</tr>
				<tr>
					<td><a href="#">Service 2</a></td>
					<td>Noms de domaine</td>
					<td>127.0.0.1</td>
					<td class="d-flex justify-content-center">
						<div class="status danger"></div>
					</td>
					<td>
						<button class="btn btn-info" type="button" data-toggle="modal" data-target="#services-modal">Modifier</button>
					</td>
				</tr>
				<tr>
					<td><a href="#">Service 3</a></td>
					<td>Serveurs</td>
					<td>127.0.0.1</td>
					<td class="d-flex justify-content-center">
						<div class="status success"></div>
					</td>
					<td>
						<button class="btn btn-info" type="button" data-toggle="modal" data-target="#services-modal">Modifier</button>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="subtitle">Ajouter un service</div>
		<div class="edit">
			<div class="col-lg-12">
				<?php if (isset($validation)) : ?>
					<div class="alert alert-danger"><?= $validation->listErrors() ?></div>
				<?php endif; ?>
				<form action='/statut/dashboard/service' method='post'>
					<div class="row">
						<div class="form-group col-lg-6">
							<label for="name">Intitulé</label>
							<input type="text" class="form-control" id="title" name="title">
						</div>

						<div class="form-group col-lg-6">
							<label for="link">Lien</label>
							<input type="text" class="form-control" id="link" name="link">
						</div>
						<div class="form-group col-lg-6">
							<label for="hostname">IP/Hôte</label>
							<input type="text" class="form-control" id="ip" name="ip">
						</div>
						<div class="form-group col-lg-12">
							<label for="category">Catégorie</label>
							<select class="form-control" name="category">
								<option selected>Sites web</option>
								<option>Noms de domaine</option>
								<option>Serveurs</option>
							</select>
						</div>
						<div class="form-group col-lg-6">
							<label for="status">Statut</label>
							<select class="form-control" name="status">
								<option selected>En ligne</option>
								<option>Panne partielle</option>
								<option>Maintenance</option>
								<option>Hors-ligne</option>
							</select>
						</div>
						<div class="form-group col-lg-6">
							<label for="monitoring">Monitoring automatique</label>
							<select class="form-control" name="monitoring">
								<option selected>Non</option>
								<option name="yes">Oui</option>
							</select>
						</div>
					</div>
					<button type="submit" class="btn btn-secondary">Ajouter</button>
				</form>
			</div>
		</div>
	</main>
	<div class="modal fade" id="services-modal" tabindex="-1">
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
							<form>
								<div class="row">
									<div class="form-group col-lg-12">
										<label for="name">Intitulé</label>
										<input type="text" class="form-control" id="name" value="test">
									</div>
									<div class="form-group col-lg-12">
										<label for="description">Description</label>
										<input type="text" class="form-control" id="description" value="description">
									</div>
									<div class="form-group col-lg-6">
										<label for="link">Lien</label>
										<input type="text" class="form-control" id="link" value="lien">
									</div>
									<div class="form-group col-lg-6">
										<label for="hostname">IP/Hôte</label>
										<input type="text" class="form-control" id="hostname" value="127.0.0.1">
									</div>
									<div class="form-group col-lg-12">
										<label for="category">Catégorie</label>
										<select class="form-control">
											<option selected>Sites web</option>
											<option>Noms de domaine</option>
											<option>Serveurs</option>
										</select>
									</div>
									<div class="form-group col-lg-6">
										<label for="status">Statut</label>
										<select class="form-control">
											<option selected>En ligne</option>
											<option>Panne partielle</option>
											<option>Maintenance</option>
											<option>Hors-ligne</option>
										</select>
									</div>
									<div class="form-group col-lg-6">
										<label for="monitoring">Monitoring automatique</label>
										<select class="form-control">
											<option selected>Non</option>
											<option>Oui</option>
										</select>
									</div>
									<div class="form-group col-lg-12">
										<label for="message">Message</label>
										<textarea class="form-control" id="message" rows="4"></textarea>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-secondary">Modifier</button>
					<button type="submit" class="btn btn-danger">Supprimer le service</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="categorie-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modifier la catégorie</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="edit">
						<div class="col-lg-12">
							<form>
								<div class="row">
									<div class="form-group col-lg-6">
										<label for="exampleInputEmail1">ID</label>
										<input type="number" class="form-control" value="1">
									</div>
									<div class="form-group col-lg-6">
										<label for="exampleInputEmail1">Nom</label>
										<input type="text" class="form-control" id="text" value="description">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-secondary">Modifier</button>
					<button type="submit" class="btn btn-danger">Supprimer le service</button>
				</div>
			</div>
		</div>
	</div>
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
</body>

</html>