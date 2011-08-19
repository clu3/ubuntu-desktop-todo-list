<?php
/** Configurable */
/**
    for mat of TODO.text. Each capital line will be a group of tasks
    ------------------------------------------------------
    MY TASK TODAY
    task #1
    task #2
    task #3
    task #4

    MY LONGTER TASKS
    task #1
    task #1
    task #1
*/
$file = 'todo.txt'; //todo list . each line a task
$bgImage = "/home/tran/Pictures/wallpapers/bg2.jpg";
$activeBgImage = "/home/tran/Pictures/wallpapers/active.jpg";
$fontSize = 20;
$x = 100; //offset
$y = 500; //offset

$fontFile = './fonts/FreeMonoBold.ttf';

//----------start
$im = imagecreatefromjpeg ( $bgImage );
$textColor = imagecolorallocate($im, 0,0,0); //black
$headingColor = imagecolorallocate($im, 0,255,0); //red bg

$i = 1; //line number
//write each line 
$handle = @fopen($file, "r");
$lineHeight = $fontSize * 2;
if ($handle) {
    while (($line = fgets($handle, 4096)) !== false) {
        if ($line != strtoupper($line) && trim($line) != '') 
        {
            $tmp = explode('##', $line);
            $print = $tmp[0];
            $print = trim($print);
            if (!empty($print))
            {
                $y = $y + $lineHeight;
                imagefttext($im, $fontSize, 0, $x, $y, $textColor, $fontFile,"#$i. " . $print);
                $i++;
            }
        }
        else //task group or empty line
        {
            if (trim($line) != '') //if new task group, start a new counter
            {
                $y = $y + $lineHeight;
                imagefttext($im, $fontSize, 0, $x, $y, $textColor, $fontFile, ''); //empty line
                $y = $y + $lineHeight;
                imagefttext($im, $fontSize, 0, $x, $y, $headingColor, $fontFile, $line);
                $y = $y + $lineHeight;
                imagefttext($im, $fontSize, 0, $x, $y, $textColor, $fontFile, ''); //empty line
                $i = 1;
            }
        }
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}

imagejpeg ( $im , $activeBgImage, 100);
?>
