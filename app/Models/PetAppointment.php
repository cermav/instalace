<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $id)
 * @method static findOrFail(int $event_id)
 */
class PetAppointment extends Model
{
    public $table = "pet_appointments";
    protected $fillable = [
        'owners_id',
        'date',
        'title',
        'updated_at',
        'created_at',
        'pet_id',
        'doctor_id',
        'start',
        'end',
        'accepted',
        'assigned_to',
        'phone_number',
        'mail',
        'name',
        'surname',
        'allDay'
    ];

    public function records() {
            return $this->hasOne(Record::class);
        }
}
