<?php

//ini_set('display_errors',1);
//ini_set('display_startup_errors',1);
//error_reporting(-1);


session_start(); // Staring Session
$captchanumber = '12356788889999990'; // Initializing PHP variable with string
$captchanumber = substr(str_shuffle($captchanumber), 0, 4) . '9'; // Getting first 6 word after shuffle.
$_SESSION["captcha_code"] = $captchanumber; // Initializing session variable with above generated sub-string


    $image = imagecreatetruecolor(380, 100);
    imagesavealpha($image, true);

    $trans_colour = imagecolorallocatealpha($image, 0, 0, 0, 127); // transparent background
    imagefill($image, 0, 0, $trans_colour);

    // font files
    $fonts = array(
        0 => '1942.ttf'
    );
    $font_dir = 'fonts/';
    $font = $font_dir . $fonts[0];

    $font_colour = imagecolorallocate($image, 255, 255, 255); // Font Color
    $font_size = 55;

    $x_px = (imagesx($image) - $font_size * strlen($captchanumber)) / 2; // get x coordinates for text to be center aligned
    $y_px = $font_size + 12; // get y coordinates for text to be middle aligned

    imagettftext($image, $font_size, 0, $x_px, $y_px, $font_colour, $font, $captchanumber); // add text to image

    header('Content-type: image/png');
    imagepng($image);