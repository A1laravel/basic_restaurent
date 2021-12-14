<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
  @include("admin.admincss")
  </head>
  <body>
  <div class="container-scroller">
    @include("admin.navbar")

        <div>
            <form action="{{url('/foodupload')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">Title</label>
                    <input style="color: blue;" type="text" name='title' placeholder="Enter a title" required>
                </div>
                <div>
                    <label for="">Price</label>
                    <input style="color: blue;" type="num" name='price' placeholder="Enter price" required>
                </div>
                <div>
                    <label for="">Image</label>
                    <input type="file" name='image' required>
                </div>
                <div>
                    <label for="">Description</label>
                    <textarea style="color: blue;" name="description" cols="30" rows="5" required></textarea>
                </div>
                <div>
                    <input style="color: #000;" type="submit" value="Save">
                </div>
            </form>
        </div>

        <div style="margin-left: 50px;">
            <table>
                <tr>
                    <th style="padding: 3px 30px; background:black;">Image</th>
                    <th style="padding: 3px 30px; background:black;">Food name</th>
                    <th style="padding: 3px 30px; background:black;">price</th>
                    <th style="padding: 3px 30px; background:black;">description</th>
                    <th style="padding: 3px 30px; background:black;">Action</th>
                    <th style="padding: 3px 30px; background:black;">Action 2</th>
                </tr>
                @foreach($data as $data)
                <tr align='center'>
                    <td style="height: 75px; width: 50px;"><img src="/foodimage/{{$data->images}}"></td>
                    <td>{{$data->title}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->description}}</td>
                    <td><a href="{{url('deletemenu',$data->id)}}">Delete</a></td>
                    <td><a href="{{url('updateview',$data->id)}}">Update</a></td>
                </tr>
                @endforeach
            </table>
        </div>

  </div>
    @include("admin.adminscript")
  </body>
</html>