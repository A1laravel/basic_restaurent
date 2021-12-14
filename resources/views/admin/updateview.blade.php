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

    <div>
            <form action="{{url('/update',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">Title</label>
                    <input style="color: blue;" type="text" name='title' value="{{$data->title}}" required>
                </div>
                <div>
                    <label for="">Price</label>
                    <input style="color: blue;" type="num" name='price' value="{{$data->price}}" required>
                </div>
                <div>
                    <label for="">Old image</label>
                    <img src="foodimage/{{$data->images}}" style="height: 140px; width:200px; ">
                </div>
                <div>
                    <label for="">Chose new image</label>
                    <input type="file" name='image' required>
                </div>
                <div>
                    <label for="">Description</label>
                    <input style="color: blue;" type="text" value="{{$data->description}}" name="description" required>
                </div>
                <div>
                    <input style="color: #000;" type="submit" value="Save">
                </div>
            </form>
        </div>

  </div>
    @include("admin.adminscript")
  </body>
</html>