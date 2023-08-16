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
                            <div class="card-title">Form Andalan</div>
                            <a href="{{ route('andalan.index') }}" class="btn btn-warning btn-sm ml-auto"> Back </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('andalan.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="judul_andalan">Harga</label>
                                <input type="text" name="judul_andalan" class="form-control" placeholder="Enter Judul">
                            </div>  
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea type="text" name="deskripsi" class="form-control" placeholder="Enter Deskripsi"></textarea>
                            </div>   
                            <div class="form-group">
                                <label for="gambar_andalan">Gambar Andalan</label>
                                <input type="file" name="gambar_andalan" class="form-control">                                                         
                            </div>   
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Publish</option> 
                                    <option value="0">Draft</option> 
                                </select>
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