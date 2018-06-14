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
class Category extends Eloquent
{
    protected $table = 'category';
    public $timestamps = false;

    protected $casts = [
        'id' => 'int'
    ];

    protected $fillable = [
        'nom'
    ];

    public function show()
    {
        return $this->hasMany(\App\Show::class);
    }

}
