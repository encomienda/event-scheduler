<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    protected $fillable = [
        'subject_id',
        'date',
        'time_start',
        'time_end',
        'proctor_id',
        'room_id',
        'section_id',
        'term',
        'day',
        'school_year',
        'semester'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function proctor()
    {
        return $this->belongsTo(User::class, 'proctor_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
