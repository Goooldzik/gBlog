<?php


namespace App\Dtos;

use Spatie\DataTransferObject\DataTransferObject;

class CategorySaveDto extends DataTransferObject
{
    public string $title;
}
