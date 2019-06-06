<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'phone', 'company_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public function Company(){
        return $this->belongsTo(Company::class);
    }
}
