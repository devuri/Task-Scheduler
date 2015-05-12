<?php
/**
 Admin Page Framework v3.5.8b01 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/admin-page-framework>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
class TaskScheduler_AdminPageFramework_AdminNotice {
    public function __construct($sNotice, array $aAttributes = array('class' => 'error')) {
        $this->sNotice = $sNotice;
        $this->aAttributes = $aAttributes + array('class' => 'error',);
        $this->aAttributes['class'].= ' admin-page-framework-settings-notice-message';
        if (did_action('admin_notices')) {
            $this->_replyToDisplayAdminNotice();
        } else {
            add_action('admin_notices', array($this, '_replyToDisplayAdminNotice'));
        }
    }
    public function _replyToDisplayAdminNotice() {
        echo "<div " . $this->_getAttributes($this->aAttributes) . ">" . "<p>" . $this->sNotice . "</p>" . "</div>";
    }
    private function _getAttributes(array $aAttributes) {
        $_sQuoteCharactor = "'";
        $_aOutput = array();
        foreach ($aAttributes as $_sAttribute => $_asProperty) {
            if ('style' === $_sAttribute && is_array($_asProperty)) {
                $_asProperty = $this->_getInlineCSS($_asProperty);
            }
            if (in_array(gettype($_asProperty), array('array', 'object', 'NULL'))) {
                continue;
            }
            $_aOutput[] = "{$_sAttribute}={$_sQuoteCharactor}" . esc_attr($_asProperty) . "{$_sQuoteCharactor}";
        }
        return trim(implode(' ', $_aOutput));
    }
    private function _getInlineCSS(array $aCSSRules) {
        $_aOutput = array();
        foreach ($aCSSRules as $_sProperty => $_sValue) {
            $_aOutput[] = $_sProperty . ': ' . $_sValue;
        }
        return implode('; ', $_aOutput);
    }
}