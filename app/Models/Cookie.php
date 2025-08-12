<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cookie
 * 
 * @property int $id
 * @property int|null $hash
 * @property Carbon|null $expire
 * @property string|null $json_cookie
 * @property Carbon $created_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Cookie extends Model
{
	protected $table = 'Cookie';
	public $timestamps = false; 

	protected $casts = [
		'hash' => 'int'
	];

	protected $dates = [
		'expire'
	];

	protected $fillable = [
		'hash',
		'expire',
		'json_cookie'
	];
	
	//Se esiste appartiene solo a questo user
	public function user()
	{
		return $this->belongsTo(User::class, 'id');
	}
}
