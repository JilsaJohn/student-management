<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mark extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['student_id','term','maths','science','history','total'];

/*join the student*/
     public function Student() {
        return $this->hasOne('App\Models\Student','id','student_id');
    }
}
