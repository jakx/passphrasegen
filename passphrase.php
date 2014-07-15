<?php
$WD = '/home/jakx/webapps/passphrasegen/';
$word ='';
for($i = 0; $i < 4; $i++){
        do{
          $word =`$WD/passphrase.sh`;
        }
//        ;
// 	while(false);
         while(strlen($word) -1 > 7 || strlen($word) -1 < 3);//|| count($word) > 4)){
        echo $word;
        $word ='';
}

?>

