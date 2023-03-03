<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'detail';
    protected $fillable = [
        'id',
        'agenda_id',
        'user_id',
        'status',
        'created_at',
        'updated_at',
    ];

    //agenda many to many user
    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }

    //user many to many agenda
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}