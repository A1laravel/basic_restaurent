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

    <div class="container">
        <div style="margin-top: 30px;">
            <form action="{{url('search')}}" method="get">
                @csrf
                <input type="text" name="search" style="color: blue;">
                <input type="submit" value="Search" class="btn btn-success">
            </form>
        </div>
        <div style="margin-top: 40px;">
            <table>
                <tr>
                    <td style="padding: 3px 30px;">Name</td>
                    <td style="padding: 3px 30px;">Phone</td>
                    <td style="padding: 3px 30px;">Address</td>
                    <td style="padding: 3px 30px;">Food name</td>
                    <td style="padding: 3px 30px;">Price</td>
                    <td style="padding: 3px 30px;">Quantity</td>
                    <td style="padding: 3px 30px;">Total price</td>
                </tr>
                @foreach($data as $data)
                <tr align="center">
                    <td>{{$data->name}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->foodname}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->quantity}}</td>
                    <td>{{$data->price * $data->quantity}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

  </div>
    @include("admin.adminscript")
  </body>
</html>