<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Man extends Model
{
    use Searchable;

    //Mass assigned
    protected $guarded = ['id'];

    //Polymorphic relation with categories
    public function categories()
    {
        return $this->morphToMany('App\Category', 'categoryable');
    }

    //Get children 
    public function children()
    {
        return $this->hasMany(self::class, 'father_id');
    }

    // Father
    public function father()
    {
        return $this->belongsTo(self::class, 'father_id');
    }

    // Mother
    public function mother()
    {
        return $this->belongsTo('App\Woman', 'mother_id');
    }

    // Kyzdary
    public function kyzdary()
    {
        return $this->hasMany('App\Woman', 'father_id');
    }

    public function scopeLastMen($query, $count)
    {
        return $query->orderBy('id', 'desc')->take($count)->get();
    }

    public function scopeMostCommonNames($query, $count)
    {
        return $query->selectRaw('count(*) as name_count, name')->groupBy('name')->orderBy('name_count', 'desc')->take($count)->get();
    }

    // public function full_generation(Man $man, Array $full_generation = [])
    // {
    //     if ($man->id != 0)
    //     {
    //         $full_generation[] = $man;
    //         $man = Man::find($man->father_id);
    //         full_generation($man, $full_generation);
    //     }
    //     else
    //     {
    //         $count = count($full_generation);
    //         $fullg = '';
    //         for ($i=$count; $i > 0; $i--)
    //         { 
    //             $fullg .= '<a href="'.route('admin.man.edit', $full_generation[$i]).'">'.$full_generation[$i]->name.'</a>';
    //             if ($i != 1)
    //                 $fullg .= ' &rArr; ';
    //         }
    //         return $fullg;
    //     }
    // }
}
