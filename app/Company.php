<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'phone'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function Customers(){
        return $this->hasMany(Customers::class);
    }
}
