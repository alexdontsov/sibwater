<?php

namespace App\Dto;

class MeterageTableDto
{
    private array $rows;
    private FooterDto $footer;

    public function __construct(
        array $rows,
        $footer
    ) {
        $this->rows = $rows;
        $this->footer = $footer;
    }

    public function getRows(): array
    {
        return $this->rows;
    }

    public function getFooter()
    {
        return $this->footer;
    }
}
