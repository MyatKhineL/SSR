@extends('layouts.app')

@section("title") {{$article->title}} @endsection

@section('head')
    <style>
        .description{
            white-space: pre-line;
        }
    </style>
@endsection


@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Article Detial</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">
                        {{$article->title}}
                    </h4>
                    <div class="mt-2 mb-4 text-primary">
                          <span class="small font-weight-bold mr-2">
                            <i class="feather-layers"></i>
                            {{$article->category->title}}
                        </span>
                        <span class="small font-weight-bold mr-2">
                            <i class="feather-user"></i>
                            {{$article->user->name}}
                        </span>
                        <span class="small font-weight-bold mr-2">
                            <i class="feather-calendar"></i>
                            {{$article->created_at->format('d-m-y')}}
                        </span>

                        <span class="small font-weight-bold mr-2">
                            <i class="feather-clock"></i>
                            {{$article->created_at->format('h:i A')}}
                        </span>

                    </div>
                    <p class="text-black-50 class=description ">{{$article->description}}</p>
                    <hr>
                     <div class="d-flex justify-content-between">
                         <div class="">
                             <a href="{{route('article.edit',$article->id)}}" class="btn btn-outline-warning">Edit</a>
                             <form action="{{route('article.destroy',$article->id)}}" method="post" class="d-inline-block">
                                 @csrf
                                 @method('delete')
                                 <button class="btn btn-outline-danger" onclick="return confirm(`Are u sure to delete`)">Delete</button>
                             </form>
                             <a href="{{route('article.index')}}" class="btn btn-outline-dark">All Article</a>
                         </div>
                         <p class="mb-0">{{$article->created_at->diffForHumans()}}</p>
                     </div>
                </div>
            </div>
        </div>
    </div>
@endsection
