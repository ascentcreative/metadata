<?php

namespace AscentCreative\Metadata\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metadata extends Model {

    use HasFactory;

    public $fillable = ['metadatable_type', 'metadatable_id', 'key', 'value'];

    public $table = 'metadata';

    static $forms_keyfield = 'key';
    static $forms_valuefield = 'value';


    public $casts = [
        'value' => 'array',
    ];


}