<?php

require("crtaci.php");
require("helpers.php");

function main() {
    $crtaci = new Crtaci();

    $characters = $crtaci->getCharacters();
    if(is_null($characters)) {
        header("HTTP/1.0 500 Internal Server Error");
        print("<h1>500 Internal Server Error</h1>");
        exit();
    }

    if(isset($_GET["c"]) && !empty($_GET["c"])) {
        $query = str_replace("/", "", $query);
    } else {
        $query = $characters[0]["name"];
    }

    $cartoons = $crtaci->getCartoons($query);
    if(is_null($cartoons)) {
        header("HTTP/1.0 404 Not Found");
        print("<h1>404 Not Found</h1>");
        exit();
    }

    print(get_html($query, $characters, $cartoons));
    exit();
}

main();
