<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'date',
    ];
    use HasFactory;
    // protected $table = 'postagens';
    // protected $primaryKey = 'id_postagem';
    // protected $keyType = 'string';
    // protected $incrementing = false;
    // protected $timestamps = true;
    // const CREATED_AT = 'data_criacao';
    // const UPDATED_AT = 'data_atualizacao';
    // protected $dateFormat = 'd/m/Y';
    // protected $connection = 'pgsql';
    // protected $attributes = [
    //     'active' => true
    // ];
}
