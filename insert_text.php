<?php
$file = 'todo.txt'; //todo list . each line a task
//$lines = count(file($file));  //number of lines

$bgImage = "/home/tran/Pictures/wallpapers/bg.jpg";
$activeBgImage = "/home/tran/Pictures/wallpapers/active.jpg";

$im = imagecreatefromjpeg ( $bgImage );
// Path to our ttf font file
$fontFile = './fonts/FreeMonoBold.ttf';

$black = imagecolorallocate($im, 0,0,0);

$i = 1;
$fontSize = 20;
$x = 100; //offset
$y = 650; //offset
$listTitle = "My TODO list";

imagefttext($im, $fontSize, 0, $x, $y, $black, $fontFile, $listTitle);
//write each line 
$handle = @fopen($file, "r");
$lineHeight = $fontSize * 2;
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        $y = $y + $lineHeight;
        imagefttext($im, $fontSize, 0, $x, $y, $black, $fontFile,"#$i. " . $buffer);
        $i++;
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}

imagejpeg ( $im , $activeBgImage, 100);

?>
