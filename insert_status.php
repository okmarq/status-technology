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

<title>Insert Status</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
<section>
	<div class="container my-5">
		<div class="row">
			<div class="col-12 col-lg-12">
				<div class="">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="mb-3">
							<label class="form-label">Status Title</label>
							<input type="text" class="form-control" name="statsTitle" placeholder="Status Title" />
						</div>
						<div class="mb-3">
							<label class="form-label">Status Img</label>
							<input type="file" class="form-control" name="statsImg" placeholder="Status Title" required />
						</div>
						<div class="">
							<input type="submit" class="btn btn-info" name="submitStats" value="Send Status" />
						</div>
					</form>
					<?php
						include("database.php");
						if(isset($_POST["submitStats"])){
							$statsTitle = mysqli_real_escape_string($con, $_POST["statsTitle"]);
							$today = date("Y-m-d H:i:s"); 
							
							$statsImg = $_FILES["statsImg"]["name"];
							$file_ext = pathinfo($statsImg, PATHINFO_EXTENSION);
							$Nu_imgFile_name = time().".".$file_ext;
							$statsImg_tmp = $_FILES["statsImg"]["tmp_name"];
							
							move_uploaded_file($statsImg_tmp, "status_image/$Nu_imgFile_name");
							$instStaQu = mysqli_query($con, "INSERT INTO `status`(`status_title`, `status_img`, `restaurant_id`, `status_token`, `date_string`, `upload_date`) VALUES('$statsTitle','$Nu_imgFile_name','','true','$today',NOW())");
							if($instStaQu){
								echo "<script>window.open('insert_status.php?msg=Uploaded','_self')</script>";
								exit();
							}
						}
						
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container my-5">
		<div class="row">
			<div class="col-12 col-lg-12">
				<div class="">
					<div class="row">
						<?php
							include("database.php");
							$getMyStImgQu = mysqli_query($con, "SELECT * FROM `status`");
							$cnt_getMyStImgQu = mysqli_num_rows($getMyStImgQu);
							if($cnt_getMyStImgQu <= 0){}else{
							while($row_getMyStImgQu = mysqli_fetch_array($getMyStImgQu)){
								$db_statsImg = $row_getMyStImgQu["status_img"];
						?>
						<div class="col-4 col-md-2">
							<div class="my-2">
								<img src="status_image/<?php echo $db_statsImg; ?>" class="img-fluid shadow rounded" />
							</div>
						</div>
						<?php }} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
$(document).ready(function(){
	$("body").delegate(".showMe","click",function(){
		$(".statusBG").css("left","0%");
		$(".statusImg").html("<center><img src='1.jpeg' class='img-fluid' style='height:500px;' /></center>");
	});
	
	$("body").delegate(".statusBG","click",function(){
		$(".statusBG").css("left","100%");
		$(".statusImg").html("");
	});
	
	var hisName = "Joel";
	callStatus(hisName);
	function callStatus(nameVal){
		$.ajax({
			url:	"action.php",
			method:	"POST",
			data:	{callStatusData:1, send_name:nameVal},
			success:function(new_entry){
				$(".testAction").html(new_entry);
			}
		});
	}
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>