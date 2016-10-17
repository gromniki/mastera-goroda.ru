<?php
defined('COT_CODE') or die('Wrong URL');

/**
 * Parses string for attribute=value pairs and return arrays of attributes, values and quotes
 * @param string $attr_str - attributes string
 * @return mixed
 */
function get_attributes($attr_str){
 	preg_match_all('`([\w\-.:]+)(?:\s*=\s*(?|(?:"(.*?)(?<!\\\\)("))|(?:\'(.*?)(?<!\\\\)(\'))|([^>\s]+)))`',$attr_str,$m);
	//return array_combine($m[1], array_map(null,$m[2],$m[3]));
	return array($m[1], array_map(null,$m[2],$m[3]));
}
// attr parse #([\w\-.:]+)(?:\s*=\s*(?:(?:"([^"]*)")|(?:'([^']*)')|([^>\s]+)))#
// attr parse with inline escaped quotes:  ([\w\-.:]+)(?:\s*=\s*(?:(?:"(.*?)(?<!\\)")|(?:'(.*?)(?<!\\)')|([^>\s]+)))


/**
 * Parses text for IMG tags and transform it for «Lazy Load»
 * replaces some attrs and adds another one.
 * @param array $match - array of tag parts
 * @return string - new combined tag
 */
function img_lazyload($match){
	global $cfg,$ll_cfg;
	if ($match[0]) {
		list($att,$val) = get_attributes($match[0]);
		$att = array_map('strtolower', $att);
		$attrs = array_combine($att, $val);
		if (!$ll_cfg['lazy_class'] || in_array($ll_cfg['lazy_class'],explode(' ',$attrs['class'][0]))) {
			if ($attrs['src'][0]) {
				$src_tag = 'data-original'; // data-lazy-src
				$attrs[$src_tag][0] = $attrs['src'][0];
				$attrs['src'][0] = $cfg['plugins_dir'].'/lazyload/img/gray.gif';
			}
			if ($ll_cfg['def_height'] && empty($attrs['height'][0])) {
				$attrs['height'][0] = $ll_cfg['def_height'];
			}
			if ($ll_cfg['def_width'] && empty($attrs['width'][0])) {
				$attrs['width'][0] = $ll_cfg['def_width'];
			}

			if ($ll_cfg['add_noscript']) {
				$attrs['class'][0] .= ($attrs['class'][0]?' ':'').'lazy';
				$addon = '<noscript>'.$match[1].$match[2].'></noscript>';
			}
		}
		$attr_str = '';
		foreach ($attrs as $attr => $value) {
			$q = $value[1] ? $value[1] : '"';
			$attr_str .= ' '.$attr.'='.$q.$value[0].$q;
		}
		return $match[1].$attr_str.$match[3].$addon;
	}
}

/**
 * Parses text for IMG tags and transform it for «Lazy Load»
 * @param string $text - source html
 * @return mixed
 */
function lazyload_parse($text){
	$text = preg_replace_callback('`(<img)(.*?)(\/?>)`', 'img_lazyload', $text);
	return $text;
}

?>