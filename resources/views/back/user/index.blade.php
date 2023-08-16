@extends('layouts.default')
@section('content')

<div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title" style="color:black;">Data Users</div>
                            <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm ml-auto"> <i class="fas fa-plus"></i> Tambah User</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-primary">
                                {{ Session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama User</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', $row->id) }}"  class="btn btn-primary btn-sm mr-2"> <i class="fas fa-pen"></i>
                                        <span> Edit </span> </a>
                                            
                                            <form action="{{ route('user.destroy', $row->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                    <span> Delete </span>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data Masih Kosong</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
						
@endsection