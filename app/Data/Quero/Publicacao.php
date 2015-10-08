<?php

namespace App\Data\Quero;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
	protected $connection = 'quero';

    protected $table = 'olalacms_publicacao';

	protected $guarded = [];
}
