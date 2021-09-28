<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Shared\Infrastructure\Illuminate\Database\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class Script
{
    public static function execute()
    {
        if (!Capsule::schema()->hasTable('teams')) {
            Capsule::schema()->create('teams', function (Blueprint $table) {
                $table->string('id')->primary();
                $table->string("name");
                $table->string("flagUrl");
                $table->integer("points")->nullable()->default(0);
                $table->integer("wins")->nullable()->default(0);
                $table->integer("loss")->nullable()->default(0);
                $table->timestamps();
            });
        }

        if (!Capsule::schema()->hasTable('players')) {
            Capsule::schema()->create('players', function (Blueprint $table) {
                $table->string('id')->primary();
                $table->string("name");
                $table->integer("age");
                $table->string("nationality");
                $table->string("position");
                $table->integer("shirtNumber");
                $table->string("photoUrl");
                $table->string("teamId");
                $table->timestamps();
            });
        }

        if (!Capsule::schema()->hasTable('games')) {
            Capsule::schema()->create('games', function (Blueprint $table) {
                $table->string('id')->primary();
                $table->string("teamIdHome");
                $table->string("teamIdAway");
                $table->integer("day");
                $table->integer("home");
                $table->integer("away");
                $table->string("win");
                $table->string("loss");
                $table->timestamps();
            });
        }

        if (!Capsule::schema()->hasTable('infractions')) {
            Capsule::schema()->create('infractions', function (Blueprint $table) {
                $table->string('id')->primary();
                $table->string("teamId");
                $table->string("playerId");
                $table->string("gameId");
                $table->integer("yellowCard");
                $table->integer("redCard");
                $table->timestamps();
            });
        }

        if (!Capsule::schema()->hasTable('scores')) {
            Capsule::schema()->create('scores', function (Blueprint $table) {
                $table->string('id')->primary();
                $table->string("playerId");
                $table->string("gameId");
                $table->integer("goal");
                $table->timestamps();
            });
        }
    }
}
