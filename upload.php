<?php 
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
if (isset($_FILES['my_video'])) {
	include "config.inc.php";
	if(!isset($_SESSION['loggedin'])) { die('log in pls'); }
	$logged = $_SESSION['username'];
    $video_name = $_FILES['my_video']['name'];
    $tmp_name = $_FILES['my_video']['tmp_name'];
    $error = $_FILES['my_video']['error'];
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$id = uniqid("video-", true);
    if ($error === 0) {
    	$video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

    	$video_ex_lc = strtolower($video_ex);

    	$allowed_exs = array("mp4");

    	if (in_array($video_ex_lc, $allowed_exs)) {
    		
    		$new_video_name = $id. '.'.$video_ex_lc;
    		$video_upload_path = 'vi/videos/'.$new_video_name;
    		move_uploaded_file($tmp_name, $video_upload_path);

    		// db
		$sqlled = "INSERT INTO video(title, description, author, mp4, thumb) 
		VALUES('$title', '$desc', '$logged', '$new_video_name', '$id')";
		mysqli_query($sql, $sqlled);
		echo shell_exec("ffmpeg -ss 00:00:00.001 -i ".'vi/videos/'.$new_video_name." -vframes 1 ".'vi/thumb/'.$id.".jpg");
            header("Location: index.php?uploaded");
    	}else {
    		$em = "You can't upload files of this type";
    		header("Location: index.php?error=$em");
    	}
    }


}else{
	header("Location: index.php");
}
