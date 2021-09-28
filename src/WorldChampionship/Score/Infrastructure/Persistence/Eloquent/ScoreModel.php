<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Score\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

final class ScoreModel extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $table = 'scores';
    public $incrementing = false;
    public $timestamps = false;
}