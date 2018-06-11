<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 29 May 2018 21:39:59 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RepresentationUser
 * 
 * @property int $id
 * @property int $representation_id
 * @property int $user_id
 * @property int $places
 * 
 * @property \App\Models\Representation $representation
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class RepresentationUser extends Eloquent
{
	protected $table = 'representation_user';
	public $timestamps = false;

	protected $casts = [
		'representation_id' => 'int',
		'user_id' => 'int',
		'places' => 'int'
	];

	protected $fillable = [
		'representation_id',
		'user_id',
		'places'
	];

	public function representation()
	{
		return $this->belongsTo(\App\Representation::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class);
	}
}
