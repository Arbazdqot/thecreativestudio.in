<?php 
    const PHOTO_BASE_URL = "https://admin.thecreativestudio.in/v1/uploads/";

    if(!function_exists('compress_image')){
        function compress_image($root_path,$imagename){
            
            $file = $root_path . $imagename; //This is the original file
            $save = $root_path . $imagename; //This is the new file you saving
            $info = getimagesize($file);
            $mime = $info['mime'];
            
            if ($mime == 'image/jpeg') 
                $image = imagecreatefromjpeg($file); 
            elseif ($mime == 'image/gif') 
                $image = imagecreatefromgif($file); 
            elseif ($mime == 'image/png') 
                $image = imagecreatefrompng($file); 
            else
            $image = imagecreatefromjpg($file);
            
            imagejpeg($image, $save, 90);
            
            
            /* list($width, $height) = $info;
            $tn = imagecreatetruecolor($width, $height) ;
            
            if ($mime == 'image/jpeg') 
                $image = imagecreatefromjpeg($file); 
            elseif ($mime == 'image/gif') 
                $image = imagecreatefromgif($file); 
            elseif ($mime == 'image/png') 
                $image = imagecreatefrompng($file);		
            
            imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height) ;
            imagejpeg($tn, $save, 90) ; */ 
            
            return;
        }
    }
   
?>