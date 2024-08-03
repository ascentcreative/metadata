<?php

namespace AscentCreative\Metadata\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metadata extends Model {

    use HasFactory;

    public $fillable = ['metadatable_type', 'metadatable_id', 'key', 'value'];

    public $table = 'metadata';


    public $casts = [
        'value' => 'array',
    ];


}