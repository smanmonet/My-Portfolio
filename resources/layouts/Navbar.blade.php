<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
          <img src="<?= asset('image/logo.png') ?>"></img>
        </div>
       </nav>
    
       <nav>
          <div class="second-nav">
          <li><a class="sidenav-link" href="/HomeMembers"><b>Member</b></a></li>
          </div>
       </nav>
      </div>
      
        @yield('content')
      
</body>
</html>