<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','age','gender','teacher_id'];

    /*Student related to teacher*/
    public function Teacher() {
        return $this->belongsTo('App\Models\Teacher','teacher_id');
    }
    /*Student related to mark*/
    public function Mark() {
        return $this->belongsTo('App\Models\Mark','id');
    }
}
