<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'company' => 'nullable|string|max:150',
            'message' => 'nullable|string|max:1000',
        ]);

        Lead::create($data);

        return response()->json(['ok' => true, 'message' => '¡Gracias! Te contactaremos pronto.']);
    }
}