<!doctype html>
<html lang="en">

<head>
	<title>Status Technology</title>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

	<style>
		.small-image {
			width: 60px;
			height: 60px;
		}
	</style>
</head>

<body>
	<section class="my-5">
		<div class="container">
			<div class="mb-5">
				<div id="progressBar" class="progress" style="height: 10px;">
					<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100" style="width: 7%"></div>
				</div>
				<!-- <button class="btn btn-sm btn-primary" id="progressBar">Progress</button> -->
			</div>

			<div class="row justify-content-center">
				<div class="col-12 col-lg-6">
					<div class="bg-white shadow-sm border rounded">
						<div class="d-flex justify-content-between align-items-center px-2 py-3 border-bottom bg-light">
							<div class="small-image border rounded-3 me-2"></div>
							<div class="flex-fill" style="line-height:1;">
								<small><b>Papa Murphy's Pizza - Papa Murphy's Pizza</b></small><br>
								<small class="text-muted" style="font-size:12px;">Papa Murphy's Pizza - Papa Murphy's Pizza</small>
							</div>
							<div class="ms-2"><small style="font-size:13px;"><b>AED 32</b></small></div>
						</div>

						<div class="d-flex flex-column px-2 py-2 border-bottom">
							<div class="mb-2">
								<span class="badge rounded bg-opacity-25 bg-success text-success" style="font-weight:500;">Delivered</span><br>
							</div>
							<div class="">
								<div class="progress">
									<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
								</div>
							</div>
						</div>

						<div class="d-flex flex-column px-2 py-3 border-bottom">
							<?php
							for ($i = 0; $i < 4; $i++) {
							?>
								<div class="mb-2" style="line-height:1;">
									<small class="text-muted" style="font-size:12px;">ITEMS</small><br>
									<small style="font-size:13px;font-weight:500;">1 x Half N Half Medium Original</small>
								</div>
							<?php } ?>
							<div class="mt-1" style="line-height:1;">
								<small class="text-muted" style="font-size:12px;">ORDERED ON</small><br>
								<small style="font-size:13px;font-weight:500;">18 Oct 2021 at 7:59 PM</small>
							</div>
						</div>

						<div class="d-flex justify-content-between align-items-center px-2 py-2 bg-light">
							<div class="">
								<span class="badge bg-light text-dark border me-1">1 <i class="fa fa-star"></i></span>
								<span class="badge bg-light text-dark border me-1">2 <i class="fa fa-star"></i></span>
								<span class="badge bg-light text-dark border me-1">3 <i class="fa fa-star"></i></span>
								<span class="badge bg-light text-dark border me-1">4 <i class="fa fa-star"></i></span>
								<span class="badge bg-light text-dark border">5 <i class="fa fa-star"></i></span>
							</div>
							<div class="" style="line-height:1;">
								<small>
									<i class="fa fa-history"></i>
									<span class="ms-1" style="font-size:12px;">Repeat Order</span>
								</small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="./disappear.js"></script>
    <script src="./save-restaurant.js"></script>
</body>

</html>