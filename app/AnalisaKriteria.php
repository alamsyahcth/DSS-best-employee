<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalisaKriteria extends Model
{
    protected $table = 'analisa_kriterias';
    protected $fillable = [
        'id_analisa_kriteria',
        'date',
        'id_kriteria_1',
        'id_kriteria_2',
        'nilai_analisa_kriteria',
        'hasil_analisa_kriteria',
    ];
}
