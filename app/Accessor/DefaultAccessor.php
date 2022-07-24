<?php
namespace App\Accessor;


trait DefaultAccessor
{
    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }
    public function getTitleAndBodyAttribute()
    {
        return $this->title.'-'.$this->body;
    }
}