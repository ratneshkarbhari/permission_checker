<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Channel extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "channels";


    protected $primaryKey = "id";

    public function manager_data(): HasOne
    {
        return $this->hasOne(Manager::class,'id','manager');
    }

}
