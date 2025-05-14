<?php 
namespace Inc\Templates\Shortcodes;

class ShortcodesManager
{
    /** @var string[] */
    private static array $shortcodesList = [];

    public static function init()
    {
        BlogList::initShortcode();
        self::$shortcodesList[] = BlogList::getShortcodeName();

        ExampleForm::initShortcode();
        self::$shortcodesList[] = ExampleForm::getShortcodeName();

        ExampleList::initShortcode();
        self::$shortcodesList[] = ExampleList::getShortcodeName();
    }

    public static function getShortcodesList()
    {
        return self::$shortcodesList;
    }
}