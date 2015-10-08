<?php

namespace App\Data\Joomla;

use Illuminate\Database\Eloquent\Model;

class ContentItemTagMap extends Model
{
	protected $connection = 'joomla';

    protected $table = 'ln5lf_contentitem_tag_map';

	public $timestamps = false;

	protected $guarded = [];
}
