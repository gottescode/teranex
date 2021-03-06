<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Library Class
 *
 * @category	Library
 * @Developer	Jaywant Narwade
 * @Updated on        06 April 2016
 * This class basically deals with the captcha generate 
 * in order to use this class and its methods
 *
 * */
class Custom_captcha {

	// CONFIG
	private $font = ""; 
	private $perturbation = 1.0; // bigger numbers give more distortion; 1 is standard
	private $imgwid = 150; // image width, pixels
	private $imghgt = 75; // image height, pixels
	private $numcirc = 4; // number of wobbly circles
	private $numlines = 3; // number of lines
	// END CONFIG

	// global vars
	private $ncols = 20; // foreground or background cols
	// end global vars
	
	function __construct()
	{
		// initialize font path
		$this->font = dirname(__FILE__)."/font/VeraSeBd.ttf";
	}
	
	// index page for this controller 
	function getCaptchaImage($from_page = "string")
	{		
		// generate  5 letter random string
		$rand = "";
		// some easy-to-confuse letters taken out C/G I/l Q/O h/b 
		$letters = "ABDEFHKLMNOPRSTUVWXZ0123456789";
		for ($i = 0; $i < 5; ++$i) {
		  $rand .= substr($letters, rand(0,strlen($letters)-1), 1);
		}

		// create the hash for the random number and put it in the session
		$CI = &get_instance();
		$CI->session->set_userdata("captcha_".$from_page, $rand);

		$image = $this->warped_text_image($this->imgwid, $this->imghgt, $rand);
	
		//add_text($image, $signature);

		// send several headers to make sure the image is not cached     
		// taken directly from the PHP Manual 
			 
		// Date in the past  	
		/* header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");  
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  
		header("Cache-Control: no-store, no-cache, must-revalidate");  
		header("Cache-Control: post-check=0, pre-check=0", false);  
		header("Pragma: no-cache");      
		header('Content-type: image/png');  */

				
		ob_start();
			// send the image to the browser 
			imagepng($image); 
			
			$contents =  ob_get_contents();
			
			// destroy the image to free up the memory 
			imagedestroy($image);
		ob_end_clean();

		return base64_encode($contents);

	}
	
	function frand()
	{
	  return 0.0001*rand(0,9999);
	}

	// wiggly random line centered at specified coordinates
	function randomline($img, $col, $x, $y)
	{
	  $theta = ($this->frand()-0.5)*M_PI*0.7;
	  
	  $len = rand($this->imgwid*0.4,$this->imgwid*0.7);
	  $lwid = rand(0,2);

	  $k = $this->frand()*0.6+0.2; $k = $k*$k*0.5;
	  $phi = $this->frand()*6.28;
	  $step = 0.5;
	  $dx = $step*cos($theta);
	  $dy = $step*sin($theta);
	  $n = $len/$step;
	  $amp = 1.5*$this->frand()/($k+5.0/$len);
	  $x0 = $x - 0.5*$len*cos($theta);
	  $y0 = $y - 0.5*$len*sin($theta);

	  $ldx = round(-$dy*$lwid);
	  $ldy = round($dx*$lwid);
	  for ($i = 0; $i < $n; ++$i) {
		$x = $x0+$i*$dx + $amp*$dy*sin($k*$i*$step+$phi);
		$y = $y0+$i*$dy - $amp*$dx*sin($k*$i*$step+$phi);
		imagefilledrectangle($img, $x, $y, $x+$lwid, $y+$lwid, $col);
	  }
	}

	// amp = amplitude (<1), num=numwobb (<1)
	function imagewobblecircle($img, $xc, $yc, $r, $wid, $amp, $num, $col)
	{
	  $dphi = 1;
	  if ($r > 0)
		$dphi = 1/(6.28*$r);
	  $woffs = rand(0,100)*0.06283;
	  for ($phi = 0; $phi < 6.3; $phi += $dphi) {
		$r1 = $r * (1-$amp*(0.5+0.5*sin($phi*$num+$woffs)));
		$x = $xc + $r1*cos($phi);
		$y = $yc + $r1*sin($phi);
		imagefilledrectangle($img, $x, $y, $x+$wid, $y+$wid, $col);
	  }
	}

	// make a distorted copy from $tmpimg to $img. $wid,$height apply to $img,
	// $tmpimg is a factor $iscale bigger.
	function distorted_copy($tmpimg, $img, $width, $height, $iscale)
	{
	  $numpoles = 3;

	  // make an array of poles AKA attractor points
	 
	  for ($i = 0; $i < $numpoles; ++$i) {
		do {
		  $px[$i] = rand(0, $width);
		} while ($px[$i] >= $width*0.3 && $px[$i] <= $width*0.7);
		do {
		  $py[$i] = rand(0, $height);
		} while ($py[$i] >= $height*0.3 && $py[$i] <= $height*0.7);
		$rad[$i] = rand($width*0.4, $width*0.8);
		$tmp = -$this->frand()*0.15-0.15;
		$amp[$i] = $this->perturbation * $tmp;
	  }

	  // get img properties bgcolor
	  $bgcol = imagecolorat($tmpimg, 1, 1);
	  $width2 = $iscale*$width;
	  $height2 = $iscale*$height;
	  
	  // loop over $img pixels, take pixels from $tmpimg with distortion field
	  for ($ix = 0; $ix < $width; ++$ix)
		for ($iy = 0; $iy < $height; ++$iy) {
		  $x = $ix;
		  $y = $iy;
		  for ($i = 0; $i < $numpoles; ++$i) {
		$dx = $ix - $px[$i];
		$dy = $iy - $py[$i];
		if ($dx == 0 && $dy == 0)
		  continue;
		$r = sqrt($dx*$dx + $dy*$dy);
		if ($r > $rad[$i])
		  continue;
		$rscale = $amp[$i] * sin(3.14*$r/$rad[$i]);
		$x += $dx*$rscale;
		$y += $dy*$rscale;
		  }
		  $c = $bgcol;
		  $x *= $iscale;
		  $y *= $iscale;
		  if ($x >= 0 && $x < $width2 && $y >= 0 && $y < $height2)
		$c = imagecolorat($tmpimg, $x, $y);
		  imagesetpixel($img, $ix, $iy, $c);
		}
	}

	// add grid for debugging purposes
	function addgrid($tmpimg, $width2, $height2, $iscale, $color) {
	  $lwid = floor($iscale*3/2);
	  imagesetthickness($tmpimg, $lwid);
	  for ($x = 4; $x < $width2-$lwid; $x+=$lwid*2)
		imageline($tmpimg, $x, 0, $x, $height2-1, $color);
	  for ($y = 4; $y < $height2-$lwid; $y+=$lwid*2)
		imageline($tmpimg, 0, $y, $width2-1, $y, $color);
	}


	function warped_text_image($width, $height, $string)
	{
	  // internal variablesinternal scale factor for antialias
	  $iscale = 3;

	  // initialize temporary image
	  $width2 = $iscale*$width;
	  $height2 = $iscale*$height;
	  $tmpimg = imagecreate($width2, $height2);
	  $bgColor = imagecolorallocatealpha ($tmpimg, 192, 0, 192, 100);
	  $col = imagecolorallocate($tmpimg, 0, 0, 0);

	  // init final image
	  $img = imagecreate($width, $height);
	  imagepalettecopy($img, $tmpimg);    
	  imagecopy($img, $tmpimg, 0,0 ,0,0, $width, $height);
	  
	  // put straight text into $tmpimage
	  
	  $fsize = $height2*0.25;
	  $bb = imageftbbox($fsize, 0, $this->font, $string);
	  $tx = $bb[4]-$bb[0];
	  $ty = $bb[5]-$bb[1];
	  $x = floor($width2/2 - $tx/2 - $bb[0]);
	  $y = round($height2/2 - $ty/2 - $bb[1]);
	  imagettftext($tmpimg, $fsize, 0, $x, $y, -$col, $this->font, $string);

	  // addgrid($tmpimg, $width2, $height2, $iscale, $col); // debug

	  // warp text from $tmpimg into $img
	  $this->distorted_copy($tmpimg, $img, $width, $height, $iscale);
	  
	
	  // add wobbly circles (spaced)
	/*  
	  for ($i = 0; $i < $this->numcirc; ++$i) {
		$x = $width * (1+$i) / ($this->numcirc+1);
		$x += (0.5-$this->frand())*$width/$this->numcirc;
		$y = rand($height*0.1, $height*0.9);
		$r = $this->frand();
		$r = ($r*$r+0.2)*$height*0.2;
		$lwid = rand(0,2);
		$wobnum = rand(1,4);
		$wobamp = $this->frand()*$height*0.01/($wobnum+1);
		$this->imagewobblecircle($img, $x, $y, $r, $lwid, $wobamp, $wobnum, $col);
	  }
	*/
	  // add wiggly lines
	  
	  for ($i = 0; $i < $this->numlines; ++$i) {
		$x = $width * (1+$i) / ($this->numlines+1);
		$x += (0.5-$this->frand())*$width/$this->numlines;
		$y = rand($height*0.1, $height*0.9);
		$this->randomline($img, $col, $x, $y);
	  }

	  return $img;
	}

	function add_text($img, $string)
	{
	  $cmtcol = imagecolorallocatealpha ($img, 128, 0, 0, 64);
	  imagestring($img, 5, 10, imagesy($img)-20, $string, $cmtcol);
	}

}