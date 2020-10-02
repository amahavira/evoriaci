<!-- End of Main Content -->
<br>
<!-- Footer -->
<div class="container-fluid">
	<div class="footer" style="bottom: 0px">
		<footer class="py-3">
			<div class="container">
				<p class="m-0 text-center" style="color: #7E4A9E;">2020 &copy; EVORIA - Axel Indonesia</p>
			</div>
		</footer>
	</div>
</div>
<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>

<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script>
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});
</script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/chart.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bs-init.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="<?php echo base_url('assets/js/theme.js') ?>"></script>
</body>

</html>
