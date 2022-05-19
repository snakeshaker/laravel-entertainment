<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Имя',
            'Почта',
            'Почта верифицирована',
            'Администратор',
            'Дата создания',
            'Дата редактирования',
            'Фамилия',
            'Дата рождения',
            'Номер телефона'
        ];
    }
}
