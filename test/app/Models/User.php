<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 29 May 2018 21:39:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserController
 * 
 * @property int $id
 * @property string $login
 * @property string $password
 * @property int $role_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $langue
 * 
 * @property \App\Models\Role $role
 * @property \Illuminate\Database\Eloquent\Collection $representations
 *
 * @package App\Models
 */
class User extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'role_id' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'login',
		'password',
		'role_id',
		'firstname',
		'lastname',
		'email',
		'langue'
	];

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class);
	}

	public function representations()
	{
		return $this->belongsToMany(\App\Models\Representation::class)
					->withPivot('id', 'places');
	}
}
