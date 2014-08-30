<div class="tour-sub-page" id="tour-contact">
    <div class="cleafix">
        @if(Session::has('success'))
        <div class="row">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            @endif
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-6">
            <ol class="breadcrumb">
                <li><a href="{{Request:root()}}">Home</a></li>
                <li class="active">Create custom tour</li>
            </ol>
        </div>
        <div class="col-sm-6">
            <ul id="tour-detail-actions" class="list-unstyled list-inline">
                <li><i class="fa fa-envelope"></i> EMAIL TO FRIEND</li>
                <li><i class="fa fa-print"></i> PRINT THIS PAGE</li>
                <li><i class="fa fa-phone-square"></i> 19008198</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div id="contact-summary-infor">
                <h3 class="has-dividor">Interest ?</h3>
                <p class="small">Email us Directly</p>
                <p><a href="mailto:contact@viettouris.com">contact@viettouris.com</a></p>
                <p class="small">Give us a call</p>
                <p>098376767</p>
            </div>
        </div>
        <div class="col-sm-9">
            <h2>GET YOUR VACATION QUOTE</h2>
            <p>
                We make planning your trip easy by doing all the work for you. Just complete a couple steps and a our Representative will get in touch with you shortly within 23,5 hours. You can also call us at 866.270.9841 to speak to someone right away.
            </p>
            <h2 class="has-dividor">CONTACT INFORMATION</h2>
            <form id="request-tour-form">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>First Name</label>
                        <input required="required" type="text" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Last Name</label>
                        <input required="required" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input required="required" type="text" class="form-control">
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Phone number</label>
                        <input required="required" type="text" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Best time to call</label>
                        <input required="required" type="text" class="form-control">
                    </div>
                </div>
                <h2>TRIP DETAIL</h2>
                 <div class="row">
                    <div class="form-group col-sm-6">
                        <select class="form-control" style="display: none;">
                            <option>HOW MANY IN YOUR PARTY</option>
                        </select><div class="btn-group bootstrap-select form-control"><button data-toggle="dropdown" class="btn dropdown-toggle selectpicker btn-default" type="button" title="HOW MANY IN YOUR PARTY"><span class="filter-option pull-left">HOW MANY IN YOUR PARTY</span>&nbsp;<span class="caret"></span></button><div class="dropdown-menu open" style="max-height: 130.017px; overflow: hidden; min-height: 0px;"><ul role="menu" class="dropdown-menu inner selectpicker" style="max-height: 118.017px; overflow-y: auto; min-height: 0px;"><li rel="0" class="selected"><a style="" class="" tabindex="0"><span class="text">HOW MANY IN YOUR PARTY</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li></ul></div></div>
                    </div>
                     <div class="form-group col-sm-6">
                         <select class="form-control">
                            <option>HOW MANY IN YOUR PARTY</option>
                        </select>
                     </div>
                </div>
                 
                 <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Departure City</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Departure Date</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Destination(s)</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Length of trip</label>
                        <select class="form-control">
                            <option>HOW MANY IN YOUR PARTY</option>
                        </select>
                    </div>
                </div>
                <h2>CLASS OF SERVICES</h2>
                <div class="form-control">
                    <select class="form-control">
                        <option>Choose Cruise Line</option>
                    </select>
                </div>
                <div class="form-control">
                    <input type="checkbox" /> KEEP ME UPDATE WITH FEATURE OFFER RELATED TO MY FRIEND
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <select class="form-control">
                            <option>HOW DID YOUR FIND US</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>PREFERRED TRAVEL CONSULTANT(OPT)</label>
                        <input type="text" class="form-control" />
                    </div>
                </div>
                <h2>ADDITIONAL COMMENT</h2>
                <div class="form-group">
                    <label>ADDITIONAL COMMENT(OPT)đ</label>
                    <textarea class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger pull-right"> SUBMIT REQUEST </button>
                </div>
            </form>
        </div>
    </div>
</div>