@extends('layouts.default')
@section('content')

<div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            @error('judul_testi')
                            <p>{{ $message }}</p>
                            @enderror
                            @error('gambar_testi')
                            <p>{{ $message }}</p>
                            @enderror
                            <div class="card-title">Edit Testi </div>
                            <a href="{{ route('testi.index') }}" class="btn btn-warning btn-sm ml-auto"> Back </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('testi.update', $testi->id ) }}" 
                        enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label for="judul_testi">Nama Review</label>
                                <input type="text" name="judul_testi" class="form-control" id="text" value="{{ $testi->judul_testi }}">
                            </div>  
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea type="text" name="deskripsi" class="form-control" >{{ $testi->deskripsi }}</textarea>
                            </div>  
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $testi->status == '1' ? 'selected' : '' }}>Publish</option> 
                                    <option value="0" {{ $testi->status == '0' ? 'selected' : '' }}>Draft</option> 
                                </select>
                            </div>       
                            <div class="form-group">
                                <label for="gambar_testi">Gambar Testi</label>
                                <input type="file" name="gambar_testi" class="form-control">  
                                <br> 
                                <label for="gambar">Gambar Saat Ini</label></br>
                                <img src="{{ asset('uploads/testi/' . $testi->gambar_testi) }}" width="100">                                                                             
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