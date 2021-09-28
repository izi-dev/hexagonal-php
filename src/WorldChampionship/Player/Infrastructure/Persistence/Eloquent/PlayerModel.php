<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Player\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

final class PlayerModel extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $table = 'players';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id',
        'name',
        'age',
        'nationality',
        'position',
        'shirtNumber',
        'photoUrl',
        'teamId',
    ];
}