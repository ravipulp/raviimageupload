<?php
 $filename  = time().'.jpg';
 $img = str_replace(" ","+",$_REQUEST['queryString']);
 $image_url = "images/";
 
 
 
 if(strpos($img,'data:image/png') !== false)
{
    $img = str_replace('data:image/png;base64,', '', $img);
  $img = str_replace(' ', '+', $img);
}
elseif((strpos($img,'data:image/jpg') !== false) || (strpos($img,'data:image/jpeg') !== false))
{
    $img = str_replace('data:image/jpeg;base64,', '', $img);
  $img = str_replace(' ', '+', $img);
}
elseif(strpos($img,'data:image/bmp') !== false)
{
    $img = str_replace('data:image/bmp;base64,', '', $img);
  $img = str_replace(' ', '+', $img);
}

$data    = base64_decode($img);
$success = file_put_contents($image_url.$filename, $data);
 

 if($success){
	echo "Success";
 }
?>