<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Penyakit
 * @package App\Models
 * @version July 7, 2018, 9:11 pm UTC
 */
class Penyakit extends Model
{
    use SoftDeletes;

    public $table = 'penyakits';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'penyakit',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'penyakit' => 'string',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'penyakit' => 'required',
        'keterangan' => 'required'
    ];

    
}
