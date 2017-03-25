<!DOCTYPE html>
<html>

<!-- Mirrored from kutethemes.com/demo/kuteshop/html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jul 2015 07:31:28 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/lib/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/lib/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/lib/select2/css/select2.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/lib/jquery.bxslider/jquery.bxslider.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/lib/owl.carousel/owl.carousel.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/lib/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/lib/fancyBox/jquery.fancybox.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/css/animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/css/reset.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/css/responsive.css')}}" />
    
    <title>RST-Shop</title>
</head>
<body class="category-page">
<!-- HEADER -->
<div id="header" class="header">
    @include('client.header.topheader')
    @include('client.header.mainheader')
    @include('client.menu.topmenu')
</div>
<!-- end header -->

<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">HÃY LIÊN HỆ VỚI CHÚNG TÔI</span>
        </h2>
        <!-- ../page heading-->
        <div id="contact" class="page-content page-contact">
            <div id="message-box-conact"></div>
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-subheading">LIÊN HỆ</h3>
                    @if(count($errors)>0)
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as $error)
									<li>{!! $error !!}</li>
								@endforeach
							</ul>
						</div>
					@endif
                    <div class="contact-form-box">
                        <form action="{!! route('client.other.contact') !!}" method="POST" >
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                            <div class="form-selector">
                                <label>Họ tên</label>
                                <input type="text" class="form-control input-sm" name="name" />
                            </div>
                            <div class="form-selector">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control input-sm" name="address" />
                            </div>
                            <div class="form-selector">
                                <label>Địa chỉ Email</label>
                                <input type="email" class="form-control input-sm" name="email" />
                            </div>
                            <div class="form-selector">
                                <label>Tiêu đề</label>
                                <input type="text" class="form-control input-sm" name="subject" />
                            </div>
                            <div class="form-selector">
                                <label>Nội dung</label>
                                <textarea class="form-control input-sm" rows="10" name="message"></textarea>
                            </div>
                            <div class="form-selector">
                                <button type="submit" id="btn-send-contact" class="btn">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6" id="contact_form_map">
                    <h3 class="page-subheading">THÔNG TIN LIÊN HỆ</h3>
                    @foreach($contact as $item)
                        <ul class="store_info">
                            <li><i class="fa fa-home"></i>{!! $item->name !!}</li>
                            <li><i class="fa fa-steam" aria-hidden="true"></i>{!! $item->website !!}</li>
                            <li><i class="fa fa-phone"></i><span>+ {!! $item->phone !!}</span></li>                        
                            <li><i class="fa fa-envelope"></i>Email: <span><a href="mailto:%73%75%70%70%6f%72%74@%6b%75%74%65%74%68%65%6d%65.%63%6f%6d">{!! $item->email !!}</a></span></li>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i>{!! $item->address !!}</li>
                        </ul>                
                    @endforeach
                    <br/>
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d{!! $item->lng !!}!2d{!! $item->lat !!}!3d10.802673359864967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x52d0b6fb719948c8!2zQ8O0bmcgVHkgVG5oaCBO4buZaSBUaOG6pXQgSG_DoG5nIEtoYW5n!5e0!3m2!1sen!2s!4v1490351148270" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./page wapper-->
<!-- Footer -->
<footer id="footer">
     <div class="container">
        @include('client.footer.introducebox')
        @include('client.footer.trademarkbox')
        @include('client.footer.textbox')
        @include('client.footer.menubox')
    </div> 
</footer>


<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<!-- Script-->
<script type="text/javascript" src="{{url('public/assets/lib/jquery/jquery-1.11.2.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/lib/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/lib/select2/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/lib/jquery.bxslider/jquery.bxslider.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/lib/owl.carousel/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/lib/jquery.countdown/jquery.countdown.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/lib/jquery.elevatezoom.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/lib/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/lib/fancyBox/jquery.fancybox.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/js/jquery.actual.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/assets/js/theme-script.js')}}"></script>

<!-- Mirrored from kutethemes.com/demo/kuteshop/html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jul 2015 07:31:28 GMT -->
</html>