<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Starter</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?= base_url('dist/plugins/fontawesome-free/css/all.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>">
	<!-- Select2 css -->
	<link rel="stylesheet" href="<?= base_url('dist/plugins/select2/css/select2.css') ?>">
	</link>
	<!-- datatables css -->
	<link rel="stylesheet" href="<?= base_url('dist/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>">
	<!-- datatables css -->
	<link rel="stylesheet" href="<?= base_url('dist/plugins/datatables-bs4/css/responsive.bootstrap4.css') ?>">
	<!-- css animate -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<!-- jquery-ui css -->
	<link rel="stylesheet" href="<?= base_url('dist/plugins/jquery-ui/jquery-ui.min.css') ?>" />



	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<script src="<?= base_url('dist/plugins/jquery/jquery.min.js') ?>"></script>
	<!-- jQuery-ui -->
	<script src="<?= base_url('dist/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('dist/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('dist/js/adminlte.min.js') ?>"></script>
	<!-- jQuery Validation App -->
	<script src="<?= base_url('dist/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
	<!-- Toastr js -->
	<script src="<?= base_url('dist/plugins/toastr/toastr.min.js') ?>"></script>
	<!-- Sweetalert js -->
	<script src="<?= base_url('dist/plugins/sweetalert2/sweetalert2.all.js') ?>"></script>
	<!-- Select2 js -->
	<script src="<?= base_url('dist/plugins/select2/js/select2.full.min.js') ?>"></script>
	<!-- datatables js -->
	<script src="<?= base_url('dist/plugins/datatables/jquery.dataTables.js') ?>"></script>
	<script src="<?= base_url('dist/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
	<script src="<?= base_url('dist/plugins/datatables-bs4/js/dataTables.responsive.js') ?>"></script>
	<script src="<?= base_url('dist/plugins/datatables-bs4/js/responsive.bootstrap4.js') ?>"></script>
	<style>
		.btn-group-xs>.btn,
		.btn-xs {
			padding: .25rem .4rem;
			font-size: .875rem;
			line-height: .5;
			border-radius: .2rem;
		}
		.fas{
			margin-right: 0 !important;
		}
		body{
			overflow: overlay;
		}

		::-webkit-scrollbar{
			background: transparent;
		}

		::-webkit-scrollbar-thumb{
			background: lightgray;
			border-radius: 10px;
		}

		::-webkit-scrollbar-corner{
			border-radius: 10px;
			background: lightgray;
		}
	</style>
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">

				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="index3.html" class="nav-link">Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">Contact</a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-bell"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('account') ?>" class="dropdown-item d-flex justify-content-end">
							<button class="btn btn-sm btn-danger"> <i class="fas fa-times"></i> Logout</button>
						</a>
					</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index3.html" class="brand-link">
				<img src="<?= base_url('dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">AdminLTE 3</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?= base_url('dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block"><?php echo "{$_SESSION['firstname']} {$_SESSION['lastname']}"; ?></a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<?php $this->load->view('template_nav'); ?>

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
					<?php $this->load->view($content); ?>
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
			<div class="p-3">
				<h5>Title</h5>
				<p>Sidebar content</p>
			</div>
		</aside>
		<!-- /.control-sidebar -->

		<!-- Main Footer -->
		<footer class="main-footer">
			<!-- To the right -->
			<div class="float-right d-none d-sm-inline">
				Anything you want
			</div>
			<!-- Default to the left -->
			<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- Modal -->
	<div class="modal fade" id="newtask" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="modalform" action="" id="modalform">
					<div class="modal-body">
						<div class="form-group" style="display: none;">
							<input type="text" name="todoid" class="form-control" id="taskid">
						</div>
						<div class="form-group">
							<label for="todotask">Todo task</label>
							<input type="text" name="todotask" class="form-control" id="todotask" placeholder="Task name here..." required>
						</div>

						<div class="form-group">
							<label for="todostartdate">Start Date</label>
							<input type="date" name="todostartdate" onchange="" class="form-control date" id="taskstartdate" placeholder="Title...">
						</div>

						<div class="form-group">
							<label for="todoenddate">Due Date</label>
							<input type="date" name="todoenddate" class="form-control date" id="taskenddate" placeholder="Title...">
						</div>
						<div class="form-group status">
							<label for="todostatus">Status</label>
							<select class="form-control" name="todostatus">
								<option value="To Do" selected>To Do</option>
								<option value="In-progress">In-progress</option>
								<option value="Hold">Hold</option>
								<option value="Done">Done</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="uni_modal" tabindex="-1" role="dialog" aria-labelledby="uni_modal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="uni_modaltitle">Add new notebook</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="uni_modalbody">
				</div>
				<div class="modal-footer" id="uni_modalfooter">
					<button type="button" onclick="$('#uni_modal').find('form').submit()" class="btn btn-primary">Create</button>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
<script>
	$(document).ready(function() {

		$('#newtask').on('hidden.bs.modal', function() {
			$("#taskid").val('');
			$("#todotask").val('');
		});

		$('#newtask').on('show.bs.modal', function() {
			if ($("#taskid").val() == '') {
				$(".status").hide();
			}
		});

		Date.prototype.toDateInputValue = (function() {
			var local = new Date(this);
			local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
			return local.toJSON().slice(0, 10);
		});

		$('.date').val(new Date().toDateInputValue());

		window.uni_modal = function($title = '', $url = '', $size = "") {
			$.ajax({
				url: $url,
				error: err => {
					console.log()
					alert("An error occured")
				},
				success: function(resp) {
					if (resp) {
						$('#uni_modal .modal-title').html($title)
						$('#uni_modal .modal-body').html(resp)
						if ($size != '') {
							$('#uni_modal .modal-dialog').addClass($size)
						} else {
							$('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md modal-dialog-centered")
						}
						$('#uni_modal').modal({
							show: true,
							backdrop: 'static',
							keyboard: false,
							focus: true
						})
					}
				}
			})
		}
	});
</script>