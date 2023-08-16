@extends('layouts.default')
@section('content')

<div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Form NoWA</div>
                            <a href="{{ route('wa.index') }}" class="btn btn-warning btn-sm ml-auto"> Back </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('wa.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama User</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter User">
                            </div>                            
                            <div class="form-group">
                                <label for="no">No Whatsapp</label>
                                <input type="number" name="no" class="form-control" placeholder="Enter No Wa">
                            </div>                            
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Publish</option> 
                                    <option value="0">Draft</option> 
                                </select>
                            </div>                                                         
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
						
@endsection