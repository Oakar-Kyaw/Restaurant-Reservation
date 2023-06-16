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
      
      <div style="width:100%; ">
       <form action="{{url('/uploadfood')}}" method='post' enctype='multipart/form-data'>
        @csrf
         <div style="width:250px;padding:20px">
            <label for="title">Title</label>
            <input type="text" name="title" id="" placeholder='Title' style="color:blue;" class="form-control">
         </div>
         <div style="padding:20px">
            <label for="image">Image</label>
            <input type="file" name="image" id="" placeholder='Image' style="color:blue;"  >
         </div>
         <div style="width:250px;padding:20px">
            <label for="price">Price</label>
            <input type="number" name="price" id="" placeholder='Price' style="color:blue;" class="form-control">
         </div>
         <div style="padding:20px" class='form-group'>
            <label for="description">Description</label>
            <textarea name="description" id=""  rows="5" style="color:blue;" class="form-control"></textarea>
         </div>
         <div style="padding:20px">
           <button class='btn btn-success' type="submit">Submit</button>
         </div>
      </form>
       </div>
       </div>
      <!--food table -->
       <div style="position:relative; right:-220px;">
       <table class="text-white" bgcolor="black" border="3px">
          <thead class="text-white">
          <tr style="padding:30px">
            <th style="padding:30px">Title</th>
            <th style="padding:30px">Price</th>
            <th style="padding:30px">Description</th>
            <th style="padding:30px">Image</th>
            <th style="padding:30px">Action</th>
            <th style="padding:30px">Action2</th>
           </tr>
           </thead>
           @foreach($foods as $food)
          <tbody >
            <tr>
              <th style="padding:30px">{{$food->title}}</th>
              <td style="padding:30px">{{$food->price}}</td>
              <td style="padding:30px">{{$food->description}}</td>
               <td style="padding:30px"><img src="/foodmenu/{{$food->image}}" alt="" style="height:100px;width:100px;"></td>
             
               <td style="padding:30px"><a href="{{url('/deletefood',$food->id)}}" class="text-decoration-none">Delete</a></td>
               <td style="padding:30px"><a href="{{url('/viewupdatefood',$food->id)}}" class="text-decoration-none">Update</a></td>
              </tr>

            </tbody>
           @endforeach
          </table>
      </div>
</div>
      
      @include('admin.adminscript')
      </body>
</html>