<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 29 May 2018 21:39:59 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Show
 * 
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $poster_url
 * @property int $location_id
 * @property bool $bookable
 * @property float $price
 * 
 * @property \App\Models\Location $location
 * @property \Illuminate\Database\Eloquent\Collection $artiste_types
 * @property \Illuminate\Database\Eloquent\Collection $representations
 *
 * @package App\Models
 */
class Show extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'location_id' => 'int',
		'bookable' => 'bool',
		'price' => 'float'
	];

	protected $fillable = [
	    'id',
		'slug',
		'title',
		'poster_url',
		'location_id',
		'bookable',
		'price',
        'category_id'
	];

	public function location()
	{
		return $this->belongsTo(\App\Location::class);
	}

	public function artiste_types()
	{
		return $this->belongsToMany(\App\ArtisteType::class)
					->withPivot('id');
	}

	public function category(){

	    return $this->belongsto(\App\Category::class);

    }

	public function representations()
	{
		return $this->hasMany(\App\Representation::class);
	}
}
