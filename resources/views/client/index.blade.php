@extends('client.shared')
@section('content')
<!-- Home slideder-->
<div id="home-slider">
    @include('client.slide.slide')
</div>
<!-- END Home slideder-->
<!-- servives -->
<div class="container">
    @include('client.service.service')
</div>
<!-- end services -->

<div class="page-top">
    @include('client.page.pagetop')
</div>
<!---->
<div class="content-page">
    <div class="container">
        @include('client.page.pagecontent.fashion')
        @include('client.page.pagecontent.sports')
        @include('client.page.pagecontent.electronic')
        @include('client.page.pagecontent.digital')
        @include('client.page.pagecontent.feature')
        @include('client.page.pagecontent.jewelry')
        @include('client.page.pagecontent.banerbottom')
    </div>
</div>

<div id="content-wrap">
    @include('client.page.hot')
</div>

@endsection()
