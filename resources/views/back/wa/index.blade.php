@extends('layouts.default')
@section('content')

<div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title" style="color:black;">Data Whatsapp</div>
                            <a href="{{ route('wa.create') }}" class="btn btn-primary btn-sm ml-auto"> <i class="fas fa-plus"></i> Tambah Whatsapp</a>
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
                                        <th>No Whatsapp</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($wa as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->no }}</td>
                                        <td>
                                        @if ($row->status == '1')
                                            <span class="btn btn-success btn-sm">
                                                Active
                                            </span>
                                            @else
                                            <span class="btn btn-danger btn-sm">
                                                Draft
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('wa.edit', $row->id) }}"  class="btn btn-primary btn-sm mr-2"> <i class="fas fa-pen"></i>
                                        <span> Edit </span> </a>
                                            
                                            <form action="{{ route('wa.destroy', $row->id) }}" method="post" class="d-inline">
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