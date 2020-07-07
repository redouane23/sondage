<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sondage extends Model
{

    protected $guarded = [];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {

        return asset('uploads/sondage_images/' . $this->image);
    }//end of get image path

    public function users()
    {

        return $this->belongsToMany(User::class, 'sondage_user')->withPivot('oui', 'non', 'ignorer');

    } // end of users

    public function oui()
    {
        $total = 0;
        foreach ($this->users as $user) {

            $total += $user->pivot->oui;
        }
        return $total;
    }

    public function non()
    {
        $total = 0;
        foreach ($this->users as $user) {

            $total += $user->pivot->non;
        }
        return $total;
    }

    public function ignorer()
    {
        $total = 0;
        foreach ($this->users as $user) {

            $total += $user->pivot->ignorer;
        }
        return $total;
    }

}
