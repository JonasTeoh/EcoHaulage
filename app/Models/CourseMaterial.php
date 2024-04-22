<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class CourseMaterial extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'lessons';
    protected $primaryKey = 'id';
    protected $fillable = ['lesson'];

    public $sortable = ['lesson'];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
