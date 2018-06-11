<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 29 May 2018 21:39:59 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ArtisteTypeShow
 * 
 * @property int $id
 * @property int $artiste_type_id
 * @property int $show_id
 * 
 * @property \App\Models\Show $show
 * @property \App\Models\ArtisteType $artiste_type
 *
 * @package App\Models
 */
class ArtisteTypeShow extends Eloquent
{
	protected $table = 'artiste_type_show';
	public $timestamps = false;

	protected $casts = [
		'artiste_type_id' => 'int',
		'show_id' => 'int'
	];

	protected $fillable = [
		'artiste_type_id',
		'show_id'
	];

	public function show()
	{
		return $this->belongsTo(\App\Show::class);
	}

	public function artiste_type()
	{
		return $this->belongsTo(\App\ArtisteType::class);
	}
}
