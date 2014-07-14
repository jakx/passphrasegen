<?php
$WD = '/home/jakx/webapps/passphrasegen/';
$word ='';
for($i = 0; $i < 4; $i++){
         while(strlen($word) > 9 || strlen($word) < 4){//|| count($word) > 4)){
          $word =`$WD/passphrase.sh`;
        }
//        ;
// 	while(false);
        echo $word;
        $word ='';
}

?>

