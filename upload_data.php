<?php
// $myFile = "log.txt";
// $fh = fopen($myFile, 'w') or die("can't open file");
// fwrite($fh, "ready");

$upload_dir = "upload/";
//implement this function yourself
echo $upload_dir;
$img = $_POST['hidden_data'];
echo $_POST;
echo $img;
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $upload_dir . mktime() . ".png";
$success = file_put_contents($file, $data);
header('Location: ' . $_POST['return_url']);
print $success ? $file : 'Unable to save the file.';
// fclose($fh);
?>
