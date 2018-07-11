<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gejala
 * @package App\Models
 * @version July 7, 2018, 9:15 pm UTC
 */
class Gejala extends Model
{
    use SoftDeletes;

    public $table = 'gejalas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'gejala',
        'md',
        'mb'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'gejala' => 'string',
        'md' => 'double',
        'mb' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'gejala' => 'required',
        'md' => 'required',
        'mb' => 'required'
    ];

    
}
