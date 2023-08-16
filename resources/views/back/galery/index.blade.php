@extends('layouts.default')
@section('content')

<div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title" style="color:black;">Data Galery</div>
                            <a href="{{ route('galery.create') }}" class="btn btn-primary btn-sm ml-auto"> <i class="fas fa-plus"></i> Tambah Galery</a>
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
                                        <th>Nama Gambar</th>
                                        <th>Status</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($galery as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->nama_gambar }}</td>
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
                                        <td><img src="{{ asset('uploads/galery/' . $row->gambar_galery) }}" width="100"> </td>
                                        <td>
                                            <a href="{{ route('galery.edit', $row->id) }}"  class="btn btn-primary btn-sm mr-2"> <i class="fas fa-pen"></i>
                                            <span> Edit </span> </a>
                                            
                                            <form action="{{ route('galery.destroy', $row->id) }}" method="post" class="d-inline">
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
                                        <td colspan="6" class="text-center">Data Masih Kosong</td>
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