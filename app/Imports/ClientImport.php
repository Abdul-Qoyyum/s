<?php

namespace App\Imports;

use App\Client;

use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\Importable;

use Maatwebsite\Excel\Concerns\WithValidation;

class ClientImport implements ToModel, WithValidation
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
            'firstname' => $row[0], //required attribute
            'lastname' => $row[1],
            'phone' => $row[2],
            'email' => $row[3], //required attribute
            'businessno' => $row[4],
            'address' => $row[5],
            'town' => $row[6],
            'postcode' =>  $row[7],
            'state' => $row[8],
            'country' => $row[9],
            'notes' => $row[10],
        ]);
    }

    /**
     * Validation rules
     */
    public function rules(): array{

        return [
            '0' => 'required|string',
            '3' => 'required|unique|email:rfc,dns',
        ];

    }



}
