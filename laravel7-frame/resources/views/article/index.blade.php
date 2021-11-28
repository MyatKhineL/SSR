@extends('layouts.app')

@section("title") Article List @endsection

@section('content')
    <x-bread-crumb>

        <li class="breadcrumb-item active" aria-current="page">Article List</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-list"></i>
                        Article List
                    </h4>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="">
                             <a href="{{route('article.create')}}" class="btn-lg btn btn-outline-primary mr-3">
                                 <i class="feather-plus-circle"></i>
                                 Add Article
                             </a>
                              @isset(request()->search)

                                <a href="{{route('article.index')}}" class="btn-lg btn btn-outline-success mr-3">
                                    <i class="feather-list"></i>
                                    All Article
                                </a>
                                 <span class="h5">Search By : "{{request()->search}}"</span>
                              @endisset
                        </div>
                        <form action="{{route('article.index')}}" method="get" class="mb-3">

                            <div class="form-inline">
                                <input type="text" name="search" placeholder="Search.." class="form-control-lg form-control mr-2" value="{{request()->search}}" required>
                                <button class="btn btn-primary btn-lg">
                                    <i class="feather-search"></i>
                                </button>
                            </div>

                        </form>
                    </div>
                    @if(session('uparticle'))
                       <p class="alert alert-success">{{session('uparticle')}}</p>
                    @endif
                    @if(session('delarticle'))
                        <p class="alert alert-danger">{{session('delarticle')}}</p>
                    @endif
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Article</th>

                                <th>Owner</th>
                                <th>Category</th>
                                <th>Control</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse($articles as $article)
                            <tr>
                                <td>{{$article->id}}</td>
                                <td>
                                    <span class="font-weight-bolder">{{Str::words($article->title,3)}}</span>
                                    <br>
                                    <small class="text-black-50">{{Str::words($article->description,8)}}</small>
                                </td>

                                <td>{{$article->user->name}}</td>
                                <td>{{$article->category->title}}</td>
                                <td class="text-nowrap">
                                    <a href="{{route('article.show',$article->id)}}" class="btn btn-outline-success">Show</a>
                                    <a href="{{route('article.edit',$article->id)}}" class="btn btn-outline-warning">Edit</a>

                                    <form action="{{route('article.destroy',[$article->id,'page'=>request()->page])}}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger" onclick="return confirm(`Are u sure to delete`)">Delete</button>
                                    </form>

                                </td>
                                <td class="text-nowrap">
                                          <span class="small">
                                              <i class="feather-calendar"></i>
                                              {{$article->created_at->format('d-m-y')}}
                                          </span>
                                    <br>
                                    <span class="small">
                                              <i class="feather-clock"></i>
                                              {{$article->created_at->format('h:i A')}}
                                          </span>
                                    <br>
                                </td>

                            </tr>
                             @empty
                                 <tr>
                                     <td colspan="6" class="text-center">There is no article</td>
                                 </tr>

                             @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        {{$articles->appends(request()->all())->links()}}
                        <p class="font-weight-bolder h4">Total : {{$articles->total()}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
