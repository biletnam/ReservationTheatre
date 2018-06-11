<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 29 May 2018 21:39:59 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ArtistController
 * 
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * 
 * @property \Illuminate\Database\Eloquent\Collection $types
 *
 * @package App\Models
 */

class Artist extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'firstname',
		'lastname'
	];

	public function types()
	{
		return $this->belongsToMany(\App\Type::class, 'artiste_type')
					->withPivot('id');
	}
}
