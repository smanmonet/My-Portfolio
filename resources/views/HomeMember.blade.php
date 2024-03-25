<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meto name="csrf-token" content="{{csrf_token()}}" />
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<meta name="X-CSRF-TOKEN" content="{{ csrf_token() }}">
<title>HomeMember</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.6/sweetalert2.css" integrity="sha512-n1PBkhxQLVIma0hnm731gu/40gByOeBjlm5Z/PgwNxhJnyW1wYG8v7gPJDT6jpk0cMHfL8vUGUVjz3t4gXyZYQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>

@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');

*{
    margin: 0;
    padding:0 ; 
    font-family: "Outfit", sans-serif;
}

  #navbar {
  position: fixed;
  top: 0px;
  width: 100%;
  display: block;
  transition: top 0.3s;
}
.sticky { 
    position: fixed;
    top: 0;
    width: 100%;
    animation-duration: 0.5s;
    animation-name: fadeInDown;
    animation-timing-function: ease-out;
  }
.top-bar {
    display: flex;
    height: 106px;
    justify-content: space-between;
    padding: 10px 25px;
    background: #25393C;
}
.logo{
    display: flex;
}
.logo img{
    display: flex;
    margin-right: 10px;
}
nav{
    background: rgb(201, 206, 209);
    height: 71px;
    padding: 2px 25px;
    display: flex;
    align-items: center;
    position: relative;
}
nav .sticky {
    position: fixed;
    top: 0;
    width: 100%;
    
  }
nav a{
    color: #44576D ;
}
nav a:hover{
    color: #112b48;
}
nav .second-nav{
    list-style: none;
    display: flex;
    align-items: center;
    margin-left: 80px;
}
.second-nav li{
    padding: 15px 10px;
    font-size: 20px;
    
}
nav .dropdown{
    list-style: none;
    display: flex;
    align-items: center;
    margin-left: 80px;
}
.dropdown li{
    padding: 15px 10px;
    font-size: 20px;
}


.table-responsive {
    margin:  auto;
    display: flex;
}
.table-wrapper {
    min-width: 1000px;
    background: #ffffff;
    padding: auto;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    margin: auto;
}
.table-title {
    padding-bottom: 5px;
    display: auto;
    min-width: 50%;
}
.addmember {
    margin-left:16%;
    float: left;
    text-align: center;
    padding: 10px;
    padding-right: 60%;
    
}
.addmember-button {
    background: #ffffff;
    border-radius: 20px;
    border-color: #a5a4a4;
}
.addmember-button:hover {
    background: #cfcfcf;
}
.search-box {
    display: auto;
    margin-right:18% ;
    margin-left:16%;
    padding-bottom: 10px;

} 

.search-box input  {
    float: left;
    width:85%;
    height: 40px;
    border-radius: 20px;
    border-color: #afafaf;
    box-shadow: none;
    margin-right: 30px;
    
}
.search-box input:focus {
    border-color: #3FBAE4;
    
}
.search-box .submitsearch {
    
    cursor: pointer;
    font-size: 17px;
    padding: 4px 6px;
}
.submitsearch{
    background-color: #6c9981;
    border-radius: 20px;
}
table.table tr th, table.table tr td {
    border-color: #ffffff;
    display: auto;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background: #e1f7e1;
}
table.table-striped.table-hover tbody tr:hover {
    background: #ffffff;
}
table.table td:last-child {
    display: auto;
}
table.table td a.edit {
    color: #15734f;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 20px;
}
.hr-logo h2{
    float: right;
    font-size: 20px;
    color: #e1f7e1;
    top:5px;
}

</style>

</head>
<body>
    <script>
        window.onscroll = function() {scrollFunction()};
    
       function scrollFunction() {
         if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
           document.getElementById("navbar").style.top = "-107px";
         } else {
           document.getElementById("navbar").style.top = "0px";
         }
       }
       </script>
       
      <div id="navbar">

      <nav class="top-bar">
        <div class="logo">
            <img src="<?= asset('logo/logo.png') ?>"></img>
        </div>
        <div class="hr-logo">
            <img src="<?= asset('logo/User_cicrle_light.png') ?>"></img>
            <h2>HR</h2>

          </div>
       </nav>
    
       <nav>
          <div class="second-nav">
          <li><a class="sidenav-link" href="{{ url('HomeMembers') }}"><b>Member</b></a></li>
          </div>
          
          <div class="dropdown">
            <select id="dynamic_select" style="border-radius: 10px" name="change" class="change">
                <option value="" selected disabled >switch role</option>
                @foreach($role as $role)
                <option value="{{$role->roletypeID}}">{{ $role->nameType }}</option>
                @endforeach
            </select>
            {{-- <button style="border-radius: 8px " type="submit" class="submitchaege">OK</button> --}}
          </div>
       
          
       </nav>
      </div>
      <h><br/></h>
      <h><br/></h>
      <h><br/></h>
      <h><br/></h>
      <h><br/></h>
      <h><br/></h>
      <h><br/></h>
      <div action="/addmember"  class="addmember" >
        <button onclick="location.href='{{ url('HomeMembers/addmember') }}'" class="addmember-button" >addmember</button>
    </div>
    <form method="get" action="/search">
    <div class="search-box">
        {{-- <i class="material-icons">&#xE8B6;</i></input> --}}
        <input type="text" name="search" id="search" class="form-control" placeholder="Search&hellip;" >
        <button type="submit" class="submitsearch">Search</button>
    </div>
    </form>


<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <table id="myDataTable" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>MemberID </i></th>
                        <th>Email</th>
                        <th>Name </i></th>
                        <th>Surname</th>
                        <th>Address</i></th>
                        <th>rank</th>
                    </tr>
                </thead>
                 <tbody id="tbody" name="tbody">
                  @if($member -> count()> 0) 
                     <h1>total data: {{$member->count()}}</h1>
                  @foreach ($member as $member)
                      
                     <tr>
                        <input type="hidden" class="serdelete_var" value="{{$member->memberID}}">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$member->memberID}}</td>
                        <td>{{$member->loginID}}</td>
                        <td>{{$member->Name}}</td>
                        <td>{{$member->Surname}}</td>
                        <td>{{$member->Address}}</td>
                        <td>{{$member->rankName}}</td>
                        <td>
                            
                            <a href="{{url('HomeMembers/'.$member->memberID.'/update')}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="javascript:void(0)" wire:click.prevent='confirmation({{$member->memberID}})' class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr> 
                  @endforeach
                  @else
                     <tr>
                       <td class="text-center" colspan="S">Members Data not found </td>
                     </tr>
                  @endif   
                </tbody> 
            </table>
            
        </div>
    </div>  
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

        $('.delete').click(function (e){
            e.preventDefault();

            var delete_id = $(this).closest("tr").find('.serdelete_var').val();
            // alert(delete_id);
            // alert('Hello');
            Swal.fire({
                title: "Are you sure?",
                text: "Check! you want to delete this memberID:"+delete_id+"?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete"
            }).then((result) => {
                if (result.isConfirmed) {

                    var data = {
                        "_token" : $('input[name=_token]').val(),
                        "memberID" : delete_id,

                    };
                     $.ajax({
                        type: "DELETE",
                        url : '/service-cate-delete/'+delete_id,
                        data : data,
                        success: function(response){ 
                            Swal.fire(
                            'Deleted!',
                            'This member has been deleted.',
                            'success'
                             )
                            .then((result) => {
                            location.reload();

                            });
                        }
                     });
                       }
                });

        });

    });
</script>
<script>
    $(function (){
        $('#dynamic_select').on('change', function () {
          var id = $(this).val(); // get selected value
          if (id==1) { window.location = "/Finance"; }
          else if(id==2){ }
          else if(id==3){ }
          else if(id==4){window.location = "/HomeMembers";}
          return false;
      });
    });
</script>
</body>
</html>