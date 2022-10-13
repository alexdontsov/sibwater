<?php

namespace App\Dto;

class MeterageDto
{
    private int $id;
    private $lat;
    private $long;
    private $height;
    private $value;
    private $parameter;
    private $station;
    private $date;
    private $location;

    /**
     * @param int $id
     * @param $lat
     * @param $long
     * @param $height
     * @param $value
     * @param $parameter
     * @param $station
     * @param $date
     * @param $location
     */
    public function __construct(int $id, $lat, $long, $height, $value, $parameter, $station, $date, $location)
    {
        $this->id        = $id;
        $this->lat       = $lat;
        $this->long      = $long;
        $this->height    = $height;
        $this->value     = $value;
        $this->parameter = $parameter;
        $this->station   = $station;
        $this->date      = $date;
        $this->location  = $location;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return mixed
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * @return mixed
     */
    public function getStation()
    {
        return $this->station;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    private function getСoordinates()
    {
        return $this->lat .', '. $this->long;
    }
}
