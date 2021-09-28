<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Game\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GameModel extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $table = 'games';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id',
        'teamIdHome',
        'teamIdAway',
        'day',
        'home',
        'away',
        'win',
        'loss',
    ];
}