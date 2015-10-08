<?php

namespace App\Data\Joomla;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
	protected $connection = 'joomla';

    protected $table = 'ln5lf_assets';

	public $timestamps = false;

	protected $guarded = [];
}
