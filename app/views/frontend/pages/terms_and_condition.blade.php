@section('title')
  Terms and condition | Bravo Indochina Tour
@stop
@section('content')
<div class="row" style="margin-top: 20px;">
    <div class="col-sm-5">
        <ol class="breadcrumb page-breadcrumb" style="margin-bottom: 10px">
            <li><a href="{{Request::root()}}">Home</a></li>
            <li class="active">TERMS AND CONDITION</li>
        </ol>
    </div>
</div>
<div class="row" id='about-us'>
    <div class="col-md-12" style="margin-top: 30px;margin-bottom: 40px">
        <?php echo Setting::getTermsContent() ?>
    </div>
</div>
@stop