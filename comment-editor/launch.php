<?php

Weapon::add('shell_after', function() {
    if(Config::get('page_type') == 'article') {
        echo Asset::stylesheet('manager/shell/editor.css');
    }
});

Weapon::add('sword_after', function() {
    if(Config::get('page_type') == 'article') {
        echo Asset::javascript(array(
            'manager/sword/editor/editor.min.js',
            'manager/sword/editor/mte.min.js'
        ));
        echo '<script>(function(a,b){var c=b.getElementById(\'comment-form\').getElementsByTagName(\'textarea\')[0];new MTE(c,{shortcut:1,toolbarClass:\'editor-toolbar cf\'})})(window,document);</script>';
    }
});