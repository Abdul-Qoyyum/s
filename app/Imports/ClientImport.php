<?php

namespace App\Imports;

use App\Client;

// use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\Importable;

use Maatwebsite\Excel\Concerns\WithValidation;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Support\Facades\Auth;

class ClientImport implements ToCollection, WithValidation, WithHeadingRow
{
    use Importable;

    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            Client::create([
                'firstname' => $row['firstname'], //required attribute
                'lastname' => $row['lastname'],
                'phone' => $row['phone'],
                'email' => $row['email'], //required attribute
                'company' => $row['company'],
                'businessno' => $row['businessno'],
                'address' => $row['address'],
                'town' => $row['town'],
                'postcode' =>  $row['postcode'],
                'state' => $row['state'],
                'country' => $row['country'],
                'notes' => $row['notes'],
                'user_id' => Auth::user()->id, //Change to company id
                ]);
            }
    }

    /**
     * Validation rules
     */
    public function rules(): array{

        return [
            'firstname' => 'required',
            'email' => 'required|email',
        ];

    }



}
