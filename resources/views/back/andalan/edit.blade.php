@extends('layouts.default')
@section('content')

<div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            @error('judul_andalan')
                            <p>{{ $message }}</p>
                            @enderror
                            @error('gambar_andalan')
                            <p>{{ $message }}</p>
                            @enderror
                            <div class="card-title">Edit Andalan </div>
                            <a href="{{ route('andalan.index') }}" class="btn btn-warning btn-sm ml-auto"> Back </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('andalan.update', $andalan->id ) }}" 
                        enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label for="judul_andalan">Harga</label>
                                <input type="text" name="judul_andalan" class="form-control" id="text" value="{{ $andalan->judul_andalan }}">
                            </div>  
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea type="text" name="deskripsi" class="form-control" id="text">{{ $andalan->deskripsi }}</textarea>
                            </div>  
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $andalan->status == '1' ? 'selected' : '' }}>Publish</option> 
                                    <option value="0" {{ $andalan->status == '0' ? 'selected' : '' }}>Draft</option> 
                                </select>
                            </div>       
                            <div class="form-group">
                                <label for="gambar_andalan">Gambar Andalan</label>
                                <input type="file" name="gambar_andalan" class="form-control">  
                                <br> 
                                <label for="gambar">Gambar Saat Ini</label></br>
                                <img src="{{ asset('uploads/andalan/' . $andalan->gambar_andalan) }}" width="100">                                                                             
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