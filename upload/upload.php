<?php

function bytesToSize1024($bytes, $precision = 2) {
    $unit = array('B','KB','MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
}

$sFileName = $_FILES['image_file']['name'];
$sFileType = $_FILES['image_file']['type'];
$sFileSize = bytesToSize1024($_FILES['image_file']['size'], 1);

$sTargetPath = "data/" . basename($sFileName);
$sMessage = "has been successfully uploaded.";

if(!move_uploaded_file($_FILES['image_file']['tmp_name'], $sTargetPath))
{ $sMessage = "was not able to be uploaded."; }

echo <<<EOF
<p>Your file: {$sFileName} $sMessage</p>
<p>Type: {$sFileType}</p>
<p>Size: {$sFileSize}</p>
<p>Link: <a href="http://jeaye.com/upload/$sTargetPath">http://jeaye.com/upload/$sTargetPath</p>
EOF;


