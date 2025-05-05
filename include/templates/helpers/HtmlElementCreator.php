<?php 

namespace Inc\Templates\Helpers;

class HtmlElementCreator
{
    public static function createDivWithReactId( string $dataReactId) : string
    {
        return "<div data-react-id='$dataReactId'>React Component</div>";
    }
}