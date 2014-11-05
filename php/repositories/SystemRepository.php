<?php
/**
 * Created by PhpStorm.
 * User: Jakob
 * Date: 10.10.2014
 * Time: 21:00
 */

namespace
{
    require_once "../entities/System.php";
    require_once "ISystemRepository.php";
}

namespace repositories {

    use entities;

    /**
     * Class SystemRepository
     * @package repositories
     */
    class SystemRepository implements \ISystemRepository
    {

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
        public function  __construct(\Config $config)
        {
            $this->DB = new \mysqli($config->StaticDumpDatabaseHost, $config->StaticDumpDatabaseUser, $config->StaticDumpDatabasePassword, $config->StaticDumpDatabaseName, $config->StaticDumpDatabasePort);
        }
        #endregion

        #region GetSystemByName

        /**
         * @param string $name
         * @return entities\System|null
         */
        public function GetSystemByName($name)
        {
            $query = "SELECT *
                      FROM `mapSolarSystems`
                      WHERE `solarSystemName` = ?";

            $stmt = $this->DB->prepare($query);

            if ($stmt === false) {
                throw new \ErrorException($this->DB->error);
            } else {
                if ($stmt->bind_param("s", $name) && $stmt->execute()) {

                    $res = $stmt->get_result();

                    if ($res === false) {
                        throw new \ErrorException($this->DB->error_list);
                    } else {
                        $row = $res->fetch_row();
                        return self::ReadSystem($row);
                    }
                } else {
                    throw new \Exception("Error while binding Parameters: " . $this->DB->error);
                }
            }
        }
        #endregion

        #region GetNeighbors

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

        #region GetSystemById

        /**
         * @param entities\System $system
         * @return PhpCollection\Sequence
         */
        public function GetNeighbors(entities\System $system)
        {
            $query = "SELECT toSolarSystemID
                FROM mapSolarSystemJumps
                WHERE fromSolarSystemId=?";

            $stmt = $this->DB->prepare($query);

            $neighbors = new PhpCollection\Sequence();
            if ($stmt->bind_param("i", $system->getID())) {
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

        #region ReadSystem

        /**
         * @param int $id
         * @return entities\System|null
         */
        public function GetSystemById($id)
        {
            $query = "SELECT *
                    FROM `mapSolarSystems`
                    WHERE SolarSystemId = ?";
            $stmt = $this->DB->prepare($query);

            if ($stmt->bind_param("i", $id) && $stmt->execute()) {
                $res = $stmt->get_result();

                if ($res === false) {
                    throw new \ErrorException($this->DB->error_list);
                } else {
                    $row = $res->fetch_row();
                    return self::ReadSystem($row);
                }
            }
            else
            {
                throw new \Exception("Error while binding Paramters: " . $this->DB->error);
            }

            return null;
        }
        #endregion
    }
}