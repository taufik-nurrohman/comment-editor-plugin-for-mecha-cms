<?php

if($config->comments) {

    Weapon::add('shell_after', function() use($config) {
        if(Config::get('page_type') == 'article') {
            if( ! Asset::loaded('manager/shell/editor.css')) echo Asset::stylesheet('manager/shell/editor.css');
            if( ! Asset::loaded($config->protocol . ICON_LIBRARY_PATH)) echo Asset::stylesheet($config->protocol . ICON_LIBRARY_PATH);
        }
    });

    Weapon::add('SHIPMENT_REGION_BOTTOM', function() {
        if(Config::get('page_type') == 'article') {
			if( ! Asset::loaded('manager/sword/editor/editor.min.js')) echo Asset::javascript('manager/sword/editor/editor.min.js');
			if( ! Asset::loaded('manager/sword/editor/mte.min.js')) echo Asset::javascript('manager/sword/editor/mte.min.js');
            echo O_BEGIN . '<script>(function(a,b){var c=b.getElementById(\'comment-form\').getElementsByTagName(\'textarea\')[0];c.className=c.className+= \' code\';new MTE(c,{shortcut:1,toolbarClass:\'editor-toolbar cf\'})})(window,document);</script>' . O_END;
        }
    });

}