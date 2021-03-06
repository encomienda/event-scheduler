<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'middle_name',
        'gender',
        'email',
        'password',
        'course_id',
        'year_level',
        'role',
        'status',
        'student_id',
        'instructor_id',
        'username'
    ];

    protected $appends = ['exam_schedules'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function subjects()
    {
        return $this->hasMany(UserSubject::class, 'user_id');
    }

    public function getExamSchedulesAttribute()
    {
        $subjectIds = collect($this->subjects()->get())->pluck('subject_id');
        return ExamSchedule::whereIn('subject_id', $subjectIds)
        ->get();
    }
}
