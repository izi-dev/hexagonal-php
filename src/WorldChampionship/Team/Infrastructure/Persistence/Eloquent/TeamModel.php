<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Team\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

final class TeamModel extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $table = 'teams';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        "id",
        "name",
        "flagUrl",
        "points",
        "wins",
        "loss",
    ];
}