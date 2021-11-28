@extends('layouts.app')

@section("title") Category Manger @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active"  aria-current="page">Category Manager</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-layers"></i>
                        Category List
                    </h4>
                    <hr>
                    <form action="{{route('category.store')}}" method="post" class="mb-3">
                        @csrf
                        <div class="form-inline">
                            <input type="text" name="title" placeholder="New Category" class="form-control @error('title') is-invalid @enderror form-control-lg mr-2" value="{{old('title')}}" required>
                            <button class="btn btn-primary btn-lg">Add Category</button>
                        </div>
                        @error('title')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                        @if(session('message'))
                           <p class="text-success mt-2">{{session('message')}}</p>
                        @endif
                    </form>
                    @include('category.list');
                </div>
            </div>
        </div>
    </div>
@endsection
