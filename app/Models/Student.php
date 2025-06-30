<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'nisn','nik','email', 'phone','address','schooladdress','school','gender','birth_date','major','status'];
}