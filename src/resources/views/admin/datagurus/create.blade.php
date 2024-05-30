@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.dataguru.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.datagurus.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="umur">{{ trans('cruds.dataguru.fields.umur') }}</label>
                <input class="form-control {{ $errors->has('umur') ? 'is-invalid' : '' }}" type="text" name="umur" id="umur" value="{{ old('umur', '') }}" required>
                @if($errors->has('umur'))
                    <div class="invalid-feedback">
                        {{ $errors->first('umur') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataguru.fields.umur_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="masakerja">{{ trans('cruds.dataguru.fields.masakerja') }}</label>
                <input class="form-control {{ $errors->has('masakerja') ? 'is-invalid' : '' }}" type="number" name="masakerja" id="masakerja" value="{{ old('masakerja', '') }}" step="0.01" required>
                @if($errors->has('masakerja'))
                    <div class="invalid-feedback">
                        {{ $errors->first('masakerja') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataguru.fields.masakerja_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jabatan">{{ trans('cruds.dataguru.fields.jabatan') }}</label>
                <input class="form-control {{ $errors->has('jabatan') ? 'is-invalid' : '' }}" type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', '') }}" step="0.01" required>
                @if($errors->has('jabatan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jabatan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataguru.fields.jabatan_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection