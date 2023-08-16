@extends('layouts.default')
@section('content')

<div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            @error('judul_galery')
                            <p>{{ $message }}</p>
                            @enderror
                            @error('gambar_galery')
                            <p>{{ $message }}</p>
                            @enderror
                            <div class="card-title">Edit Galery</div>
                            <a href="{{ route('galery.index') }}" class="btn btn-warning btn-sm ml-auto"> Back </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('galery.update', $galery->id ) }}" 
                        enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label for="nama_gambar">Nama Gambar</label>
                                <textarea name="nama_gambar" id="text" class="form-control " > {{ $galery->nama_gambar }} </textarea>
                            </div>                                                         
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="is_active" class="form-control form-control-lg">
                                    <option value='1' {{ $galery->status == '1' ? 'selected' : '' }}>Publish</option> 
                                    <option value='0' {{ $galery->status == '0' ? 'selected' : '' }}>Draft</option> 
                                </select>
                            </div>       
                            <div class="form-group">
                                <label for="gambar_galery">Gambar Galeri</label>
                                <input type="file" name="gambar_galery" class="form-control">  
                                <br> 
                                <label for="gambar_galery">Gambar Saat Ini</label></br>
                                <img src="{{ asset('uploads/galery/' . $galery->gambar_galery) }}" width="100">  
                                                                           
                            </div>                    
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm mr-2" type="submit">Save</button>
                                <button class="btn btn-danger btn-sm" type="reset">Reset</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
						
@endsection