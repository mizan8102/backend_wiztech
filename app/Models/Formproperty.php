<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formproperty extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'label', 'data', 'dynamicforms_id'];

    public function dynamicform()
    {
        return $this->belongsTo(Dynamicform::class);
    }
}
