<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'age',
        'gender',
        'dob',
        'teacher_id',
        'description',
    ];

    protected $with = [
        'teacher'
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
     * Teacher
     */
    public function teacher()
    {
        return $this->hasOne('App\Teacher', 'id', 'teacher_id');
    }
}
