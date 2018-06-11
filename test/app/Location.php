<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 29 May 2018 21:39:59 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Location
 * 
 * @property int $id
 * @property string $slug
 * @property string $designation
 * @property string $address
 * @property int $locality_id
 * @property string $website
 * @property string $phone
 * 
 * @property \App\Models\Locality $locality
 * @property \Illuminate\Database\Eloquent\Collection $representations
 * @property \Illuminate\Database\Eloquent\Collection $shows
 *
 * @package App\Models
 */
class Location extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'locality_id' => 'int'
	];

	protected $fillable = [
		'slug',
		'designation',
		'address',
		'locality_id',
		'website',
		'phone'
	];

	public function locality()
	{
		return $this->belongsTo(\App\Locality::class);
	}

	public function representations()
	{
		return $this->hasMany(\App\Representation::class);
	}

	public function shows()
	{
		return $this->hasMany(\App\Show::class);
	}
}
