<?php

function __($string, array $values = NULL, $lang = 'en-us')
{
    if ($lang !== I18n::$lang)
    {
        $string = I18n::get($string);
    }
    return empty($values) ? $string : strtr($string, $values);
}
function add_global($name, $value)
{
    View::$vars[$name] = $value;
}
function wpautop($pee, $br = true) {
    $pre_tags = array();

    if ( trim($pee) === '' )
        return '';

    $pee = $pee . "\n"; // just to make things a little easier, pad the end

    if ( strpos($pee, '<pre') !== false ) {
        $pee_parts = explode( '</pre>', $pee );
        $last_pee = array_pop($pee_parts);
        $pee = '';
        $i = 0;

        foreach ( $pee_parts as $pee_part ) {
            $start = strpos($pee_part, '<pre');

            // Malformed html?
            if ( $start === false ) {
                $pee .= $pee_part;
                continue;
            }

            $name = "<pre wp-pre-tag-$i></pre>";
            $pre_tags[$name] = substr( $pee_part, $start ) . '</pre>';

            $pee .= substr( $pee_part, 0, $start ) . $name;
            $i++;
        }

        $pee .= $last_pee;
    }

    $pee = preg_replace('|<br />\s*<br />|', "\n\n", $pee);
    // Space things out a little
    $allblocks = '(?:table|thead|tfoot|caption|col|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|select|option|form|map|area|blockquote|address|math|style|p|h[1-6]|hr|fieldset|noscript|legend|section|article|aside|hgroup|header|footer|nav|figure|figcaption|details|menu|summary)';
    $pee = preg_replace('!(<' . $allblocks . '[^>]*>)!', "\n$1", $pee);
    $pee = preg_replace('!(</' . $allblocks . '>)!', "$1\n\n", $pee);
    $pee = str_replace(array("\r\n", "\r"), "\n", $pee); // cross-platform newlines
    if ( strpos($pee, '<object') !== false ) {
        $pee = preg_replace('|\s*<param([^>]*)>\s*|', "<param$1>", $pee); // no pee inside object/embed
        $pee = preg_replace('|\s*</embed>\s*|', '</embed>', $pee);
    }
    $pee = preg_replace("/\n\n+/", "\n\n", $pee); // take care of duplicates
    // make paragraphs, including one at the end
    $pees = preg_split('/\n\s*\n/', $pee, -1, PREG_SPLIT_NO_EMPTY);
    $pee = '';
    foreach ( $pees as $tinkle )
        $pee .= '<p>' . trim($tinkle, "\n") . "</p>\n";
    $pee = preg_replace('|<p>\s*</p>|', '', $pee); // under certain strange conditions it could create a P of entirely whitespace
    $pee = preg_replace('!<p>([^<]+)</(div|address|form)>!', "<p>$1</p></$2>", $pee);
    $pee = preg_replace('!<p>\s*(</?' . $allblocks . '[^>]*>)\s*</p>!', "$1", $pee); // don't pee all over a tag
    $pee = preg_replace("|<p>(<li.+?)</p>|", "$1", $pee); // problem with nested lists
    $pee = preg_replace('|<p><blockquote([^>]*)>|i', "<blockquote$1><p>", $pee);
    $pee = str_replace('</blockquote></p>', '</p></blockquote>', $pee);
    $pee = preg_replace('!<p>\s*(</?' . $allblocks . '[^>]*>)!', "$1", $pee);
    $pee = preg_replace('!(</?' . $allblocks . '[^>]*>)\s*</p>!', "$1", $pee);
    if ( $br ) {
        $pee = preg_replace_callback('/<(script|style).*?<\/\\1>/s', '_autop_newline_preservation_helper', $pee);
        $pee = preg_replace('|(?<!<br />)\s*\n|', "<br />\n", $pee); // optionally make line breaks
        $pee = str_replace('<WPPreserveNewline />', "\n", $pee);
    }
    $pee = preg_replace('!(</?' . $allblocks . '[^>]*>)\s*<br />!', "$1", $pee);
    $pee = preg_replace('!<br />(\s*</?(?:p|li|div|dl|dd|dt|th|pre|td|ul|ol)[^>]*>)!', '$1', $pee);
    $pee = preg_replace( "|\n</p>$|", '</p>', $pee );

    if ( !empty($pre_tags) )
        $pee = str_replace(array_keys($pre_tags), array_values($pre_tags), $pee);

    return $pee;
}
function _autop_newline_preservation_helper( $matches ) {
    return str_replace("\n", "<WPPreserveNewline />", $matches[0]);
}
function site_url($uri = '')
{
    return rtrim(Config::get('app.url'), DS).DS.ltrim($uri, DS);
}
function asset_url($path = '')
{
    //if(Config::app('static')) {
    //    return rtrim(Config::app('static'), DS).ltrim($path, DS);
    //}
    return rtrim(Config::get('app.url'), DS).'/quill/static/'.ltrim($path, '/');
}
function theme_url($path = '')
{
    //if(Config::app('static')) {
    //    return rtrim(Config::app('static'), DS) . DS . 'themes' . DS . ltrim($path, DS);
    //}
    return rtrim(Config::get('app.url'), '/'). DS . 'themes' . DS . Config::app('themes.site').'/static/'.ltrim($path, '/');
}
function module_url()
{

}
function body_class($classes = '')
{
    $pattern = isset($_SERVER['REQUEST_URI']) ? ltrim($_SERVER['REQUEST_URI'], "/") : "/";
    $pattern = explode('/', $pattern);
    if (!$pattern[0]) {
        $classes[] = 'home';
    } else {
        $classes[] = $pattern[0];
    }
    return 'class="'.implode(' ', $classes).'"';
}
function avatar( $email = null, $size = 80, $default = 'mm', $r = 'g', $img = true, $atts = array() )
{
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$size&d=$default&r=$r";
    if ( $img )
    {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}
function runtime()
{
    return round((microtime(true) - START_TIME) * 1000, 1) . ' ms';
}
function memory_usage()
{
    return round((memory_get_usage() - START_MEMORY)/1024, 2) . ' kb';
}