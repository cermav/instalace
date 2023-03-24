<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static create(array $array)
 */
class Record extends Model {
    protected $table = 'pet_records';
    public $timestamps = false;
    protected $fillable = [
            'appointment_id',
            'pet_id',
            'date',
            'medical_record',
            'description',
            'doctor_id',
            'time'
    ];

    public function files() {
        return $this->hasMany(RecordFile::class);
    }

     public function items() {
            return $this->hasMany(InvoiceItem::class);
    }
}
