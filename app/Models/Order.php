<?php

namespace App\Models;

use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Order Model
 *
 * @property int $total
 * @property Carbon $created_at
 */
class Order extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'total',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'total' => 'integer',
    ];

    /**
     * Order User
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Factory
     *
     * @return OrderFactory
     */
    protected static function newFactory(): OrderFactory
    {
        return OrderFactory::new();
    }
}
