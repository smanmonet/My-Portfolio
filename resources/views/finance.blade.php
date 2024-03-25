<!DOCTYPE html>
<html lang="en">

<head>
<title>Finance</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


<style>

@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap');

*{
    margin: 0;
    padding:0 ; 
    font-family: "Noto Sans Thai", sans-serif;
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


.finance-logo h2{
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
        <div class="finance-logo">
            <img src="<?= asset('logo/User_cicrle_light.png') ?>"></img>
            <h2>ฝ่ายบัญชี</h2>
      
          </div>
       </nav>
    
       <nav>
          <div class="second-nav">
            <img src="<?= asset('logo/Bag_light.png') ?>"></img>
          <li><a class="sidenav-link" ><b>รายการคำสั่งซื้อ</b></a></li>
          </div>

          <div class="dropdown">
            <select id="dynamic_select" style="border-radius: 10px" name="change" class="change">
                <option value="" selected disabled >switch role</option>
                @foreach($role as $role)
                <option value="{{$role->roletypeID}}">{{ $role->nameType }}</option>
                @endforeach
            </select>
          </div>

       </nav>
      </div>
      <h><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></h>

      
      <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <table id="myDataTable" class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>image</i></th>
                            <th>member</th>
                            <th>วันที่สั่ง</i></th>
                            <th>ราคา (บาท)</th>
                            <th>status</i></th>
                        </tr>
                    </thead>
                     <tbody id="tbody" name="tbody">
                      @foreach($orders as $order)
                         <tr>
                            <td>
                              <img src="{{ asset('image/'.$order->image)}}" width="300px" alt="Image">
                            </td>
                            <td>{{$order->memberID}} :{{$order->Name}} {{$order->Surname}}<br/> {{$order->Address}}</td>
                            <td>{{$order->dateone}}</td>
                            <td>{{$order->totalPrice}}</td>
                            <td>{{$order->status}}</td>
                            <td><a href="order/{{$order->orderID}}" name="submit" type="submit" calss="submit" >ยันยืน</td>
                        </tr> 
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>  
    </div>    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
      $(function (){
          $('#dynamic_select').on('change', function () {
            var id = $(this).val(); // get selected value
            if (id==1) { window.location = "/Finance"; }
            else if(id==2){}
            else if(id==3){}
            else if(id==4){window.location = "/HomeMembers";}
            return false;
        });
      });
  </script>
</body>
</html>