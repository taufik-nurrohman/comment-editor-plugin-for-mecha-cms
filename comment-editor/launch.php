<?php

if($config->comments->allow && $config->page_type === 'article') {
    if($config->html_parser->active === 'HTML') {
        $speak->comment_wizard = Config::speak('__comment_editor_wizard');
        Config::set('speak.comment_wizard', $speak->comment_wizard);
    }
    Weapon::add('shell_after', function() use($config) {
        $s = PLUGIN . DS . 'editor' . DS . 'assets' . DS . 'shell' . DS . 'editor.css';
        if( ! Asset::loaded($s)) echo Asset::stylesheet($s);
        $s = $config->protocol . ICON_LIBRARY_PATH;
        if( ! Asset::loaded($s)) echo Asset::stylesheet($s);
    });
    Weapon::add('SHIPMENT_REGION_BOTTOM', function() use($config) {
        $s = PLUGIN . DS . 'editor' . DS . 'assets' . DS . 'sword' . DS . 'editor.min.js';
        if( ! Asset::loaded($s)) echo Asset::javascript($s);
        $s = PLUGIN . DS . 'editor' . DS . 'assets' . DS . 'sword' . DS . 'hte.min.js';
        if( ! Asset::loaded($s)) echo Asset::javascript($s);
        $s = PLUGIN . DS . 'markdown' . DS . 'assets' . DS . 'sword' . DS . 'mte.min.js';
        if( ! Asset::loaded($s)) echo Asset::javascript($s);
        echo O_BEGIN . '<script>(function(a,b){if(typeof MTE=="undefined"){return}var c=b.getElementById(\'comment-form\');if(!c){return}var t=c.message,p=c.content_type;if(typeof HTE!="undefined"){var k=\'' . $config->html_parser->active . '\';if(!k||k==\'HTML\'){MTE=HTE;if(!p){var o=b.createElement(\'input\');o.name=\'content_type\';o.type=\'hidden\';o.value=\'HTML\';c.appendChild(o)}}}t.className+=\' code\';new MTE(t,{tabSize:\'' . TAB . '\',shortcut:1,toolbarClass:\'editor-toolbar cf\',emptyElementSuffix:\'' . ES . '\'})})(window,document);</script>' . O_END;
    });
}