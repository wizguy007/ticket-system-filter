<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
