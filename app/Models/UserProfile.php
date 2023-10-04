<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class UserProfile
 * 
 * @property uuid $id
 * @property uuid $user_id
 * @property int $id_number
 * @property string $address
 * @property Carbon $date_of_birth
 * @property string $gender
 * @property int $age
 * @property int $postal_code
 * @property string $occupation
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class UserProfile extends Model
{
	use HasUuids,SoftDeletes;
	protected $table = 'user_profiles';
	public $incrementing = false;

	protected $casts = [
		'id' => 'uuid',
		'user_id' => 'uuid',
		'id_number' => 'int',
		'date_of_birth' => 'datetime',
		'age' => 'int',
		'postal_code' => 'int'
	];

	protected $fillable = [
		'user_id',
		'id_number',
		'address',
		'date_of_birth',
		'gender',
		'age',
		'postal_code',
		'occupation'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
