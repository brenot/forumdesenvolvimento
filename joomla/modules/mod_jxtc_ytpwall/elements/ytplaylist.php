<?php
/**
 * @version		1.6.0
 * @package		JoomlaXTC YouTube Playlist Wall for Joomla 3.x
 * @author		JoomlaXTC http://www.joomlaxtc.com
 * @copyright	Copyright (C) 2015 Monev Software LLC. All rights reserved.
 * @license		http://opensource.org/licenses/GPL-2.0 GNU Public License, version 2.0
 */

defined( '_JEXEC' ) or die;

JHTML::_('behavior.modal',  "a.modal");

class JFormFieldYtplaylist extends JFormField {

  protected $_name = 'Ytplaylist';

  protected function getInput() {

		$document = JFactory::getDocument();
		$document->addScript(JUri::root().'modules/mod_jxtc_ytpwall/elements/ytplaylist.min.js');

		$html = '
<div class="input-append">
  <input type="text" class="input-xlarge" name="'.$this->name.'" id="'.$this->id.'" value="'.htmlspecialchars($this->value,ENT_COMPAT,'UTF-8').'" />
  <div class="btn-group">
		<button class="btn dropdown-toggle" data-toggle="dropdown">
	    <i class="icon icon-cog"></i>
  	</button>
    <div class="dropdown-menu keep-open well well-small">
	    Select playlists from a channel:<br><br>
		 	<input type="text" id="userName" placeholder="YouTube channel name">
			<button type="button" class="btn" onClick="ytplquery();" />Query</button>
			<div id="ytplerror" style="color:#F00"></div>
			<div id="ytplresult"></div>
    </div>
	</div>
</div>
<script type="text/javascript">
jQuery(function() { jQuery(".keep-open").click(function(e) { e.stopPropagation(); }); });
</script>
';

		return $html;
  }
}