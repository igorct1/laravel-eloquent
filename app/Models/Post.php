<?php

namespace App\Models;

use App\Accessor\DefaultAccessor;
use App\Events\PostCreated;
use App\Scopes\YearScope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes, DefaultAccessor;

    protected $fillable = [
        'title',
        'body',
        'date',
    ];
    protected $casts = [
        'date' => 'datetime:d/m/Y',
        'active' => 'boolean'
    ];
    // protected $dispatchesEvents = [
    //     'created' => PostCreated::class,
    // ];
    protected static function booted()
    {
        // static::addGlobalScope('year', function (Builder $builder){ 
        //     $builder->whereYear('date', now()->year);
        // });

        static::addGlobalScope(new YearScope);
    }
    public function scopeLastWeek($query)
    {
        return $this->whereDate('date', '>=', now()->subDays(4))
                    ->whereDate('date', '<=', now()->subDays(1));
    }
    public function scopeToday($query)
    {
        return $this->whereDate('date', now());
    }

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

    // public function getTitleAttribute($value)
    // {
    //     return strtolower($value);
    // }
    // public function getTitleAndBodyAttribute()
    // {
    //     return $this->title.'-'.$this->body;
    // }

    // public function getDateAttribute($value)
    // {
    //     return Carbon::make($value)->format('d/m/Y');
    // }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::make($value)->format('Y/m/d');
    }
}
