<?php

/**
 * Created by Reliese Model.
 */

//namespace App\Models;

namespace App\models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * Class User
 *
 * @property int $id
 * @property string $username
 * @property string $nome
 * @property string $cognome
 * @property string $email
 * @property string $indirizzo
 * @property string $password
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Cookie $cookie
 * @property Order $order
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	protected $table = 'User';

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'nome',
		'cognome',
		'email',
		'indirizzo',
		'password'
	];

	//può avere un cookie [0,1]
	public function cookie()
	{
		return $this->hasOne(Cookie::class, 'id');
	}
	//può avere 0 o più ordini [0,N]
	public function order()
	{
		return $this->hasMany(Order::class, 'id_user');
	}
}
