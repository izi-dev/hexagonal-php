<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Infraction\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InfractionModel extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $table = 'infractions';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id',
        'playerId',
        'teamId',
        'gameId',
        'yellowCard',
        'redCard'
    ];
}