@extends('layouts/admin/main')

@section('title', 'Edit Lowongan')

@section('content')

<div class="d-sm-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Edit Lowongan</h1>
</div>
<div class="row">
	<div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('admin.vacancy.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $vacancy->id }}">
                    <div class="row mb-3">
                        <label class="col-lg-2 col-md-3 col-form-label">Judul <span class="text-danger">*</span></label>
                        <div class="col-lg-10 col-md-9">
                            <input type="text" name="name" class="form-control form-control-sm {{ $errors->has('name') ? 'border-danger' : '' }}" value="{{ $vacancy->name }}" autofocus>
                            @if($errors->has('name'))
                            <div class="small text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-lg-2 col-md-3 col-form-label">Jabatan <span class="text-danger">*</span></label>
                        <div class="col-lg-10 col-md-9">
                            <select name="position" class="form-select form-select-sm {{ $errors->has('position') ? 'border-danger' : '' }}">
                                <option value="" disabled selected>--Pilih--</option>
                                @foreach($positions as $position)
                                <option value="{{ $position->id }}" {{ $vacancy->position_id == $position->id ? 'selected' : '' }}>{{ $position->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('position'))
                            <div class="small text-danger">{{ $errors->first('position') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-lg-2 col-md-3 col-form-label">Gambar</label>
                        <div class="col-lg-10 col-md-9">
                            <input type="file" name="file">
                            @if($vacancy->image != '' && \File::exists(public_path('assets/images/lowongan/'.$vacancy->image)))
                                <br>
                                <img src="{{ asset('assets/images/lowongan/'.$vacancy->image) }}" class="img-thumbnail mt-3" style="height: 200px;">
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-lg-2 col-md-3 col-form-label">Deskripsi</label>
                        <div class="col-lg-10 col-md-9">
                            <textarea name="description" class="d-none"></textarea>
                            <div id="editor">{!! html_entity_decode($vacancy->description) !!}</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-lg-2 col-md-3 col-form-label">Status <span class="text-danger">*</span></label>
                        <div class="col-lg-10 col-md-9">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status-1" value="1" {{ $vacancy->status == "1" ? 'checked' : '' }}>
                                <label class="form-check-label" for="status-1">Aktif</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status-0" value="0" {{ $vacancy->status == "0" ? 'checked' : '' }}>
                                <label class="form-check-label" for="status-0">Tidak Aktif</label>
                            </div>
                            @if($errors->has('status'))
                            <div class="small text-danger">{{ $errors->first('status') }}</div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2 col-md-3"></div>
                        <div class="col-lg-10 col-md-9">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="bi-save me-1"></i> Submit</button>
                            <a href="{{ route('admin.vacancy.index') }}" class="btn btn-sm btn-secondary"><i class="bi-arrow-left me-1"></i> Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>

@endsection

@section('js')

<script type="text/javascript">
    // Quill
    Spandiv.Quill("#editor");

    // Submit Form
    $(document).on("click", "button[type=submit]", function(e) {
        e.preventDefault();
        var myEditor = document.querySelector('#editor');
        var html = myEditor.children[0].innerHTML;
        $("textarea[name=description]").text(html);
        $(this).parents("form").submit();
    });
</script>

@endsection

@section('css')

<style>
    #editor {height: 300px;}
</style>

@endsection