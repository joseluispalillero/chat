<?php

namespace MilSonUno\Chat\Conversations;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = 'Conversations';
    public $timestamps = true;
    public $fillable = [
        'user_one',
        'user_two',
        'status',
    ];

    /*
     * make a relation between message
     *
     * return collection
     * */
    public function messages()
    {
        return $this->hasMany('MilSonUno\Chat\Messages\Message', 'conversation_id')
            ->with('sender');
    }

    /*
     * make a relation between first user from conversation
     *
     * return collection
     * */
    public function userone()
    {
        return $this->belongsTo(config('Chat.user.model', 'App\User'),  'user_one');
    }

    /*
   * make a relation between second user from conversation
   *
   * return collection
   * */
    public function usertwo()
    {
        return $this->belongsTo(config('Chat.user.model', 'App\User'),  'user_two');
    }
}
