<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function create($payload)
    {
        try {
            $data = new User();
            $data->name = $payload->name;
            $data->email = $payload->email;
            $data->password = Hash::make($payload->password);
            $data->save();
        } catch (QueryException $e) {
            dd($e->errorInfo);
        }
        return $data;
    }

    public function getDataUser()
    {
        return $this->select('id', 'name', 'email', 'created_at')->where('role', 'user')->get();
    }

    public function deleteUser($id)
    {
        return $this->find($id)->delete();
    }
}
