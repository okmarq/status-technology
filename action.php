<?php

include("database.php");

/*if(isset($_POST["deleteSideItemData"])){
	global $con;
	$send_myUnqID = mysqli_real_escape_string($con, $_POST["send_myUnqID"]);
	$send_restIDEF = mysqli_real_escape_string($con, $_POST["send_restIDEF"]);
	$send_myMenuIDEF = mysqli_real_escape_string($con, $_POST["send_myMenuIDEF"]);
	$send_myDishID = mysqli_real_escape_string($con, $_POST["send_myDishID"]);
	$send_mySideItemMainID = mysqli_real_escape_string($con, $_POST["send_mySideItemMainID"]);
	$delMySideItem_query = mysqli_query($con, "DELETE from menu_dish_option where dish_optionID = '$send_myUnqID' AND dOption_mainTitleID = '$send_mySideItemMainID' AND menu_id = '$send_myMenuIDEF' AND dish_id = '$send_myDishID' AND restaurant_id = '$send_restIDEF'");
	if($delMySideItem_query){
		echo "Single Item Deleted Successfully!";
	}else{
		echo "Please Try Again!";
	}
}*/

if (isset($_POST["callStatusData"])) {
	global $con;

	$getMyStImgQu = mysqli_query($con, "SELECT * FROM `status` WHERE `status_token` = 'true'");
	$cnt_getMyStImgQu = mysqli_num_rows($getMyStImgQu);
	if ($cnt_getMyStImgQu <= 0) {
	} else {
		while ($row_getMyStImgQu = mysqli_fetch_array($getMyStImgQu)) {
			$db_statsId = $row_getMyStImgQu["status_id"];
			$db_statsImg = $row_getMyStImgQu["status_img"];

			echo "
				<div class='col-4 col-md-2 me$db_statsId'>
					<div class='my-2 itemImg showMe shadow border border-primary' myID='$db_statsId' style='background-image: url(status_image/$db_statsImg);'></div>
				</div>
			";
		}
	}
}

if (isset($_POST["callStatusData_2"])) {
	global $con;

	$getMyStImgQu_2 = mysqli_query($con, "SELECT * FROM `status` WHERE `status_token` = 'false'");
	$cnt_getMyStImgQu_2 = mysqli_num_rows($getMyStImgQu_2);
	if ($cnt_getMyStImgQu_2 <= 0) {
	} else {
		while ($row_getMyStImgQu_2 = mysqli_fetch_array($getMyStImgQu_2)) {
			$db_statsId_2 = $row_getMyStImgQu_2["status_id"];
			$db_statsImg_2 = $row_getMyStImgQu_2["status_img"];

			echo "
				<div class='col-4 col-md-2 me$db_statsId_2'>
					<div class='my-2 itemImg showMe shadow border border-secondary' myID='$db_statsId_2' style='background-image: url(status_image/$db_statsImg_2);'></div>
				</div>
			";
		}
	}
}

if (isset($_POST["showMeData"])) {
	global $con;

	$send_myIdef = mysqli_real_escape_string($con, $_POST["send_myIdef"]);
	$getMyStImgQu = mysqli_query($con, "SELECT * FROM `status` WHERE `status_id` = '$send_myIdef' LIMIT 1");
	$cnt_getMyStImgQu = mysqli_num_rows($getMyStImgQu);
	if ($cnt_getMyStImgQu <= 0) {
	} else {
		$row_getMyStImgQu = mysqli_fetch_array($getMyStImgQu);
		$db_statsImg = $row_getMyStImgQu["status_img"];

		echo "
			<div id='ProgBar' class='mb-1'></div>
			<div class='statusImg'>
				<center><img src='status_image/$db_statsImg' class='img-fluid' style='height:500px;' /></center>
				<div class='top-right closeIt'><i class='fa fa-times-rectangle' style='font-size:48px;color:red'></i></div>
			</div>
		";
	}
}

if (isset($_POST["modifyStatusData"])) {
	global $con;

	$mod_myIdef = mysqli_real_escape_string($con, $_POST["mod_myIdef"]);
	$u_stats_token = mysqli_query($con, "UPDATE `status` SET `status_token`='false' WHERE `status_id`='$mod_myIdef'");
	$cnt_u_stats_token = mysqli_affected_rows($con);
	if ($cnt_u_stats_token < 0) {
	} else {
		$getMyStImgQu_3 = mysqli_query($con, "SELECT * FROM `status` WHERE `status_token` = 'false' and `status_id` = '$mod_myIdef' LIMIT 1");
		$cnt_getMyStImgQu_3 = mysqli_num_rows($getMyStImgQu_3);
		if ($cnt_getMyStImgQu_3 <= 0) {
		} else {
			while ($row_getMyStImgQu_3 = mysqli_fetch_array($getMyStImgQu_3)) {
				$db_statsId_3 = $row_getMyStImgQu_3["status_id"];
				$db_statsImg_3 = $row_getMyStImgQu_3["status_img"];

				echo "
					<div class='col-4 col-md-2 me$db_statsId_3'>
						<div class='my-2 itemImg showMe shadow border border-secondary' myID='$db_statsId_3' style='background-image: url(status_image/$db_statsImg_3);'></div>
					</div>
				";
			}
		}
	}
}
