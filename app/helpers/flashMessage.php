<?php

use app\services\FlashMessage;

function flashMessage ($key) {
    $flash = FlashMessage::get($key);
    if (isset($flash['message'])) {
        return "<span style='margin-top: 10px;' class='alert alert-{$flash['alert']}'> {$flash['message']} </span>";
    }
}