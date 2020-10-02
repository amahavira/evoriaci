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
