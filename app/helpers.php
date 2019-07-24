<?php
/**
 * Created by PhpStorm.
 * User: FallenBG
 * Date: 25-Jul-19
 * Time: 7:52 AM
 */


function gravatar_url($email, $size = 45)
{
    $email = md5($email);
    return "https://s.gravatar.com/avatar/{$email}?s={$size}";
}
