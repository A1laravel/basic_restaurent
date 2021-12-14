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

    <div style="margin-left: 50px; margin-top:15px">
      <table>
        <tr>
          <th style="padding: 5px 15px; background:black">Name</th>
          <th style="padding: 5px 15px; background:black">Guest</th>
          <th style="padding: 5px 15px; background:black">Email</th>
          <th style="padding: 5px 15px; background:black">Phone</th>
          <th style="padding: 5px 15px; background:black">Date</th>
          <th style="padding: 5px 15px; background:black">Time</th>
          <th style="padding: 5px 15px; background:black">Message</th>
        </tr>
        @foreach($data as $data)
        <tr align="center">
          <td>{{$data->name}}</td>
          <td>{{$data->guest}}</td>
          <td>{{$data->email}}</td>
          <td>{{$data->phone}}</td>
          <td>{{$data->date}}</td>
          <td>{{$data->time}}</td>
          <td>{{$data->message}}</td>
        </tr>
        @endforeach
      </table>
    </div>

  </div>
    @include("admin.adminscript")
  </body>
</html>