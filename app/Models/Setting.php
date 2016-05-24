<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	public $fillable = [
		'certified',
		'tags',
		'show_first',
		'pagination_count',
		'pagination_type',
		'date_format',
	];
}
