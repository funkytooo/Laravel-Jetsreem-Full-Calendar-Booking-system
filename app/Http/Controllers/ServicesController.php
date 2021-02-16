<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreServicesRequest;
use App\Http\Requests\UpdateServicesRequest;
use Symfony\Component\HttpFoundation\Response;

class ServicesController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Services::all();

        return view('services.index', compact('services'));
    }

    public function create()
    {
       // abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('services.create');
    }

    public function store(StoreServicesRequest $request)
    {
        Services::create($request->validated());

        return redirect()->route('services.index');
    }

    public function show(Services $service)
    {
      //  abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('services.show', compact('services'));
    }

    public function edit(Services $service)
    {
       // abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('services.edit', compact('services'));
    }

    public function update(UpdateServicesRequest $request, Services $service)
    {
        $service->update($request->validated());

        return redirect()->route('services.index');
    }

    public function destroy(Services $service)
    {
       // abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service->delete();

        return redirect()->route('services.index');
    }
}
