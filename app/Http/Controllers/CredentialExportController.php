<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Credential;
use Barryvdh\DomPDF\PDF; // Import the class at the top

class CredentialExportController extends Controller
{
    public function exportPDF(PDF $pdf) // inject here
    {
        $credentials = Credential::where('user_id', auth()->id())->get();

        $pdf->loadView('credentials.export', compact('credentials'))->setPaper('a4', 'landscape');

        return $pdf->download('my_passwords.pdf');
    }
}