<?php
/**
 * Created by PhpStorm.
 * User: Jakob
 * Date: 10.10.2014
 * Time: 21:00
 */

namespace repositories;


use entities;

/**
 * Class SystemRepository
 * @package repositories
 */
class SystemRepository implements \ISystemRepository {

    #region fields
    /**
     * @var \mysqli
     */
    private $DB;
    #endregion

    #region ctors
    /**
     * @param \Config $config
     */
    public  function  __construct(\Config $config)
    {
        $this->DB = new \mysqli($config->StaticDumpDatabaseHost, $config->StaticDumpDatabaseUser, $config->StaticDumpDatabasePassword, $config->StaticDumpDatabasePort);
    }
    #endregion

    #region GetSystemByName

    /**
     * @param string $name
     * @return entities\System|null
     */
    public function GetSystemByName($name)
    {

    }
    #endregion

    #region GetNeighbors
    /**
     * @param entities\System $system
     * @return PhpCollection\Sequence
     */
    public function GetNeighbors(entities\System $system)
    {
        $query = "SELECT toSolarSystemID
                FROM mapSolarSystemJumps
                WHERE fromSolarSystemId=@id";

        $stmt = $this->DB->prepare($query);

        $neighbors = new PhpCollection\Sequence();
        if ($stmt->bind_param("int", $system->getID())) {
            $results = $stmt->get_result();

            if ($results === false) {
            } else {
                while ($row = $results->fetch_row()) {
                    $system = $this->GetSystemById($row["toSolarSystemID"]);

                    $neighbors->add($system);
                }
            }
        }

        return $neighbors;
    }
    #endregion

    #region GetSystemById
    /**
     * @param int $id
     * @return entities\System|null
     */
    public function GetSystemById($id)
    {
        $query = "SELECT *
                    FROM `mapSolarSystems`
                    WHERE SolarSystemId = @Id";
        $stmt = $this->DB->prepare($query);

        if ($stmt->bind_param("int", $id)) {
            $res = $stmt->get_result();

            if ($res === false) {

            }
            else
            {
                $row = $res->fetch_row();
                return self::ReadSystem($row);
            }
        }

        return null;
    }
    #endregion

    #region ReadSystem
    /**
     * @param $row
     * @return entities\System
     */
    private static function ReadSystem($row)
    {
        $result = new entities\System();
        $result->setId($row["solarSystemID"]);
        $result->setBorder($row["border"]);
        $result->setConstellationId($row["constellationID"]);
        $result->setCorridor($row["corridor"]);
        $result->setFactionId($row["factionID"]);
        $result->setFringe($row["fringe"]);
        $result->setHub($row["Hub"]);
        $result->setInternational($row["international"]);
        $result->setLuminosity($row["luminosity"]);
        $result->setName($row["solarSystemName"]);
        $result->setRadius($row["radius"]);
        $result->setRegional($row["regional"]);
        $result->setRegionId($row["regionID"]);
        $result->setSecurity($row["security"]);
        $result->setSecurityClass($row["securityClass"]);
        $result->setSunTypeId($row["sunTypeID"]);
        $result->setX($row["x"]);
        $result->setY($row["y"]);
        $result->setZ($row["z"]);
        $result->setXMax($row["xMax"]);
        $result->setYMax($row["yMax"]);
        $result->setZMax($row["zMax"]);
        $result->setXMin($row["xMin"]);
        $result->setYMin($row["yMin"]);
        $result->setZMin($row["zMin"]);

        return $result;
    }
    #endregion
} 