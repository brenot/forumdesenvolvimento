<?php

namespace App\Data\Joomla;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $connection = 'joomla';

    protected $table = 'ln5lf_tags';

	public $timestamps = false;

	protected $guarded = [];
}
