<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 29 May 2018 21:39:59 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Type
 * 
 * @property int $id
 * @property string $type
 * 
 * @property \Illuminate\Database\Eloquent\Collection $artists
 *
 * @package App\Models
 */
class Type extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'type'
	];

	public function artists()
	{
		return $this->belongsToMany(\App\Artist::class, 'artiste_type')
					->withPivot('id');
	}
}
