<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransporterRequest;
use App\Http\Requests\UpdateTransporterRequest;
use App\Models\Transporter;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class TransporterController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Transporters', [
            'transporters' => Transporter::all(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('TransporterCreate');
    }

    public function store(StoreTransporterRequest $request): RedirectResponse
    {
        Transporter::create($request->validated());

        return redirect()->route('dashboard');
    }

    public function show(Transporter $transporter): Response
    {
        return Inertia::render('TransporterShow', compact('transporter'));
    }

    public function edit(Transporter $transporter): Response
    {
        return Inertia::render('TransporterEdit', compact('transporter'));
    }

    public function update(UpdateTransporterRequest $request, Transporter $transporter): RedirectResponse
    {
        $transporter->update($request->validated());

        return redirect()->route('dashboard');
    }

    public function destroy(Transporter $transporter): RedirectResponse
    {
        $transporter->delete();

        return redirect()->route('dashboard');
    }
}
