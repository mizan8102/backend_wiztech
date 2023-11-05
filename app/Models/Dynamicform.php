<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dynamicform extends Model
{
    use HasFactory;
    const TYPE_TEXT = 'text';
    const TYPE_DATE = 'date';
    const TYPE_TIME = 'time';
    const TYPE_TEXTAREA = 'textarea';
    const TYPE_SELECT = 'select';
    const TYPE_RADIO = 'radio';
    const TYPE_CHECKBOX = 'checkbox';

    protected $fillable = ['title'];

    public function formproperties()
    {
        return $this->hasMany(Formproperty::class,'dynamicforms_id','id');
    }
}
