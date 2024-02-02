<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChannelPermission extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "channel_permissions";


    protected $primaryKey = "id";

    public function title() : HasOne
    {
        return $this->hasOne(Title::class,"id","title_id");
    }


    public function channel() : HasOne
    {
        return $this->hasOne(Channel::class,"id","channel_id");
    }

}
