<?php

Weapon::add('shell_after', function() use($config) {
    if(Config::get('page_type') == 'article') {
        echo Asset::stylesheet('manager/shell/editor.css');
        $font = $config->protocol . 'maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css';
        if( ! Asset::loaded($font)) echo Asset::stylesheet($font);
    }
});

Weapon::add('sword_after', function() {
    if(Config::get('page_type') == 'article') {
        echo Asset::javascript(array(
            'manager/sword/editor/editor.min.js',
            'manager/sword/editor/mte.min.js'
        ));
        echo '<script>(function(a,b){var c=b.getElementById(\'comment-form\').getElementsByTagName(\'textarea\')[0];c.className=c.className+= \' code\';new MTE(c,{shortcut:1,toolbarClass:\'editor-toolbar cf\'})})(window,document);</script>';
    }
});