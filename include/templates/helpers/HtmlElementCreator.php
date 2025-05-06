<?php

namespace Inc\Templates\Helpers;

class HtmlElementCreator
{
    public static function createDivWithReactId(string $dataReactId): string
    {
        return "<div data-react-id='$dataReactId'>
            <h2>Component failed to load</h2>
            <p>This part of the application could not be loaded correctly. Please make sure the app is working properly or try refreshing the page.</p>
        </div>";
    }
}
