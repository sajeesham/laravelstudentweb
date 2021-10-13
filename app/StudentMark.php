<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentMark extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'student_id',
        'subject_id',
        'term',
        'mark',
    ];

    protected $with = [
        'subject','student'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];

    /**
     * subject
     */
    public function subject()
    {
        return $this->hasOne('App\Subject', 'id', 'subject_id');
    }
      /**
     * student
     */
    public function student()
    {
        return $this->hasOne('App\Student', 'id', 'student_id');
    }
}
