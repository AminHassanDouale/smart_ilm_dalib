<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Filiere;
use App\Models\Niveau;
use App\Models\Section;
use App\Models\BillMethod;
use App\Models\Status;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class StudentsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Validate foreign keys
        $this->validateForeignKeys($row);

        return new Student([
            'name' => $row['name'],
            'father_name' => $row['father_name'],
            'address' => $row['address'],
            'telephone' => $row['telephone'],
            'filiere_id' => $row['filiere_id'],
            'niveau_id' => $row['niveau_id'],
            'section_id' => $row['section_id'],
            'email' => $row['email'],
            'studentId' => 'IAD' . mt_rand(1000, 9999),
            'join_date' => Carbon::createFromFormat('d/m/Y', $row['join_date'])->format('Y-m-d'),
            'join_year' => $row['join_year'],
            'current_year' => $row['current_year'],
            'birth_date' => Carbon::createFromFormat('Y-m-d', $row['birth_date'])->format('Y-m-d'),
            'total_amount' => 350000,
            'billmethod_id' => $row['billmethod_id'],
            'status_id' => $row['status_id'],
        ]);
    }

    private function validateForeignKeys(array $row)
    {
        if (!Filiere::find($row['filiere_id'])) {
            throw ValidationException::withMessages(['filiere_id' => "Filiere ID {$row['filiere_id']} does not exist."]);
        }

        if (!Niveau::find($row['niveau_id'])) {
            throw ValidationException::withMessages(['niveau_id' => "Niveau ID {$row['niveau_id']} does not exist."]);
        }

        if (!Section::find($row['section_id'])) {
            throw ValidationException::withMessages(['section_id' => "Section ID {$row['section_id']} does not exist."]);
        }

        if (!BillMethod::find($row['billmethod_id'])) {
            throw ValidationException::withMessages(['billmethod_id' => "Bill Method ID {$row['billmethod_id']} does not exist."]);
        }

        if (!Status::find($row['status_id'])) {
            throw ValidationException::withMessages(['status_id' => "Status ID {$row['status_id']} does not exist."]);
        }
    }
}


