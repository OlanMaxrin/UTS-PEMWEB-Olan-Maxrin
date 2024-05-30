<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDataguruRequest;
use App\Http\Requests\StoreDataguruRequest;
use App\Http\Requests\UpdateDataguruRequest;
use App\Models\Dataguru;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DataguruController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dataguru_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datagurus = Dataguru::all();

        return view('admin.datagurus.index', compact('datagurus'));
    }

    public function create()
    {
        abort_if(Gate::denies('dataguru_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datagurus.create');
    }

    public function store(StoreDataguruRequest $request)
    {
        $dataguru = Dataguru::create($request->all());

        return redirect()->route('admin.datagurus.index');
    }

    public function edit(Dataguru $dataguru)
    {
        abort_if(Gate::denies('dataguru_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datagurus.edit', compact('dataguru'));
    }

    public function update(UpdateDataguruRequest $request, Dataguru $dataguru)
    {
        $dataguru->update($request->all());

        return redirect()->route('admin.datagurus.index');
    }

    public function show(Dataguru $dataguru)
    {
        abort_if(Gate::denies('dataguru_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datagurus.show', compact('dataguru'));
    }

    public function destroy(Dataguru $dataguru)
    {
        abort_if(Gate::denies('dataguru_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataguru->delete();

        return back();
    }

    public function massDestroy(MassDestroyDataguruRequest $request)
    {
        $datagurus = Dataguru::find(request('ids'));

        foreach ($datagurus as $dataguru) {
            $dataguru->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
