<?php

function csrf_token() {
    return md5(uniqid(mt_rand(), true));
}

function csrf_input_tag() {
    return '<input type="hidden" name="csrf" value="'.csrf_token().'">';
}

function csrf_check($possible_csrf_token) {
    return $possible_csrf_token == csrf_token();
}
?>