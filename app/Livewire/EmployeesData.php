<?php

namespace App\Livewire;

use App\Models\Employee;
use Dompdf\Dompdf;
use Livewire\Component;

class EmployeesData extends Component
{
    public $employee;

    public function generatePdf()
    {


        $employee = Employee::all();

        // Generate the HTML content from the 'index' view
        $html = view('livewire.employees-data', compact('employee'))->render();


        // Create a Dompdf instance
        $dompdf = new Dompdf();

        // Load the HTML contents
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        // Stream the PDF to the browser for download
        return $dompdf->stream('yddes.pdf');
    }
    public function render()
    {
        $this->employee = Employee::all();
        return view('livewire.employees-data');
    }
}
