<?php
/**
 * Created by PhpStorm.
 * User: jakob
 * Date: 29.06.14
 * Time: 17:22
 */

namespace entities {


    class System
    {
        #region fields
        private $regionId;
        private $constellationId;
        private $id;
        private $name;
        private $x;
        private $y;
        private $z;
        private $xMin;
        private $xMax;
        private $yMin;
        private $yMax;
        private $zMin;
        private $zMax;
        private $luminosity;
        private $border;
        private $fringe;
        private $corridor;
        private $hub;
        private $international;
        private $regional;
        private $constellation;
        private $security;
        private $factionId;
        private $radius;
        private $sunTypeId;
        private $securityClass;

        private $region;
        #endregion

        #region getBorder
        /**
         * @return mixed
         */
        public function getBorder()
        {
            return $this->border;
        }
        #endregion

        #region setBorder
        /**
         * @param bool $border
         */
        public function setBorder($border)
        {
            $this->border = $border;
        }
        #endregion

        #region getConstellation
        /**
         * @return mixed
         */
        public function getConstellation()
        {
            return $this->constellation;
        }
        #endregion

        #region setConstellation
        /**
         * @param int $constellation
         */
        public function setConstellation($constellation)
        {
            $this->constellation = $constellation;
        }
        #endregion

        #region getConstellationId
        /**
         * @return integer
         */
        public function getConstellationId()
        {
            return $this->constellationId;
        }
        #endregion

        #region setConstellationId
        /**
         * @param int $constellationId
         */
        public function setConstellationId($constellationId)
        {
            $this->constellationId = $constellationId;
        }
        #endregion

        #region getCorridor
        /**
         * @return mixed
         */
        public function getCorridor()
        {
            return $this->corridor;
        }
        #endregion

        #region setCorridor
        /**
         * @param mixed $corridor
         */
        public function setCorridor($corridor)
        {
            $this->corridor = $corridor;
        }
        #endregion

        #region getFactionId
        /**
         * @return mixed
         */
        public function getFactionId()
        {
            return $this->factionId;
        }
        #endregion

        #region setFactionId
        /**
         * @param mixed $factionId
         */
        public function setFactionId($factionId)
        {
            $this->factionId = $factionId;
        }
        #endregion

        #region getFringe
        /**
         * @return mixed
         */
        public function getFringe()
        {
            return $this->fringe;
        }
        #endregion

        #region setFringe
        /**
         * @param mixed $fringe
         */
        public function setFringe($fringe)
        {
            $this->fringe = $fringe;
        }
        #endregion

        #region getHub
        /**
         * @return mixed
         */
        public function getHub()
        {
            return $this->hub;
        }
        #endregion

        #region setHub
        /**
         * @param mixed $hub
         */
        public function setHub($hub)
        {
            $this->hub = $hub;
        }
        #endregion

        #region getId
        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }
        #endregion

        #region setId
        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }
        #endregion

        #region getInternational
        /**
         * @return mixed
         */
        public function getInternational()
        {
            return $this->international;
        }
        #endregion

        #region setInternational
        /**
         * @param mixed $international
         */
        public function setInternational($international)
        {
            $this->international = $international;
        }
        #endregion

        #region getLuminosity
        /**
         * @return mixed
         */
        public function getLuminosity()
        {
            return $this->luminosity;
        }
        #endregion

        /**
         * @param mixed $luminosity
         */
        public function setLuminosity($luminosity)
        {
            $this->luminosity = $luminosity;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getRadius()
        {
            return $this->radius;
        }

        /**
         * @param mixed $radius
         */
        public function setRadius($radius)
        {
            $this->radius = $radius;
        }

        /**
         * @return mixed
         */
        public function getRegion()
        {
            return $this->region;
        }

        /**
         * @param mixed $region
         */
        public function setRegion($region)
        {
            $this->region = $region;
        }

        /**
         * @return mixed
         */
        public function getRegionId()
        {
            return $this->regionId;
        }

        /**
         * @param mixed $regionId
         */
        public function setRegionId($regionId)
        {
            $this->regionId = $regionId;
        }

        /**
         * @return mixed
         */
        public function getRegional()
        {
            return $this->regional;
        }

        /**
         * @param mixed $regional
         */
        public function setRegional($regional)
        {
            $this->regional = $regional;
        }

        /**
         * @return mixed
         */
        public function getSecurity()
        {
            return $this->security;
        }

        /**
         * @param mixed $security
         */
        public function setSecurity($security)
        {
            $this->security = $security;
        }

        /**
         * @return mixed
         */
        public function getSecurityClass()
        {
            return $this->securityClass;
        }

        /**
         * @param mixed $securityClass
         */
        public function setSecurityClass($securityClass)
        {
            $this->securityClass = $securityClass;
        }

        /**
         * @return mixed
         */
        public function getSunTypeId()
        {
            return $this->sunTypeId;
        }

        /**
         * @param mixed $sunTypeId
         */
        public function setSunTypeId($sunTypeId)
        {
            $this->sunTypeId = $sunTypeId;
        }

        /**
         * @return mixed
         */
        public function getX()
        {
            return $this->x;
        }

        /**
         * @param mixed $x
         */
        public function setX($x)
        {
            $this->x = $x;
        }

        /**
         * @return mixed
         */
        public function getXMax()
        {
            return $this->xMax;
        }

        /**
         * @param mixed $xMax
         */
        public function setXMax($xMax)
        {
            $this->xMax = $xMax;
        }

        /**
         * @return mixed
         */
        public function getXMin()
        {
            return $this->xMin;
        }

        /**
         * @param mixed $xMin
         */
        public function setXMin($xMin)
        {
            $this->xMin = $xMin;
        }

        /**
         * @return mixed
         */
        public function getY()
        {
            return $this->y;
        }

        /**
         * @param mixed $y
         */
        public function setY($y)
        {
            $this->y = $y;
        }

        /**
         * @return mixed
         */
        public function getYMax()
        {
            return $this->yMax;
        }

        /**
         * @param mixed $yMax
         */
        public function setYMax($yMax)
        {
            $this->yMax = $yMax;
        }

        /**
         * @return mixed
         */
        public function getYMin()
        {
            return $this->yMin;
        }

        /**
         * @param mixed $yMin
         */
        public function setYMin($yMin)
        {
            $this->yMin = $yMin;
        }

        /**
         * @return mixed
         */
        public function getZ()
        {
            return $this->z;
        }

        /**
         * @param mixed $z
         */
        public function setZ($z)
        {
            $this->z = $z;
        }

        /**
         * @return mixed
         */
        public function getZMax()
        {
            return $this->zMax;
        }

        /**
         * @param mixed $zMax
         */
        public function setZMax($zMax)
        {
            $this->zMax = $zMax;
        }

        /**
         * @return mixed
         */
        public function getZMin()
        {
            return $this->zMin;
        }

        /**
         * @param mixed $zMin
         */
        public function setZMin($zMin)
        {
            $this->zMin = $zMin;
        }
    }
}