<?php

namespace App\Service\Meterage;

use App\Dto\FooterDto;
use App\Dto\MeterageDto;
use App\Dto\MeterageTableDto;
use App\Repository\MeterageRepository;

class MeterageService
{
    private MeterageRepository $repository;

    public function __construct(MeterageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createTable(): MeterageTableDto
    {
        $meterages = $this->repository->findAll();
        $meteragesDtoList = [];
        foreach ($meterages as $meterage) {
            $meteragesDtoList[] = new MeterageDto(
                $meterage->getId(),
                $meterage->getLat(), $meterage->getLong(), $meterage->getHeight(),
                $meterage->getValue(), $meterage->getParameter(), $meterage->getStation(),
                date_format($meterage->getDate(), 'd. m. Y'), $meterage->getLocation()
            );
        }
        
        return new MeterageTableDto($meteragesDtoList, new FooterDto('footer'));
    }

    public function createPlot(
        $parameter,
        $location
    ): array
    {
        $meterages = $this->repository->findByFilter(
            $parameter,
            $location
        );

        $plotData = [];
        foreach ($meterages as $meterage) {
            $plotData['x'][] = $meterage->getStation();
            $plotData['y'][] = $meterage->getValue();
        }

        return $plotData;
    }
}
