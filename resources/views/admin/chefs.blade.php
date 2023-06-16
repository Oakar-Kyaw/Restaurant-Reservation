<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
      @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.nav')
      <div style="width:100%">
       <form action="{{url('/uploadchefs')}}" method='post' enctype='multipart/form-data'>
        @csrf
         <div style="width:250px;padding:20px">
            <label for="name">Name</label>
            <input type="text" name="name" id="" placeholder='Name' style="color:blue;" class='form-control'>
         </div>
         <div style="width:250px;padding:20px">
            <label for="image">Image</label>
            <input type="file" name="image" id="" placeholder='Image' style="color:blue;">
         </div>
         <div style="width:250px;padding:20px">
            <label for="speciality">Speciality</label>
            <input type="text" name="speciality" id="" placeholder='Speciality' style="color:blue;" class="form-control">
         </div>
         <div style="width:250px;padding:20px">
           <button class="btn btn-success">Submit</button>
         </div>
      </form>
       </div>
       </div>
      <!--food table -->
       <div style="position:relative; right:-220px;">
       <table class="text-white" bgcolor="black" border="3px">
          <thead class="text-white">
          <tr style="padding:30px">
            <th style="padding:30px">Name</th>
            <th style="padding:30px">Speciality</th>
            <th style="padding:30px">Image</th>
            <th style="padding:30px">Action</th>
            <th style="padding:30px">Action2</th>
           </tr>
           </thead>
           @foreach($chefs as $chef)
          <tbody >
            <tr>
              <th style="padding:30px">{{$chef->name}}</th>
              <td style="padding:30px">{{$chef->speciality}}</td>
               <td style="padding:30px"><img src="/foodchefs/{{$chef->image}}" alt="" style="height:100px;width:100px;"></td>
             
               <td style="padding:30px"><a href="{{url('deletechefs',$chef->id)}}" class="text-decoration-none">Delete</a></td>
               <td style="padding:30px"><a href="{{url('viewupdatechef',$chef->id)}}" class="text-decoration-none">Update</a></td>
              </tr>

            </tbody>
           @endforeach
          </table>
      </div>
</div>
      
      @include('admin.adminscript')
      </body>
</html>