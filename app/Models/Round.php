<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Round extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tb_rounds';

    public $timestamps = false;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'round_date', 'round_time', 'round_latitude', 'round_longitude', 'round_user', 'round_zone'
    ];

    /**
     * Function for validate data.
     */
    public function isValid($data)
    {
        $rules = [
            'round_date' => 'required',
            'round_time' => 'required',
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {
            return true;
        }
        $this->errors = $validator->errors();
        return false;
    }

    public function zone() 
    {
        return $this->belongsTo(Zone::class, 'round_zone');
    }
    public function user() 
    {
        return $this->belongsTo(User::class, 'round_user');
    }

}
