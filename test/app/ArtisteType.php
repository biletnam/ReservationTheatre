<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 29 May 2018 21:39:59 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ArtisteType
 * 
 * @property int $id
 * @property int $artist_id
 * @property int $type_id
 * 
 * @property \App\Models\Artist $artist
 * @property \App\Models\Type $type
 * @property \Illuminate\Database\Eloquent\Collection $shows
 *
 * @package App\Models
 */
class ArtisteType extends Eloquent
{
	protected $table = 'artiste_type';
	public $timestamps = false;

	protected $casts = [
		'artist_id' => 'int',
		'type_id' => 'int'
	];

	protected $fillable = [
		'artist_id',
		'type_id'
	];

	public function artist()
	{
		return $this->belongsTo(\App\Artist::class);
	}

	public function type()
	{
		return $this->belongsTo(\App\Type::class);
	}

	public function shows()
	{
		return $this->belongsToMany(\App\Show::class)
					->withPivot('id');
	}
}
