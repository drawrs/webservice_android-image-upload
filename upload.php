<?php

if (isset($_FILES['photo'])) { // execute if the request with $_FILES['photo']
	// Directory target, all photo's will be saved here
	$target_dir = 'images/'; // MAKE SURE THE FOLDER WAS WRITEABLE (CHMOD 777)

	// Adding timestamps in the beginin if file name
	$targetFile = $target_dir . date("Y-m-d h:i:s"). " - " . basename($_FILES["photo"]["name"]);
	// get file name
	$filename = $_FILES['photo']['name'];
	// move into target directory
	move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile);
	// set response
	$response['result'] = "true";
	$response['msg'] = $filename . " berhasil di upload ( " . $_POST['description'] . " )";
	$response['filename'] = $filename;
} else {
	// set response
	$response['result'] = "false";
	$response['msg'] = "gagal diupload";
	$response['filename'] = "null";
}
// convert array into json format
echo json_encode($response);