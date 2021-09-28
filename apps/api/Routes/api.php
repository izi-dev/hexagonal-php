<?php

use IziDev\Api\Controllers\GetReportGamesController;
use IziDev\Api\Controllers\GetReportTeamsController;
use IziDev\Api\Controllers\PostSimulateGamesController;
use IziDev\Api\Controllers\PostUploadCsvPlayersController;
use IziDev\Api\Controllers\PostUploadCsvTeamsController;

return [
    'upload-csv-teams' => PostUploadCsvTeamsController::class,
    'upload-csv-players' => PostUploadCsvPlayersController::class,
    'simulate-games' => PostSimulateGamesController::class,
    'reports-games' => GetReportGamesController::class,
    'reports-teams' => GetReportTeamsController::class,
];