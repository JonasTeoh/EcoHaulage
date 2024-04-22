<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    use Sortable;
    protected $fillable = [
        'name',
        'contact_number'
    ];

    public $sortable = [
        'name',
        'contact_number'
    ];

    public function import()
    {
        return $this->hasMany(Course::class, 'import_id');
    }

    public function export()
    {
        return $this->hasMany(export::class, 'export_id');
    }
}
