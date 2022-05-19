<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [ 'deleted_at'];
    protected $fillable = [];
    public function doctor(){
        return $this->belongsTo(Docrtor::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function patient(){
        return $this->belongsTo(Patients::class);
    }
}
