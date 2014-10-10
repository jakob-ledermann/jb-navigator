<?php
/**
 * Created by PhpStorm.
 * User: jakob
 * Date: 29.06.14
 * Time: 16:41
 */

namespace Pathfinders;


use entities\System;

interface IPathfinder
{

    public function SearchRoute(System $start, System $destination);


} 