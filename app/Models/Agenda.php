<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'table_agenda';
    protected $fillable = [
        'id',
        'nama',
        'tempat',
        'deskripsi',
        'dateTime',
        'startTime',
        'endTime',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'dateTime' => 'datetime',
        'startTime' => 'datetime',
        'endTime' => 'datetime',
    ];

    public function detail()
    {
        return $this->hasMany(Detail::class);
    }

    //agenda many to many user
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}