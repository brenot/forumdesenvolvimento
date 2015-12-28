<?php
/**
 * @version		1.6.0
 * @package		JoomlaXTC YouTube Playlist Wall for Joomla 3.x
 * @author		JoomlaXTC http://www.joomlaxtc.com
 * @copyright	Copyright (C) 2015 Monev Software LLC. All rights reserved.
 * @license		http://opensource.org/licenses/GPL-2.0 GNU Public License, version 2.0
 */

defined( '_JEXEC' ) or die;

$doc = JFactory::getDocument();
$doc->addScript(JURI::base() . 'modules/mod_jxtc_ytpwall/js/jxtcytpwall.min.js');

$css = trim($params->get('css'));
if ($css) { $doc->addStyleDeclaration($css); }

switch ($params->get('jquery',2)) {
	case 1: $doc->addScript("//code.jquery.com/jquery-latest.min.js"); break;
	case 2: JHtml::_('jquery.framework'); break;
}

$template	= $params->get('template','');
$moduletemplate	= trim( $params->get('moduletemplate','{player}{grid}'));
$itemtemplate	= trim( $params->get('itemtemplate','{default_image}'));
if ($template && $template != -1) {
	$moduletemplate=file_get_contents(JPATH_ROOT.'/modules/mod_jxtc_ytpwall/templates/'.$template.'/module.html');
	$itemtemplate=file_get_contents(JPATH_ROOT.'/modules/mod_jxtc_ytpwall/templates/'.$template.'/element.html');
	if (file_exists(JPATH_ROOT.'/modules/mod_jxtc_ytpwall/templates/'.$template.'/template.css')) {
		$doc->addStyleSheet(JURI::base() . 'modules/mod_jxtc_ytpwall/templates/'.$template.'/template.css','text/css');
	}
}

$playList = $params->get('playList');
$moduletemplate = str_ireplace('{player}','<div id="jxtcytpwplayer"></div>',$moduletemplate);
$moduletemplate = str_ireplace('{title}','<span id="jxtcytpwtitle"></span>',$moduletemplate);
$moduletemplate = str_ireplace('{grid}','<div id="jxtcytpwgrid"></div>',$moduletemplate);
$moduletemplate = str_ireplace('{prev_button}','<div id="jxtcytpwprev" class="ytpw_prev" onclick="ytpwPrev()"></div>',$moduletemplate);
$moduletemplate = str_ireplace('{next_button}','<div id="jxtcytpwnext" class="ytpw_next" onclick="ytpwNext()"></div>',$moduletemplate);
$moduletemplate = str_ireplace('{playlist_url}','https://www.youtube.com/playlist?list='.$playList,$moduletemplate);
$moduletemplate = str_replace(array("\n","\r"),'',$moduletemplate);
$itemtemplate = str_replace(array("\n","\r"),'',$itemtemplate);
?>
<div id="jxtcytpw" class="ytpwPlaylist"><?php echo $moduletemplate; ?></div>
<script type="text/javascript">
	var tag = document.createElement('script');
	tag.src = 'https://www.youtube.com/iframe_api';
	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
	
	function onYouTubeIframeAPIReady() {
		ytpw({
			itemTemplate:'<?php echo $itemtemplate; ?>',
			playList:'<?php echo $playList; ?>',
			apiKey:'<?php echo $params->get('apiKey'); ?>',
			columns:<?php echo $params->get('columns',3); ?>,
			rows:<?php echo $params->get('rows',1); ?>,
			scrollTo:'<?php echo $params->get('scrollTo', ''); ?>',
			scrollToSpeed:<?php echo $params->get('scrollToSpeed', 500); ?>,
			poptions:{
				width:<?php echo $params->get('width', 640); ?>,
				height:<?php echo $params->get('height', 360); ?>,
				playerVars:{
					autoplay:<?php echo $params->get('autoplay', 0); ?>,
					autohide:<?php echo $params->get('autohide', 0); ?>,
					color:'<?php echo $params->get('color', 'red'); ?>',
					controls:<?php echo $params->get('controls', 1); ?>,
					disablekb:<?php echo $params->get('disablekb', 0); ?>,
					fs:<?php echo $params->get('fs', 1); ?>,
					iv_load_policy:<?php echo $params->get('autoplay', 0); ?>,
					rel:<?php echo $params->get('rel', 0); ?>,
					showinfo:<?php echo $params->get('showinfo', 1); ?>,
					theme:'<?php echo $params->get('theme', 'dark'); ?>'
				}
			}
		})
	};
</script>
