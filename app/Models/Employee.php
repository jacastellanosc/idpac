<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Employee extends Model
{
    use HasFactory;

    protected $with = ['company'];

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'company_id'
    ];

    protected $hidden = [];

    public function company() {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }
}
