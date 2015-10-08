<?php

namespace App\Data\Joomla;

use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
	protected $connection = 'joomla';

    protected $table = 'ln5lf_content_types';

	public $timestamps = false;

	protected $guarded = [];
}
