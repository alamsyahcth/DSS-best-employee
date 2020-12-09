<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalScore extends Model
{
    protected $table = 'final_scores';
    protected $fillable = [
        'alternative_code',
        'date',
        'employee_id',
        'criteria_id',
        'score',
        'total_criteria_alternative',
    ];
}
