<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * This model only used to store description of subject related to particular grade.
 * Eg: Grade 1 Sinhala description.
 * Everyother places use Grade and Subject independantly.
 */
class GradeSubject extends Model
{
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function unitsForFirstTerm()
    {
        return $this->hasMany(Unit::class)->where('units.term_id','=','1');
    }

    public function unitsForSecondTerm()
    {
        return $this->hasMany(Unit::class)->where('units.term_id','=','2');
    }

    public function unitsForThirdTerm()
    {
        return $this->hasMany(Unit::class)->where('units.term_id','=','3');
    }
}
