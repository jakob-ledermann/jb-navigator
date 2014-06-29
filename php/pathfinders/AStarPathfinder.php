<?php
/**
 * Created by PhpStorm.
 * User: jakob
 * Date: 29.06.14
 * Time: 16:41
 */

namespace Pathfinders;

use PhpCollection;

class AStarPathfinder implements IPathfinder
{

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
        $f_score->set($start, $g_score->get($start) + heuristic_cost_estimate($start, $destination));

        while ($openset->count() > 0) {
            $openset->sortWith(function ($x, $start) {
                return heuristic_cost_estimate($start, $x);
            });
            $current = $openset->first();
            if ($current === $destination) {
                return reconstruct_path($came_from, $destination);
            }


            $openset->remove($openset->indexOf($current));

            $closedset->add($current);
            foreach (neighbor_nodes($current) as $neighbor) {
                if ($closedset->contains($neighbor)) {
                    continue;
                }
                $tentative_g_score = $g_score->get($current) + dist_between($current, $neighbor);

                if (!$openset->contains($neighbor) || $tentative_g_score < $g_score->get($neighbor)) {
                    $came_from->set($neighbor, $current);
                    $g_score->set($neighbor, $tentative_g_score);
                    $f_score - set($neighbor, $g_score->get($neighbor) + heuristic_cost_estimate($neighbor, $destination));
                    if (!$openset->contains($neighbor)) {
                        $openset->add($neighbor);
                    }
                }
            }
        }

        return null;
    }

    function reconstruct_path(Map $came_from, System $current_node)
    {
        if ($came_from->containskey($current_node)) {
            $p = reconstruct_path($came_from, $came_from->get($current_node));
            return $p->add($current_node);
        } else {
            $p = new PhpCollection\Sequence();
            $p->add($current_node);
            return $p;
        }
    }
}