<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class social extends Model
{
    public function show_socials()
    {
        foreach(social::distinct()->get(['url_socials' , 'social_name']) as $socials){
            echo  "<a href = '$socials->url_socials'>" . "$socials->social_name".'</a><br>';
        };
    }
}
