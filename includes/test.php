<?php
$hash = password_hash('rasmuslerdorf', PASSWORD_BCRYPT);
// the password_hash function will encrypt the password into a 60 character string
if(password_verify('rasmuslerdorf',$hash)){
    echo 'correct';
}else{
    echo 'false';
}