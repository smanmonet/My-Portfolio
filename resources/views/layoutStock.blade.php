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
.menu-bar {
        width: 100%;
        background-color: #ffffff; /* Change as needed */
        z-index: 1000; /* Ensure it's above other content */
    }
    .menu-list {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: space-around; /* Adjust alignment as needed */
        align-items: center;
        height: 10vh;
    }
    .menu-item {
        text-decoration: none;
        color: #333333; /* Link color */
        position: relative;
        padding: 10px 20px;
        transition: color 0.3s;
    }
    .menu-item:hover {
        color: #44576D; /* Change link color on hover */
    }
    .menu-item::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0%;
        height: 2px; /* Adjust underline thickness */
        background-color: #44576D; /* Underline color */
        transition: width 0.3s;
    }
    .menu-item:hover::after {
        width: 100%; /* Expand underline on hover */
    }
    .item-selected{
        color:#44576D;
        font-weight: 800;
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
            <h2>stock</h2>

          </div>
       </nav>
    
       <nav>
          <div class="second-nav">
          <li><a class="sidenav-link"><b>Switch role :</b></a></li>
          </div>
          
          <div class="dropdown">
    <select id="dynamic_select" style="border-radius: 10px" name="change" class="change">
        <option value="" selected disabled>switch role</option>
        <option value="stock_store">พนักงานคลัง</option>
        <option value="finance">พนักงานบัญชี</option>
    </select>
</div>
       
          
       </nav>
      </div>
      <div class="container" style="margin-top:25vh">
      @yield('content')
      </div>
    <script>
    document.getElementById('dynamic_select').addEventListener('change', function() {
        var selectedValue = this.value;
        if (selectedValue === 'พนักงานคลัง') {
            window.location.href = '/stock_store';
        } else if (selectedValue === 'พนักงานบัญชี') {
            window.location.href = '/Finance';
        }
    });
    </script>
</body>

</html>