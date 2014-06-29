<?php
/**
 * Created by PhpStorm.
 * User: jakob
 * Date: 29.06.14
 * Time: 16:41
 */

namespace Pathfinders;


interface IPathfinder
{

    public function SearchRoute(System $start, System $destination);


} 