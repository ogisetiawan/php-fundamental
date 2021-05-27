<?php
//mengambil data dari sebuah HTML yang mempunyai nilai tertentu seperti IMG
$html='<img border="0" src="/images/image.jpg" alt="Image" width="100" height="100" />';
preg_match('@src="([^"]+)"@',$html,$match);
$src=array_pop($match);
// will return /images/image.jpg
echo$src;
