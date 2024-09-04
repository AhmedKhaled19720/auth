<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;

class AuditController extends Controller
{
    public function index()
    {
        $audits = Audit::paginate(10); 
        return view('audits.index', compact('audits'));
    }

    public function show($id)
    {
        $audit = Audit::findOrFail($id); // Retrieve a specific audit by its ID
        return view('audits.show', compact('audit'));
    }
}
