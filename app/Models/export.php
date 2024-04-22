<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;



class export extends Model
{

    use Sortable;
    public $table = 'export';

    protected $primaryKey = 'id';


    public $fillable = [
        'date',
        'cn',
        'booking',
        'container',
        'seal',
        'size',
        'destination',
        'scn',
        'cda',
        'vessel_name',
        'req_date',
        'gate_open',
        'clossing',
        'agent',
        'depot',
        'depot_date',
        'send_date',
        'back_date',
        'trailer',
        'status',
        'customer_id',
        'confirmation',
        'img_src'
    ];


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

}
