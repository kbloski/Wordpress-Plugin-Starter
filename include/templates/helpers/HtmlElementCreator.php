<?php

namespace Inc\Templates\Helpers;

class HtmlElementCreator
{
    public static function createDivWithReactId(string $dataReactId): string
    {
        return "<div data-react-id='$dataReactId'>
            <h2>React Component Error</h2>
            <p>React component not loaded in this page. Make sure the React app is built and working correctly.</p>
        </div>";
    }
}
