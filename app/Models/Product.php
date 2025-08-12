<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $id
 * @property string $nome
 * @property float $prezzo
 * @property string|null $descrizione
 * @property int $tipo
 * @property int $quantita
 * @property string|null $imag_url
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'Product';

	protected $casts = [
		'prezzo' => 'float',
		'tipo' => 'int',
		'quantita' => 'int'
	];

	protected $fillable = [
		'nome',
		'prezzo',
		'descrizione',
		'tipo',
		'quantita',
		'imag_url'
	];


	//appartiene a uno solo ordine (OPPURE belongs to many n:n se un prodotto viene considerato doppione??? )
	public function orders()
	{
		return $this->belongsTo(Order::class, 'id_prod');
	}
}
