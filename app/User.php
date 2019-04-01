<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Book;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_initial',
        'last_name',
        'birthday',
        'username',
        'password',
        'email', 
        'contact_number',
        'type', 
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /* RELATIONSHP */
    public function borrows()
    {
        return $this->hasMany('App\Borrows','user_id');
    }

    public function books()
    {
        /*
            return $this and use its ff. methods:
                ->belongsToMany
                    **pass the Book class and the table 'user_book'
                ->withPivot
                    **pass the 'quantity' column
                ->withTimestamps
        */
    }
    
    public function requests()
    {
        /*
            return $this and use its ff. methods:
                ->belongsToMany
                    **pass the Book class and the table 'book_request'
                ->withPivot
                    **pass the 'quantity' and 'status' columns
                ->withTimestamps
        */
    }
}
