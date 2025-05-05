<?php 
namespace Inc\Templates\Shortcodes;

class ShortcodesManager
{
    /** @var string[] */
    private static array $shortcodesList = [];

    public static function init()
    {
        ExampleForm::initShortcode();
        self::$shortcodesList[] = ExampleForm::SHORTCODE_NAME;

        ExampleList::initShortcode();
        self::$shortcodesList[] = ExampleList::SHORTCODE_NAME;
    }

    public static function getShortcodesList()
    {
        return self::$shortcodesList;
    }
}