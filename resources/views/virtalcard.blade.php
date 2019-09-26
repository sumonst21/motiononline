@extends('layouts.theme')
@section('title',"Card")
@section('main-wrapper')
@section('custom-meta')
<style>
@import url('https://fonts.googleapis.com/css?family=Inconsolata:400,700&display=swap');

  .bottom-left {
    position: relative;
    bottom: 100px;
    left: 55px;
  }

  .top-left {
      position: absolute;
      top: 8px;
      left: 16px;
  }

  .top-right {
    position: absolute;
    bottom: 250px;
    right: 200px;
  }

  .bottom-right {
    position: absolute;
    bottom: 20px;
    right: 85px;
  }

  .centered {
    position: absolute;
    bottom: 120px;
    left: 55px;
  }
.v-card {
    width: 600px;
    margin: 0 auto;
    left: 0;
    right: 0;
}
.imgtag {
    position: relative;
}
.imgtag img.card-img {
    width: 600px;
    margin: 0 auto;
    left: 0;
    right: 0;
    height: auto;
}

  /*tablet devices*/
  @media (min-width: 768px) and (max-width: 991.98px) { 

    /*.imgtag img{
width:70%;
 height:70% ;
   }
    .bottom-left {
      position: relative;
      bottom: 35px;
      left: -15%;
  }

  .top-left {
      position: absolute;
      top: 18px;
      left: 10px;
  }

  .top-right {
      position: absolute;
      top: 36%;
      right: 30%;
  }

  .bottom-right {
      position: absolute;
      bottom:  45px;
      right: 25%;
  }

  .centered {
      position: absolute;
      top: 15%;
      left: 25%;
      transform: translate(-50%, -50%);
  }
 .emailhead{
      color: #ecf0f1;
 font-size: 10px; 
 font-family:Times New Roman;
  margin-left: -30px;
  }

.emailcontent{
      font-family:Times New Roman;  
      font-size: 12px; text-transform: uppercase;
      margin-left: 10px;
 }
*/
}

  /*normal*/
 /* .imgtag img{
width:50%;
 height:50% ;
  }
  .emailhead{
color: #ecf0f1;
 font-size: 16px; 
 font-family:Times New Roman;
  margin-left: -90px;
  }
  .emailcontent{
    font-family:Times New Roman;  font-size: 18px; text-transform: uppercase;margin-left: 20px;
  }*/
</style>
@endsection
<section id="main-wrapper" class="main-wrapper">
    <div class="container">
     <div class="watchlist-main-block"><br><br>

      <div class="row">

        <div class="preload" style="margin-top: 70px;">
         @if(isset($pkgname))
         @if($pkgname->mycolor=='gold')
       
         <div class="v-card">
            
            <div class="imgtag" >
                <img class="card-img img-responsive" src="{{ asset('images/virtualcard/gold.png') }}">   
                <div class="top-right">
                @php
                   $name= $userdetail->name;
                   $email= $userdetail->email;
                   $qrcodetext= 'User Name= '.$name.' Email= '. $email.' Expiry Date= '.date('d/m/Y', strtotime($subscribedtill)).' Subscription Package= '.$pkgname->name;
                    @endphp
                    <img class="" style="position: absolute;" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->generate($qrcodetext)) !!} ">
                </div>          
                     <div class="bottom-right" >
                <p style="color: #ecf0f1; font-size: 16px;">expiration</p>
                <div class="" >
                    <div class="" style="display: inline-block;">
                       <p style="text-transform: uppercase; font-size: 10px;">Valid<br/>Thru</p>
                    </div>
                    <div class=""  style="display: inline-block;">
                        <p style=" "><i class="fa fa-caret-right" aria-hidden="true"></i> </p>
                    </div>
                    <div class="" style="display: inline-block;">
                        <h4 style="font-family:Inconsolata; font-size: 20spx;">{{ date('m/Y', strtotime($subscribedtill)) }}</h4>
                    </div>
                     </div>

                 </div>
                 {{-- user name block --}}
                 <div class="centered">
                    <p style="color: #ecf0f1; font-size: 16px;">User Name</p>
                    <h3 style="font-family: 'Inconsolata', monospace;;  text-transform: uppercase;">{{$userdetail->name}}</h3>
                </div>
            </div>
            <div class="bottom-left">
                        <p class="emailhead" style="color: #ecf0f1; font-size: 16px;" >User Email</p>
                        <h3 class="emailcontent"  style=" font-size: 20px;  text-transform: uppercase;">{{$userdetail->email}}</h3>
                    </div>

            </div>
        

         @elseif($pkgname->mycolor=='platinum')
         <div class="v-card">
            
            <div class="imgtag" >
                <img class="card-img img-responsive" src="{{ asset('images/virtualcard/platinum.png') }}">   
                <div class="top-right">
                @php
                   $name= $userdetail->name;
                   $email= $userdetail->email;
                   $qrcodetext= 'User Name= '.$name.' Email= '. $email.' Expiry Date= '.date('d/m/Y', strtotime($subscribedtill)).' Subscription Package= '.$pkgname->name;
                    @endphp
                    <img class="" style="position: absolute;" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->generate($qrcodetext)) !!} ">
                </div>          
                     <div class="bottom-right" >
                <p style="color: #ecf0f1; font-size: 16px;">expiration</p>
                <div class="" >
                    <div class="" style="display: inline-block;">
                       <p style="text-transform: uppercase; font-size: 10px;">Valid<br/>Thru</p>
                    </div>
                    <div class=""  style="display: inline-block;">
                        <p style=" "><i class="fa fa-caret-right" aria-hidden="true"></i> </p>
                    </div>
                    <div class="" style="display: inline-block;">
                        <h4 style="font-family:Inconsolata; font-size: 20spx;">{{ date('m/Y', strtotime($subscribedtill)) }}</h4>
                    </div>
                     </div>

                 </div>
                 {{-- user name block --}}
                 <div class="centered">
                    <p style="color: #ecf0f1; font-size: 16px;">User Name</p>
                    <h3 style="font-family: 'Inconsolata', monospace;;  text-transform: uppercase;">{{$userdetail->name}}</h3>
                </div>
            </div>
            <div class="bottom-left">
                        <p class="emailhead" style="color: #ecf0f1; font-size: 16px;" >User Email</p>
                        <h3 class="emailcontent"  style=" font-size: 20px;  text-transform: uppercase;">{{$userdetail->email}}</h3>
                    </div>

            </div>
            @elseif($pkgname->mycolor=='black')
       
        <div class="v-card">
            
            <div class="imgtag" >
                <img class="card-img img-responsive" src="{{ asset('images/virtualcard/black.png') }}">   
                <div class="top-right">
                @php
                   $name= $userdetail->name;
                   $email= $userdetail->email;
                   $qrcodetext= 'User Name= '.$name.' Email= '. $email.' Expiry Date= '.date('d/m/Y', strtotime($subscribedtill)).' Subscription Package= '.$pkgname->name;
                    @endphp
                    <img class="" style="position: absolute;" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->generate($qrcodetext)) !!} ">
                </div>          
                     <div class="bottom-right" >
                <p style="color: #ecf0f1; font-size: 16px;">expiration</p>
                <div class="" >
                    <div class="" style="display: inline-block;">
                       <p style="text-transform: uppercase; font-size: 10px;">Valid<br/>Thru</p>
                    </div>
                    <div class=""  style="display: inline-block;">
                        <p style=" "><i class="fa fa-caret-right" aria-hidden="true"></i> </p>
                    </div>
                    <div class="" style="display: inline-block;">
                        <h4 style="font-family:Inconsolata; font-size: 20spx;">{{ date('m/Y', strtotime($subscribedtill)) }}</h4>
                    </div>
                     </div>

                 </div>
                 {{-- user name block --}}
                 <div class="centered">
                    <p style="color: #ecf0f1; font-size: 16px;">User Name</p>
                    <h3 style="font-family: 'Inconsolata', monospace;;  text-transform: uppercase;">{{$userdetail->name}}</h3>
                </div>
            </div>
            <div class="bottom-left">
                        <p class="emailhead" style="color: #ecf0f1; font-size: 16px;" >User Email</p>
                        <h3 class="emailcontent"  style=" font-size: 20px;  text-transform: uppercase;">{{$userdetail->email}}</h3>
                    </div>

            </div>
            @endif
            @endif
        </div>

    </div>
</div>
</div>
</section>
<!-- end main wrapper -->
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection