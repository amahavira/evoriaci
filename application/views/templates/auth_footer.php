<!-- Modal Add Product-->
<div class="modal fade" id="help" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" style="border-radius: 10px">
			<div class="modal-header text-light" style="background-color: #7E4A9E; border-radius: 10px 10px 0px 0px">
				<h4>Butuh Bantuan? Silahkan Hubungi Kami</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="form-group">
					<h5 style="text-align: center;">Silahkan Hubungi Email Kami :</h5>
				</div>

				<div class="form-group">
					<h4 style="text-align: center;">evoriaaxelindonesia@gmail.com</h4>
				</div>

			</div>
			<div class="modal-footer text-center">
				<button data-dismiss="modal" class="btn btn-outline-light" style="background-color: #7E4A9E; margin:auto;">OK</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Add Product-->
<br>
<!-- Footer -->
<div class="container-fluid" style="bottom: 0px">
	<footer class="py-3">
		<div class="container">
			<p class="m-0 text-center" style="color: #7E4A9E;">2020 &copy; EVORIA - Axel Indonesia</p>
		</div>
	</footer>
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script>
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});
</script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
</body>

</html>
