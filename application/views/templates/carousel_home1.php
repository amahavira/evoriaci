<style type="text/css">
	#myCarousel .carousel-item .mask {
		position: absolute;
		top: 0;
		left: 0;
		height: 100%;
		width: 100%;
		background-attachment: fixed;
	}

	#myCarousel h4 {
		font-size: 50px;
		margin-bottom: 15px;
		color: #FFF;
		line-height: 100%;
		letter-spacing: 0.5px;
		font-weight: 600;
	}

	#myCarousel p {
		font-size: 18px;
		margin-bottom: 15px;
		color: #d5d5d5;
	}

	#myCarousel .carousel-item a {
		background: #F47735;
		font-size: 14px;
		color: #FFF;
		padding: 13px 32px;
		display: inline-block;
	}

	#myCarousel .carousel-item a:hover {
		background: #394fa2;
		text-decoration: none;
	}

	#myCarousel .carousel-item h4 {
		-webkit-animation-name: fadeInLeft;
		animation-name: fadeInLeft;
	}

	#myCarousel .carousel-item p {
		-webkit-animation-name: slideInRight;
		animation-name: slideInRight;
	}

	#myCarousel .carousel-item a {
		-webkit-animation-name: fadeInUp;
		animation-name: fadeInUp;
	}

	#myCarousel .carousel-item .mask img {
		-webkit-animation-name: slideInRight;
		animation-name: slideInRight;
		display: block;
		height: auto;
		max-width: 100%;
	}

	#myCarousel h4,
	#myCarousel p,
	#myCarousel a,
	#myCarousel .carousel-item .mask img {
		-webkit-animation-duration: 1s;
		animation-duration: 1.2s;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
	}

	#myCarousel .container {
		max-width: 1430px;
	}

	#myCarousel .carousel-item {
		height: 400px;
	}

	#myCarousel {
		position: relative;
		z-index: 1;
		background: url("<?php echo base_url('assets/gambar/bg/bgpurple1.jpg') ?>") center center no-repeat;
		background-size: cover;
	}

	.carousel-control-next,
	.carousel-control-prev {
		height: 40px;
		width: 40px;
		padding: 12px;
		top: 50%;
		bottom: auto;
		transform: translateY(-50%);
		background-color: #7E4A9E;
	}

	.carousel-fade .carousel-item {
		opacity: 0;
		-webkit-transition-duration: .6s;
		transition-duration: .6s;
		-webkit-transition-property: opacity;
		transition-property: opacity
	}

	.carousel-fade .carousel-item-next.carousel-item-left,
	.carousel-fade .carousel-item-prev.carousel-item-right,
	.carousel-fade .carousel-item.active {
		opacity: 1
	}

	.carousel-fade .carousel-item-left.active,
	.carousel-fade .carousel-item-right.active {
		opacity: 0
	}

	.carousel-fade .carousel-item-left.active,
	.carousel-fade .carousel-item-next,
	.carousel-fade .carousel-item-prev,
	.carousel-fade .carousel-item-prev.active,
	.carousel-fade .carousel-item.active {
		-webkit-transform: translateX(0);
		-ms-transform: translateX(0);
		transform: translateX(0)
	}

	@supports (transform-style:preserve-3d) {

		.carousel-fade .carousel-item-left.active,
		.carousel-fade .carousel-item-next,
		.carousel-fade .carousel-item-prev,
		.carousel-fade .carousel-item-prev.active,
		.carousel-fade .carousel-item.active {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0)
		}
	}

	.carousel-fade .carousel-item-left.active,
	.carousel-fade .carousel-item-next,
	.carousel-fade .carousel-item-prev,
	.carousel-fade .carousel-item-prev.active,
	.carousel-fade .carousel-item.active {
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}



	@-webkit-keyframes fadeInLeft {
		from {
			opacity: 0;
			-webkit-transform: translate3d(-100%, 0, 0);
			transform: translate3d(-100%, 0, 0);
		}

		to {
			opacity: 1;
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
		}
	}

	@keyframes fadeInLeft {
		from {
			opacity: 0;
			-webkit-transform: translate3d(-100%, 0, 0);
			transform: translate3d(-100%, 0, 0);
		}

		to {
			opacity: 1;
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
		}
	}

	.fadeInLeft {
		-webkit-animation-name: fadeInLeft;
		animation-name: fadeInLeft;
	}

	@-webkit-keyframes fadeInUp {
		from {
			opacity: 0;
			-webkit-transform: translate3d(0, 100%, 0);
			transform: translate3d(0, 100%, 0);
		}

		to {
			opacity: 1;
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
		}
	}

	@keyframes fadeInUp {
		from {
			opacity: 0;
			-webkit-transform: translate3d(0, 100%, 0);
			transform: translate3d(0, 100%, 0);
		}

		to {
			opacity: 1;
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
		}
	}

	.fadeInUp {
		-webkit-animation-name: fadeInUp;
		animation-name: fadeInUp;
	}

	@-webkit-keyframes slideInRight {
		from {
			-webkit-transform: translate3d(100%, 0, 0);
			transform: translate3d(100%, 0, 0);
			visibility: visible;
		}

		to {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
		}
	}

	@keyframes slideInRight {
		from {
			-webkit-transform: translate3d(100%, 0, 0);
			transform: translate3d(100%, 0, 0);
			visibility: visible;
		}

		to {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
		}
	}

	.slideInRight {
		-webkit-animation-name: slideInRight;
		animation-name: slideInRight;
	}
</style>

<div id="myCarousel" class="carousel" data-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<div class="mask flex-center">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-7 col-12 order-md-1 order-2">
							<h4>Paket <br>
								Pernikahan</h4>
							<p>Lorem ipsum dolor sit amet. Reprehenderit, qui blanditiis quidem rerum <br>
								necessitatibus praesentium voluptatum deleniti atque corrupti.</p>
							<!-- <a href="#" style="background-color: white; color: #7E4A9E; border-radius: 30px"><b>BUY NOW</b></a> -->
						</div>
						<div class="col-md-5 col-12 order-md-2 order-1"><img src="<?php echo base_url('assets/gambar/event/1.jpg') ?>" class="mx-auto" style="margin: 10px; border-radius: 100%; height: 377px; width: auto; box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);" alt="slide"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<div class="mask flex-center">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-7 col-12 order-md-1 order-2">
							<h4>Paket <br>
								Ulang Tahun</h4>
							<p>Lorem ipsum dolor sit amet. Reprehenderit, qui blanditiis quidem rerum <br>
								necessitatibus praesentium voluptatum deleniti atque corrupti.</p>
							<!-- <a href="#" style="background-color: white; color: #7E4A9E; border-radius: 30px"><b>BUY NOW</b></a> -->
						</div>
						<div class="col-md-5 col-12 order-md-2 order-1"><img src="<?php echo base_url('assets/gambar/event/birthday1.jpg') ?>" class="mx-auto" style="margin: 10px; border-radius: 100%; height: 377px; width: auto; box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);" alt="slide"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<div class="mask flex-center">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-7 col-12 order-md-1 order-2">
							<h4>Event <br>
								Musik</h4>
							<p>Lorem ipsum dolor sit amet. Reprehenderit, qui blanditiis quidem rerum <br>
								necessitatibus praesentium voluptatum deleniti atque corrupti.</p>
							<!-- <a href="#" style="background-color: white; color: #7E4A9E; border-radius: 30px"><b>BUY NOW</b></a> -->
						</div>
						<div class="col-md-5 col-12 order-md-2 order-1"><img src="<?php echo base_url('assets/gambar/event/music1.jpg') ?>" class="mx-auto" style="margin: 10px; border-radius: 100%; height: 377px; width: auto; box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);" alt="slide"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev" style="background-color: #7E4A9E;"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next" style="background-color: #7E4A9E;"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> -->
</div>
<!--slide end-->
