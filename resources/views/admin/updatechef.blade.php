<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
  @include("admin.admincss")
  </head>
  <body>
  <div class="container-scroller">
    @include("admin.navbar")


    <div style="margin-top: 20px;">
        <form action="{{url('updatefoodchef',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="">Name</label>
                <input style="color: blue;" type="text" name="name" value="{{$data->name}}" required>
            </div>
            <div>
                <label for="">Speciality</label>
                <input style="color: blue;" type="text" name="speciality" value="{{$data->speciality}}" required>
            </div>
            <div>
                <label for="">Old chef</label>
                <img style="height: 170px; width: 200px" src="chefimage/{{$data->image}}" alt="Chef image">
            </div>
            <div>
                <label for="">New chef</label>
                <input type="file" name="image" required>
            </div>
            <div>
                <button>Update</button>
            </div>
        </form>
    </div>


  </div>
    @include("admin.adminscript")
  </body>
</html>