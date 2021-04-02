<?php
$hash = md5('Temp238293');
echo $hash;
// the password_hash function will encrypt the password into a 60 character string
if(md5('Temp238293') == '4bb3cf23e442277e0e9d8f64eff19324'){
    echo 'correct';
}else{
    echo 'false';
}