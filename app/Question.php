<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title','body'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function setTitleAttribute($value){
    //     $this->attributes['title'] = $value;
    //     $this->attributes['slug'] = \Illuminate\Support\Str::slug($value);
    // }

    public function getStatusAttribute(){
        if($this->answer_count> 0){
            if( $this->best_answer_id){
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
        // $question->answers->count()
        // foreach ($question->answers as $answer)
    }
}
