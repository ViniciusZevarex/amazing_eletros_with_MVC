<?php

function ehPost() {
    return $_SERVER["REQUEST_METHOD"] == "POST";
}