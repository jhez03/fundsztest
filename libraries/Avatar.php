<?php


class Avatar
{

	public function letterAvatar($text,$fontSize,$imgWidth,$imgHeight,$center='',$add='',$user_id,$profile_picture,$colorCode)
	{
		
		$font = './calibri.ttf'; /*define font*/

		
		$words = explode(" ", $text);
		$text = "";
		foreach ($words as $w) {
		  $text .= strtoupper($w[0]);
		}

		// Upload directory
 
		$folder	=	dirname($_SERVER['SCRIPT_FILENAME']) .'/'.U.'/user/' . $user_id.'/';

		if ( ! file_exists($folder)) 
		{
			mkdir($folder, 0777, true);
			chmod($folder, 0777);
		}

		
		$fileName = $profile_picture.'.jpg';

	
		$textColor = '#FFF';

		// Convert hex code to RGB
		$textColor=$this->hexToRGB($textColor);	

		// check letter avatar already exist
		// if exist return the image
		if(file_exists($folder.$imgWidth.'_'.$fileName))
		{
			
		}
		
		$im = imagecreatetruecolor($imgWidth, $imgHeight);	
		$textColor = imagecolorallocate($im, $textColor['r'],$textColor['g'],$textColor['b']);	
		
		
		$backgroundColor = $this->hexToRGB($colorCode);
		$backgroundColor = imagecolorallocate($im, $backgroundColor['r'],$backgroundColor['g'],$backgroundColor['b']);
		
		imagefill($im,0,0,$backgroundColor);	
		list($x, $y) = $this->ImageTTFCenter($im, $text, $font, $fontSize,$center,$add);	
		imagettftext($im, $fontSize, 0, $x, $y, $textColor, $font, $text);
		if(imagejpeg($im,$folder.$imgWidth.'_'.$fileName,90)){/*save image as JPG*/
			chmod($folder.$imgWidth.'_'.$fileName, 0777);
			
		imagedestroy($im);	
		}
	}

	public function profileUpload($file,$w,$h,$user_id,$crop=false, $time)
	{
		$folder	=	dirname($_SERVER['SCRIPT_FILENAME']) .'/'.U.'/user/' . $user_id.'/';

		if ( ! file_exists($folder)) 
		{
			mkdir($folder, 0777, true);
			chmod($folder, 0777);
		}
		 list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    
    //Get file extension
    $exploding = explode(".",$file);
    $ext = end($exploding);
    
    switch($ext){
        case "png":
            $src = imagecreatefrompng($file);
        break;
        case "jpeg":
        case "jpg":
            $src = imagecreatefromjpeg($file);
        break;
        case "gif":
            $src = imagecreatefromgif($file);
        break;
        default:
            $src = imagecreatefromjpeg($file);
        break;
    }
    $fileName = $time.'.jpg';
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    if(imagejpeg($dst,$folder.$w.'_'.$fileName,90)){/*save image as JPG*/
			chmod($folder.$w.'_'.$fileName, 0777);
			
		imagedestroy($dst);	
		}
	}
	


	public function frontidUpload($file,$w,$h,$user_id,$crop=false, $time)
	{
		$folder	=	dirname($_SERVER['SCRIPT_FILENAME']) .'/'.E.'/user/' . $user_id.'/'.'fornt_image'.'/';

		if ( ! file_exists($folder)) 
		{
			mkdir($folder, 0777, true);
			chmod($folder, 0777);
		}
		 list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    
    //Get file extension
    $exploding = explode(".",$file);
    $ext = end($exploding);
    
    switch($ext){
        case "png":
            $src = imagecreatefrompng($file);
        break;
        case "jpeg":
        case "jpg":
            $src = imagecreatefromjpeg($file);
        break;
        case "gif":
            $src = imagecreatefromgif($file);
        break;
        default:
            $src = imagecreatefromjpeg($file);
        break;
    }
    $fileName = $time.'.jpg';
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    if(imagejpeg($dst,$folder.$w.'_'.$fileName,90)){/*save image as JPG*/
			chmod($folder.$w.'_'.$fileName, 0777);
			
		imagedestroy($dst);	
		}
	}
	


		public function backidUpload($file,$w,$h,$user_id,$crop=false, $time)
	{
		$folder	=	dirname($_SERVER['SCRIPT_FILENAME']) .'/'.E.'/user/' . $user_id.'/'.'back_image'.'/';

		if ( ! file_exists($folder)) 
		{
			mkdir($folder, 0777, true);
			chmod($folder, 0777);
		}
		 list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    
    //Get file extension
    $exploding = explode(".",$file);
    $ext = end($exploding);
    
    switch($ext){
        case "png":
            $src = imagecreatefrompng($file);
        break;
        case "jpeg":
        case "jpg":
            $src = imagecreatefromjpeg($file);
        break;
        case "gif":
            $src = imagecreatefromgif($file);
        break;
        default:
            $src = imagecreatefromjpeg($file);
        break;
    }
    $fileName = $time.'.jpg';
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    if(imagejpeg($dst,$folder.$w.'_'.$fileName,90)){/*save image as JPG*/
			chmod($folder.$w.'_'.$fileName, 0777);
	
		imagedestroy($dst);	
		}
	}
	

	
	protected function hexToRGB($colour)
	{
			if ( $colour[0] == '#' ) {
					$colour = substr( $colour, 1 );
			}
			if ( strlen( $colour ) == 6 ) {
					list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
			} elseif ( strlen( $colour ) == 3 ) {
					list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
			} else {
					return false;
			}
			$r = hexdec( $r );
			$g = hexdec( $g );
			$b = hexdec( $b );
			return array( 'r' => $r, 'g' => $g, 'b' => $b );
	}		
		
	
	protected function ImageTTFCenter($image, $text, $font, $size, $center, $add, $angle = 8) 
	{
		$xi = imagesx($image);
		$yi = imagesy($image);
		$box = imagettfbbox($size, $angle, $font, $text);
		$xr = abs(max($box[$center], $box[4]+$add));
		$yr = abs(max($box[5], $box[7]));
		$x = intval(($xi - $xr) / 2);
		$y = intval(($yi + $yr) / 2);
		return array($x, $y);	
	}
}
?>