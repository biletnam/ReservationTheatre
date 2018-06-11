<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 29 May 2018 21:39:59 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Representation
 * 
 * @property int $id
 * @property int $show_id
 * @property \Carbon\Carbon $when
 * @property int $location_id
 * 
 * @property \App\Models\Show $show
 * @property \App\Models\Location $location
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Representation extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'show_id' => 'int',
		'location_id' => 'int'
	];

	protected $dates = [
		'when'
	];

	protected $fillable = [
		'show_id',
		'when',
		'location_id'
	];

	public function show()
	{
		return $this->belongsTo(\App\Show::class);
	}

	public function location()
	{
		return $this->belongsTo(\App\Location::class);
	}

	public function users()
	{
		return $this->belongsToMany(\App\Models\User::class)
					->withPivot('id', 'places');
	}
}
