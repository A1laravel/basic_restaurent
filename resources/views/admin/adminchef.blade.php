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


    <div style="margin-left: 100px;margin-top: 20px;">
        <form action="{{url('uploadchef')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="">Name</label>
                <input style="color: blue;" type="text" name="name" placeholder="Enter chef name" required>
            </div>
            <div>
                <label for="">Speciality</label>
                <input style="color: blue;" type="text" name="speciality" placeholder="Enter chef speciality" required>
            </div>
            <div>
                <label for="">Image</label>
                <input type="file" name="image" required>
            </div>
            <div>
                <button>Save</button>
            </div>
        </form>
    </div>

    <div style="margin-left: 20px;margin-top: 20px;">
        <table>
            <tr>
                <th style="padding: 3px 20px; background:black;">Image</th>
                <th style="padding: 3px 20px; background:black;">Name</th>
                <th style="padding: 3px 20px; background:black;">Speciality</th>
                <th style="padding: 3px 20px; background:black;">Action</th>
                <th style="padding: 3px 20px; background:black;">Action 2</th>
            </tr>
            @foreach($data as $data)
            <tr align="center">
                <td><img style="width: 150px; height:100px;" src="chefimage/{{$data->image}}"/></td>
                <td>{{$data->name}}</td>
                <td>{{$data->speciality}}</td>
                <td><a href="{{url('updatechef',$data->id)}}">Update</a></td>
                <td><a href="{{url('deletechef',$data->id)}}">Delete</a></td>
            </tr>
            @endforeach
        </table>
    </div>


  </div>
    @include("admin.adminscript")
  </body>
</html>