<?php
$fileName = $_FILES['upload_file']['name'];
$fileType = $_FILES['upload_file']['type'];
$fileContent = file_get_contents($_FILES['upload_file']['tmp_name']);
$dataUrl = 'data:' . $fileType . ';base64,' . base64_encode($fileContent);
 
$json = json_encode(array(
  'name' => $fileName,
  'type' => $fileType,
  'dataUrl' => $dataUrl,
  'username' => $_REQUEST['username'],
  'accountnum' => $_REQUEST['accountnum']
));
 
echo $json;

$target_path = "upload/" . basename($fileName);
move_uploaded_file($_FILES['upload_file']['tmp_name'], $target_path);
?>