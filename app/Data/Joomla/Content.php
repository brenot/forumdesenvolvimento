<?php

namespace App\Data\Joomla;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	protected $connection = 'joomla';

    protected $table = 'ln5lf_content';

	public $timestamps = false;

	protected $guarded = [];
}
