<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 29 May 2018 21:39:59 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Locality
 * 
 * @property int $id
 * @property string $postal_code
 * @property string $locality
 * 
 * @property \Illuminate\Database\Eloquent\Collection $locations
 *
 * @package App\Models
 */
class Locality extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'postal_code',
		'locality'
	];

	public function locations()
	{
		return $this->hasMany(\App\Location::class);
	}
}
