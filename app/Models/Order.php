<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property int $id_user
 * @property int $id_prod
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property float $totale_spesa
 * @property int $stato
 *
 * @property Product $product
 * @property User $user
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'Order';
	public $incrementing = false;

	protected $casts = [
		'id_user' => 'int',
		'totale_spesa' => 'float',
		'stato' => 'int'
	];

	protected $fillable = [
        'id_user',
        'id_ship',
		'totale_spesa',
		'stato'
	];

	//può avere più prodotti
	public function product()
	{
		return $this->hasOne(Ship::class, 'id_ship');
	}

	// appartiene a uno solo user
	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}
}
