<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $parameters
 * @property string $parameters_name
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 */
class AppConfig extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'appconfig';

    /**
     * @var array
     */
    protected $fillable = ['parameters', 'parameters_name', 'value', 'created_at', 'updated_at'];

}
