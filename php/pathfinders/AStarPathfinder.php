<?php
/**
 * Created by PhpStorm.
 * User: jakob
 * Date: 29.06.14
 * Time: 16:41
 */

namespace Pathfinders;

use entities\System;
use ISystemRepository;
use PhpCollection;

/**
 * Class AStarPathfinder
 * @package Pathfinders
 */
class AStarPathfinder implements IPathfinder
{

    #region fields

    /**
     * @var ISystemRepository
     */
    private $systemRepository;

    #endregion

    #region ctors
    /**
     * @param \ISystemRepository $systemRepository
     */
    function __construct(\ISystemRepository $systemRepository)
    {
        $this->systemRepository = $systemRepository;
    }
    #endregion

    #region SearchRoute
    /**
     * @param System $start
     * @param System $destination
     * @return null
     */
    public function SearchRoute(System $start, System $destination)
    {
        $closedset = new PhpCollection\Sequence(); // The set of nodes already evaluated.
        $openset = new PhpCollection\Sequence();
        $openset->add($start); // The set of tentative nodes to be evaluated, initially containing the start node
        $came_from = new PhpCollection\Map(); // The map of navigated nodes.

        $g_score = new PhpCollection\Map();
        $f_score = new PhpCollection\Map();

        $g_score->set($start, 0); // Cost from start along best known path.

        // Estimated total cost from start to goal through y.
        $f_score->set($start, $g_score->get($start) + $this->heuristic_cost_estimate($start, $destination));

        while ($openset->count() > 0) {
            $openset->sortWith(function ($x, $start) {
                return $this->heuristic_cost_estimate($start, $x);
            });
            $current = $openset->first();
            if ($current === $destination) {
                return $this->reconstruct_path($came_from, $destination);
            }


            $openset->remove($openset->indexOf($current));

            $closedset->add($current);
            foreach ($this->neighbor_nodes($current) as $neighbor) {
                if ($closedset->contains($neighbor)) {
                    continue;
                }
                $tentative_g_score = $g_score->get($current) + $this->dist_between($current, $neighbor);

                if (!$openset->contains($neighbor) || $tentative_g_score < $g_score->get($neighbor)) {
                    $came_from->set($neighbor, $current);
                    $g_score->set($neighbor, $tentative_g_score);
                    $f_score->set($neighbor, $g_score->get($neighbor) + $this->heuristic_cost_estimate($neighbor, $destination));
                    if (!$openset->contains($neighbor)) {
                        $openset->add($neighbor);
                    }
                }
            }
        }

        return null;
    }
    #endregion

    #region dist_between

    /**
     * @param System $neighbor
     * @param System $destination
     * @return number
     */
    function heuristic_cost_estimate(System $neighbor, System $destination)
    {
        $deltaX = $destination->getX() - $neighbor->getX();
        $deltaY = $destination->getY() - $neighbor->getY();
        $deltaZ = $destination->getZ() - $neighbor->getZ();

        return abs($deltaX * $deltaX + $deltaY * $deltaY + $deltaZ * $deltaZ);
    }
    #endregion

    #region neighbor_nodes

    /**
     * @param Map $came_from
     * @param System $current_node
     * @return PhpCollection\Sequence
     */
    function reconstruct_path(Map $came_from, System $current_node)
    {
        if ($came_from->containskey($current_node)) {
            $p = $this->reconstruct_path($came_from, $came_from->get($current_node));
            return $p->add($current_node);
        } else {
            $p = new PhpCollection\Sequence();
            $p->add($current_node);
            return $p;
        }
    }
    #endregion

    #region reconstruct_path

    /**
     * @param System $system
     * @return mixed
     */
    private function neighbor_nodes(System $system)
    {
        return $this->systemRepository->GetNeighbors($system);
    }
    #endregion

    #region heuristic_cost_estimate

    private function dist_between(System $start, System $second)
    {
        return 1;
    }
    #endregion
}