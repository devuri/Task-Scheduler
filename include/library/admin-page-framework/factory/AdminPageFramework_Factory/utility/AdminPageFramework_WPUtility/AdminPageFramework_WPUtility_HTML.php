<?php
/**
 Admin Page Framework v3.5.8b01 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/admin-page-framework>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
class TaskScheduler_AdminPageFramework_WPUtility_HTML extends TaskScheduler_AdminPageFramework_WPUtility_URL {
    static public function generateAttributes(array $aAttributes) {
        $_sQuoteCharactor = "'";
        $_aOutput = array();
        foreach ($aAttributes as $_sAttribute => $_vProperty) {
            if (in_array(gettype($_vProperty), array('array', 'object', 'NULL'))) {
                continue;
            }
            $_aOutput[] = "{$_sAttribute}={$_sQuoteCharactor}" . esc_attr($_vProperty) . "{$_sQuoteCharactor}";
        }
        return implode(' ', $_aOutput);
    }
    static public function generateDataAttributes(array $aArray) {
        return self::generateAttributes(self::getDataAttributeArray($aArray));
    }
    static public function generateHTMLTag($sTagName, array $aAttributes, $sValue = null) {
        $_sTag = tag_escape($sTagName);
        return null === $sValue ? "<" . $_sTag . " " . self::generateAttributes($aAttributes) . " />" : "<" . $_sTag . " " . self::generateAttributes($aAttributes) . ">" . $sValue . "</{$_sTag}>";
    }
}