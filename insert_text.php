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

$i = 1; //line number
//write each line 
$handle = @fopen($file, "r");
$lineHeight = $fontSize * 2;
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        $y = $y + $lineHeight;
        if ($buffer != strtoupper($buffer) && trim($buffer) != '') 
        {
            imagefttext($im, $fontSize, 0, $x, $y, $textColor, $fontFile,"#$i. " . $buffer);
            $i++;
        }
        else //task group or empty line
        {
            imagefttext($im, $fontSize, 0, $x, $y, $textColor, $fontFile, $buffer);
            if (trim($buffer) != '') //if new task group, start a new counter
                $i = 1;
        }
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}

imagejpeg ( $im , $activeBgImage, 100);
?>
