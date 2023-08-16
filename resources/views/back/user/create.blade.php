@extends('layouts.default')
@section('content')

<div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Form User</div>
                            <a href="{{ route('user.index') }}" class="btn btn-warning btn-sm ml-auto"> Back </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama User</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Username">
                            </div>                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                            </div>                                                      
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="toggle-password">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
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