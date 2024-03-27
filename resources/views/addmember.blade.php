<!DOCTYPE html>

  <head>
    <title>AddMember</title>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');
*{
    margin: 0;
    padding:0 ; 
    font-family: "Outfit", sans-serif;

    /* font-family: "Outfit", sans-serif;
    justify-content: center;
    margin-top: 1%;
    align-items: center;
    margin: 0;
    padding:0 ;  */
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
    height: 87px;
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
    height: 66px;
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
h1 {
    padding: 30px;
    text-align: center;
    size: 10px;
    text-shadow: 2px 4px 3px rgba(0,0,0,0.3);
}
form {
  padding-top: 1%;
  padding-inline: 30%;
  
}
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
 
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
label {
  margin-bottom: 0.5rem; 
}
.submit{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  vertical-align: middle;
  width: 100%;
  height: 100%;
  padding: 30px;
}
.button-54 {
  font-family: "Open Sans", sans-serif;
  font-size: 16px;
  letter-spacing: 2px;
  text-decoration: none;
  text-transform: uppercase;
  color: #25393C;
  cursor: pointer;
  border: 3px solid;
  padding: 0.25em 0.5em;
  box-shadow: 1px 1px 0px 0px, 2px 2px 0px 0px, 3px 3px 0px 0px, 4px 4px 0px 0px, 5px 5px 0px 0px;
  position: relative;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  
}

.button-54:active {
  box-shadow: 0px 0px 0px 0px;
  top: 5px;
  left: 5px;
}
.text-danger{
  color: #d98080;
  font-size: 12px;
}
.hr-logo h2{
    float: right;
    font-size: 20px;
    color: #e1f7e1;
    top:5px;
}
@media (min-width: 768px) {
  .button-54 {
    padding: 0.25em 0.75em;
  }
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
      <li><a class="sidenav-link" href="{{ url('HomeHR') }}"><b>Member</b></a></li>
      </div>
   </nav>
  </div>
  <h><br/><br/><br/><br/><br/><br/><br/><br/><br/></h>
  
  <h1>Add Member</h1>
  <div class="all-addform" >
    
    <form class="form-add" action="{{ url('HomeHR/addmember')}}" method="POST" >
      @csrf
      <div class="col-md-6">
      <label>Firstname<br/></label>
      <input type="text" placeholder="Enter Firstname" value="{{old('name')}}" name="name"/>
            @error('name')
            <span class="text-danger">*{{$message}}</span> 
            @enderror
            
            </div>

      <div class="col-md-7">
      <label>Surname<br/></label>
      <input type="text" placeholder="Enter Surname" name="surname" value="{{old('surname')}}"/>
        @error('surname')
          <span class="text-danger">*{{$message}}</span> 
        @enderror</div>

      <div class="address">
      <label>Address<br/></label>
      <input type="text" 
              placeholder="Enter Address" 
              name="address" value="{{old('address')}}"/>
              @error('address')
              <span class="text-danger">*{{$message}}</span> 
              @enderror
             
              </div>
                
      <div class="userID">
      <label>Email<br/></label>
      <input type="text" 
              placeholder="Enter UserID" 
              name="userID" value="{{old('userID')}}"/>
              @error('userID')
              <span class="text-danger">*{{$message}}</span> 
              @enderror
             
              </div>
      <div class="password">
      <label>Password<br/></label>
      <input type="text"  placeholder="Enter Password" name="password" value="{{old('password')}}"/>
      @error('password')
      <span class="text-danger">*{{$message}}</span> 
      @enderror
    </div>

      <div class="uplineID">
      <label>UpLine<br/></label>
      <input type="text" placeholder="Enter memberID" name="uplineID" value="{{old('uplineID')}}"/>
      @error('uplineID')
      <span class="text-danger">*{{$message}}</span> 
      @enderror
       </div>
       <div class="submit>">
        <button name="submit" type="submit" class="button-54" >SUBMIT</button>
        </div>
       </div>
    </form>
    <h><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></h>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
    @if(Session::has('message'))
    <script>
          toastr.options = {
            "progressBar" : true,
            "closeButton" : true,
          }
          toastr.success("{{ Session::get('message')}}" , 'Success!',{timeOut:2000});
    </script>
    @elseif($errors->any())
    <script>
      toastr.options = {
        "progressBar" : true,
        "closeButton" : true,
      }
      toastr.error("Something Wrong!" , {timeOut:2000});
</script>
      @endif
</body>
</html>