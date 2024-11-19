<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joblist extends Model
{
    public $timestamps = true;
    protected $table = "joblists";
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'email',
        'company_Name',
        'status',
        'number_impressions',
        'number_applies',
        'number_views'
    ];
}
