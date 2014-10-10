<?php
/**
 * Created by PhpStorm.
 * User: Jakob
 * Date: 10.10.2014
 * Time: 20:39
 */

use entities;

interface ISystemRepository {

    public function GetSystemById($id);

    public function GetSystemByName($SystemName);

    public function GetNeighbors(entities\System $system);
} 