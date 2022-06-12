<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoriesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Category::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Название',
            'Описание',
            'Картинка',
            'Картинка места',
            'Цена бронирования',
            'Дата создания',
            'Дата редактирования'
        ];
    }
}
