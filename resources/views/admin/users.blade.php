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
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Operation</th>
                </tr>
                @foreach($data as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    @if($data->usertype == '0')
                    <td><a href="{{url('/deleteuser',$data->id)}}">delete</a></td>
                    @else
                    <td>Not Allowed</td>
                    @endif
                </tr>
                @endforeach
            </table>
        </div>
      </div>
    
    @include("admin.adminscript")
  </body>
</html>