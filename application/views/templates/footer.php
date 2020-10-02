    <br>
    <div class="container-fluid" style="background-color: #fafafa;">
    	<div class="container" style="padding:30px; ">
    		<div class="row justify-content-between">
    			<div class="col-sm-6 col-md-6 col-xl-3" style="color: #7E4A9E;">
    				<div class="single-footer-widget footer_1">
    					<a href="index.html"> <img src="<?php echo base_url('assets/gambar/logo/evoria.png') ?>" width="100px" height="auto" alt=""> </a>
    					<p>But when shot real her. Chamber her one visite removal six
    						sending himself boys scot exquisite existend an </p>
    					<p>But when shot real her hamber her </p>
    				</div>
    			</div>
    			<div class="col-sm-6 col-md-6 col-xl-4" style="color: #7E4A9E;">
    				<div class="single-footer-widget footer_2">
    					<h4>Newsletter</h4>
    					<p>Stay updated with our latest trends Seed heaven so said place winged over given forth fruit.
    					</p>
    					<form action="#">
    						<div class="form-group">
    							<div class="input-group mb-3">
    								<input type="text" class="form-control" placeholder='Enter email address' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
    								<div class="input-group-append">
    									<button class="btn" type="button"><i class="ti-angle-right"></i></button>
    								</div>
    							</div>
    						</div>
    					</form>
    				</div>
    			</div>
    			<div class="col-sm-12 col-md-8 col-xl-3" style="color: #7E4A9E;">
    				<div class="single-footer-widget footer_3">
    					<h4>Instagram</h4>
    					<h5>@axelevoria</h5>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    </div>


    <!-- Footer -->
    <div class="footer" style="bottom: 0px">
    	<footer class="py-3">
    		<div class="container">
    			<p class="m-0 text-center" style="color: #7E4A9E;">2020 &copy; EVORIA - Axel Indonesia</p>
    		</div>
    	</footer>
    </div>

    <!-- </div> -->
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
    				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">×</span>
    				</button>
    			</div>
    			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
    			<div class="modal-footer">
    				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    				<a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
    			</div>
    		</div>
    	</div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <script type="text/javascript">
    	$('#myCarousel').carousel({
    		interval: 3000,
    	})
    </script>


    <script>
    	$('.custom-file-input').on('change', function() {
    		let fileName = $(this).val().split('\\').pop();
    		$(this).next('.custom-file-label').addClass("selected").html(fileName);
    	});


    	$('.form-check-input').on('click', function() {
    		const menuId = $(this).data('menu');
    		const roleId = $(this).data('role');

    		$.ajax({
    			url: "<?= base_url('admin/changeaccess'); ?>",
    			type: 'POST',
    			data: {
    				menuId: menuId,
    				roleId: roleId
    			},
    			success: function() {
    				document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
    			}
    		})
    	});
    </script>
    </body>

    </html>
