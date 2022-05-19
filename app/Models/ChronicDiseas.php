<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChronicDiseas extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'chronic_diseas';
    protected $primaryKey = 'IDdisease' ;
    protected $guarded = [];
}
