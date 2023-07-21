<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class notification extends Model
{
    use HasFactory;
    //protected $connection = 'chainnest1';
    protected $table = 'notifications';
    use Prunable;
    protected $fillable =
    [
        'type',
        'data',
        'read_at',
        'companies_id',
        'inventory_id',
    ];
    public function inven() // inventory table
    {

        return $this->belongsTo(inventory::class, 'inventory_id', 'id')->withTrashed();
    }
    public function compa() // companies table
    {

        return $this->belongsTo(Companies::class, 'companies_id', 'id')->withTrashed();
    }


    public function prunable(): Builder
    {
        return static::whereNotNull('read_at')
            ->where('read_at', '<=', now()->subWeek());
    }
    /**
 * Prepare the model for pruning.
 *
 * @return void
 */
protected function pruning()
{
    //
}
}
