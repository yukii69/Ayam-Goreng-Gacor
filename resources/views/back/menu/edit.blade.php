@extends('layouts.default')
@section('content')

<div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            @error('judul_menu')
                            <p>{{ $message }}</p>
                            @enderror
                            @error('gambar_menu')
                            <p>{{ $message }}</p>
                            @enderror
                            <div class="card-title">Edit Menu </div>
                            <a href="{{ route('menu.index') }}" class="btn btn-warning btn-sm ml-auto"> Back </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('menu.update', $menu->id ) }}" 
                        enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label for="judul_menu">Judul Menu</label>
                                <input type="text" name="judul_menu" class="form-control" id="text" value="{{ $menu->judul_menu }}">
                            </div>  
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <textarea type="text" name="harga" class="form-control" >{{ $menu->harga }}</textarea>
                            </div> 
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $menu->status == '1' ? 'selected' : '' }}>Publish</option> 
                                    <option value="0" {{ $menu->status == '0' ? 'selected' : '' }}>Draft</option> 
                                </select>
                            </div>       
                            <div class="form-group">
                                <label for="gambar_menu">Gambar Menu</label>
                                <input type="file" name="gambar_menu" class="form-control">  
                                <br> 
                                <label for="gambar">Gambar Saat Ini</label></br>
                                <img src="{{ asset('uploads/menu/' . $menu->gambar_menu) }}" width="100">                                                                             
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