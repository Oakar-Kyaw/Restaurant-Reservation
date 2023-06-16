<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
      @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.nav')
      <div style="width:100%">
    
       <form action="{{url('/updatechef',$updatechef->id)}}" method='post' enctype='multipart/form-data'>
        @csrf
        
         <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="{{$updatechef->name}}" id="" placeholder='Name' style="color:blue;">
         </div>
         <div>
            <img src="foodchefs/{{$updatechef->image}}" alt="" style="height:100px;width:100px;">
            <label for="image">Image</label>
            <input type="file" name="image" id="" placeholder='Image' style="color:blue;">
         </div>
         <div>
            <label for="speciality">Speciality</label>
            <input type="text" name="speciality" value="{{$updatechef->speciality}}" id="" placeholder='Speciality' style="color:blue;">
         </div>
         <div>
           <button>Update</button>
         </div>
         
      </form>
      
       </div>
       </div>
    
      
      @include('admin.adminscript')
      </body>
</html>