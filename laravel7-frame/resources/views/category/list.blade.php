<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Owner</th>
        <th>Control</th>
        <th>Time</th>
    </tr>
    </thead>
    <tbody>
    @forelse(\App\Category::with("user")->get() as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>{{$category->user->name}}</td>
            <td >
                <a href="{{route('category.edit',$category->id)}}" class="btn btn-outline-warning">Edit</a>

                <form action="{{route('category.destroy',$category->id)}}" method="post" class="d-inline-block">
                     @csrf
                    @method('delete')
                    <button class="btn btn-outline-danger" onclick="return confirm(`Are u sure to delete {{$category->title}}`)">Delete</button>
                </form>

            </td>
            <td>
                                          <span class="small">
                                              <i class="feather-calendar"></i>
                                              {{$category->created_at->format('d-m-y')}}
                                          </span>
                <br>
                <span class="small">
                                              <i class="feather-clock"></i>
                                              {{$category->created_at->format('h:i A')}}
                                          </span>
                <br>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">There is no Category</td>
        </tr>
    @endforelse
    </tbody>
</table>
