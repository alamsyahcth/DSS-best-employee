<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $table = 'criterias';
    protected $fillable = [
        'criteria_code',
        'name',
        'total_criteria',
        'total_add_criteria	',
        'weight_criteria',
    ];
}
