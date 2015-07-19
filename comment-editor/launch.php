<?php

if($config->comments && $config->page_type === 'article') {

    if($config->html_parser === 'HTML') {
        Filter::add('shield:lot', function($data) {
            $data['speak']->comment_guide = "";
            return $data;
        });
    }

    Weapon::add('shell_after', function() use($config) {
        if( ! Asset::loaded('manager/assets/shell/editor.css')) {
            echo Asset::stylesheet('manager/assets/shell/editor.css');
        }
        if( ! Asset::loaded($config->protocol . ICON_LIBRARY_PATH)) {
            echo Asset::stylesheet($config->protocol . ICON_LIBRARY_PATH);
        }
    });

    Weapon::add('SHIPMENT_REGION_BOTTOM', function() use($config) {
        if( ! Asset::loaded('manager/assets/sword/editor/editor.min.js')) {
            echo Asset::javascript('manager/assets/sword/editor/editor.min.js');
        }
        if( ! Asset::loaded('manager/assets/sword/editor/mte.min.js')) {
            echo Asset::javascript('manager/assets/sword/editor/mte.min.js');
        }
        if( ! Asset::loaded('manager/assets/sword/editor/hte.min.js')) {
            echo Asset::javascript('manager/assets/sword/editor/hte.min.js');
        }
        echo O_BEGIN . '<script>(function(a,b){if(typeof MTE=="undefined"){return}var c=b.getElementById(\'comment-form\');if(!c){return}var t=c.message,p=c.content_type;if(typeof HTE!="undefined"){var k=\'' . $config->html_parser . '\';if(k==\'HTML\'){MTE=HTE;if(!p){var o=b.createElement(\'input\');o.name=\'content_type\';o.type=\'hidden\';o.value=\'HTML\';c.appendChild(o)}}}t.className+=\' code\';new MTE(t,{tabSize:\'' . TAB . '\',shortcut:1,toolbarClass:\'editor-toolbar cf\',emptyElementSuffix:\'' . ES . '\'})})(window,document);</script>' . O_END;
    });

}