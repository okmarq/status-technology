<?php
include("database.php");
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Hello, world!</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<style>
		.statusBG {
			position: fixed;
			top: 0%;
			left: 100%;
			width: 100%;
			height: 100%;
			z-index: 999;
			background: #000;

			-webkit-transition: all 0.3s ease-in-out;
			-moz-transition: all 0.3s ease-in-out;
			-o-transition: all 0.3s ease-in-out;
			transition: all 0.3s ease-in-out;
		}

		.statusImg {
			position: relative;
		}

		.top-right {
			position: absolute;
			top: 8px;
			right: 16px;
		}

		.itemImg {
			width: 100%;
			height: 350px;
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center;
			border-radius: 0.25rem;

			-webkit-transition: all .5s;
			-moz-transition: all .5s;
			-o-transition: all .5s;
			transition: all .5s;
		}
	</style>
</head>

<body>
	<div class="statusBG">
		<div class="container my-5">
			<div class="row">
				<div class="col-12 col-lg-12">
					<div class="statusImg"></div>
				</div>
			</div>
		</div>
	</div>

	<section>
		<div class="container my-5">
			<div class="row">
				<div class="col-12 col-lg-12">
					<div class="">
						<div class="row showStatsBody"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script>
		$(document).ready(function() {

			$("body").delegate(".showMe", "click", function(ev) {
				var myIdef = $(this).attr("myID");
				$.ajax({
					url: "action.php",
					method: "POST",
					data: {
						showMeData: 1,
						send_myIdef: myIdef
					},
					success: function(response) {
						var progressBar = 0;
						$(".statusBG").css("left", "0%");
						$(".statusImg").html(response);

						// add the progress bar
						$("#ProgBar").html(`<div id='statsProgBar' class='progress mb-1' style='height: 5px;'>
							<div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' style='width: 0%'></div>
						</div>`);
						setTimeout(function() {
							$("#statsProgBar").click();
							$(".me" + myIdef).fadeOut();

							$.ajax({
								url: "action.php",
								method: "POST",
								data: {
									modifyStatusData: 1,
									mod_myIdef: myIdef
								},
								success: function(new_entry) {
									$(".showStatsBody").append(new_entry);
								}
							});
						}, 300);

						var time_to_auto_close = setTimeout(function() {
							$(".statusBG").css("left", "100%");
							setTimeout(function() {
								$(".statusImg").html("");
							}, 300);
						}, 30000);

						$("#statsProgBar").click(function() {
							var progBar = setTimeout(function() {
								progressBar++;

								if (progressBar <= 100) {
									$("#statsProgBar").html(`<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="${progressBar}" aria-valuemin="0" aria-valuemax="100" style="width: ${progressBar}%"></div>`);

									$("#statsProgBar").click();
								}
							}, 293);
							$(".closeIt").click(function() {
								clearTimeout(progBar);
								clearTimeout(time_to_auto_close);
								progressBar = 0;
							});
						});
					}
				});
			});

			$("body").delegate(".closeIt", "click", function() {
				progressBar = 0;
				$(".statusBG").css("left", "100%");
				setTimeout(function() {
					$(".statusImg").html("");
				}, 300);
			});

			callStatus();

			function callStatus() {
				$.ajax({
					url: "action.php",
					method: "POST",
					data: {
						callStatusData: 1
					},
					success: function(new_entry) {
						$(".showStatsBody").html(new_entry);

						$.ajax({
							url: "action.php",
							method: "POST",
							data: {
								callStatusData_2: 1
							},
							success: function(new_entry) {
								$(".showStatsBody").append(new_entry);
							}
						});
					}
				});
			}
		});
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>