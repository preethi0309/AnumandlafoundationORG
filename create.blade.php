@extends('layouts.main')

@section('title', '|Contact Us')
@section('stylesheets')
    <link href="{{URL::asset('/css/contactus.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class=" container media1 content">
        @if(\Session::has('contact_Success'))
            <div class="alert alert-success" role="alert">
                <strong>Thank you {{$contactuser->name}} {{\Session::get('contact_Success')}}</strong>
            </div>
        @endif
        <div>
            <h1>Contact</h1>
            <hr class="container col-lg-11 col-xs-11 col-sm-11 col-md-11">
        </div>
        <div class="container" style="margin-bottom: 5px;">
            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <span class="glyphicon glyphicon-map-marker"></span>
                        </a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">Charity Foundation</h3>
                        Address: Street Number,<br/>
                        city, state, <br/> Country, Zipcode
                    </div>
                </div>

            </div>

            <div class="media col-lg-6 col-md-6 col-xs-12 col-sm-6">
                <div class="media col-lg-10 col-md-10 col-sm-10">
                    <div class="media-left">
                        <a href="#">
                            <span class="glyphicon glyphicon-earphone"></span>
                        </a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">Office Contact Details</h3>
                        +1 234-567-8901<br/>
                        +1 234-567-8901

                    </div>
                </div>
                <div class="media col-lg-10 col-md-10 col-sm-10">
                    <div class="media-left">
                        <a href="#">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </a>
                    </div>
                    <div class="media-body " >
                        <h3 class="media-heading">Office Contact Details</h3>
                        Example.email.com<br/>
                        Example.email.com

                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <p class="para">We would love to hear from You!If you have any queries or would like to send a suggestion on how we can help more people.<br/>
                If you are interested in volunteering for an event, share your availability so we will get in touch with you. </p>
        </div>
        <div class="container " >
            <div class="form-data row" >

                <form class="form-horizontal col-lg-6 col-md-6 col-sm-12 col-xs-12" name="contact" id="suggestform" action="{{url('contact')}}" method="post" >

                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12 contact pull-right">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12  " >
                            <input  name="name" required type="text" class="form-control " minlength="3" placeholder="Name *" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                            <input  name="email" required type="email" class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Email *" />
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 " >
                    <textarea  name="message"  class="form-control col-lg-12 col-md-12 col-sm-12 col-xs-12" placeholder="We Need your Suggestions" style="height:180px;">
                    </textarea>
                        </div>
                    </div>
                    <div class=" col-lg-offset-2  col-xs-offset-1 col-lg-6 col-xs-7 col-sm-11 col-md-6">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <button class="btn btn-success btn-lg text-center" type="submit">Submit</button>
                    </div>
                </form>
                <div class="container maps col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <iframe class=" col-lg-11 col-md-12 col-sm-12 col-xs-12"   src="http://www.maps.ie/create-google-map/map.php?width=100%&amp;height=400&amp;hl=en&amp;coord=37.3876633,-121.93013960000002&amp;q=2665%20N%20First%20street+(Charity%20Foundation)&amp;ie=UTF8&amp;t=&amp;z=15&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">

                    </iframe>
                </div><br />

            </div>

        </div>

    </div>
@endsection
@section('scripts')
    <script src="{{URL::asset('/js/nav.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            //Bootstrap form  validation stats from here  for Suggest form
            $("#suggestform").bootstrapValidator({
                feedbackIcons:{

                    valid:'glyphicon glyphicon-ok',
                    invalid:'glyphicon glyphicon-remove',
                    validating:'glyphicon glyphicon-refresh'
                },
                fields:{
                    message:{
                        validators:{
                            notEmpty:{
                                message: 'cannot submit empty suggestions'
                            },

                            stringLength:{
                                max: 500,
                                message: 'Suggestions should be less than 500 characters'
                            },

                            regexp:{
                                regexp: /^[A-Za-z0-9\s]+$/i,
                                message: 'Only alphanumeric characters.'
                            }
                        }
                    },
                    username:{
                        validators:{

                            notEmpty:{
                                message: 'Please enter your name'
                            },
                            regexp:{
                                regexp:/^[A-Za-z\s]+$/,
                                message: 'Name can have only alphabets'
                            }
                        }
                    },
                    email:{
                        validators:{
                            emailAddress: {
                                message: 'The value is not a valid email address'
                            },

                            notEmpty:{
                                message:'Email ID is required'
                            }
                        }
                    }

                }

            });

        });

    </script>
    @endsection
