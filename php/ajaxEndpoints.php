<?php
/**
 * Created by PhpStorm.
 * User: Jakob
 * Date: 04.11.2014
 * Time: 21:31
 */

require_once "../config/Config.php";
require_once "repositories/SystemRepository.php";
require_once "pathfinders/AStarPathfinder.php";

if (isset($_REQUEST["Function"])) {
    switch ($_REQUEST["Function"]) {
        case "SearchPath": {
            $config = new Config();
            $systemRepository = new \repositories\SystemRepository($config);
            $pathfinder = new \Pathfinders\AStarPathfinder($systemRepository);

            if (isset($_REQUEST["Start"]) && isset($_REQUEST["Destination"])) {
                $start = $systemRepository->GetSystemByName($_REQUEST["Start"]);
                $destination = $systemRepository->GetSystemByName($_REQUEST["Destination"]);

                var_dump($start);
                var_dump($destination);

                if (is_null($start) === false && is_null($destination) === false) {
                    $path = $pathfinder->SearchRoute($start, $destination);

                    echo json_encode($path);
                }
            }
        }
    }
}