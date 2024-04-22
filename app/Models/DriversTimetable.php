<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class DriversTimetable extends Model
{
    use HasFactory;


    use Sortable;
    public $table = 'drivers';

    protected $primaryKey = 'id';


    protected $fillable = [
        'email',
        'contact',
        'vechicle_no',
        'driver_id'
    ];

    protected $casts = [
        'driver_id' => 'integer'
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'driver_id');
    }

    public function schedules2()
    {
        return $this->hasMany(Schedule::class, 'import_id');
    }

    public function schedules3()
    {
        return $this->hasMany(Schedule::class, 'export_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}
