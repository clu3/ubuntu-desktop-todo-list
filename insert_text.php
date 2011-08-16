<?php
/** Configurable */
$file = 'todo.txt'; //todo list . each line a task
$bgImage = "/home/tran/Pictures/wallpapers/bg.jpg";
$activeBgImage = "/home/tran/Pictures/wallpapers/active.jpg";
$fontSize = 20;
$x = 100; //offset
$y = 650; //offset
$listTitle = "My TODO list";
$fontFile = './fonts/FreeMonoBold.ttf';

//----------start
$im = imagecreatefromjpeg ( $bgImage );
$textColor = imagecolorallocate($im, 0,0,0); //black

$i = 1;
imagefttext($im, $fontSize, 0, $x, $y, $textColor, $fontFile, $listTitle);
//write each line 
$handle = @fopen($file, "r");
$lineHeight = $fontSize * 2;
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        $y = $y + $lineHeight;
        imagefttext($im, $fontSize, 0, $x, $y, $textColor, $fontFile,"#$i. " . $buffer);
        $i++;
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}

imagejpeg ( $im , $activeBgImage, 100);
?>
