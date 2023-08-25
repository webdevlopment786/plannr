<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plannr</title>
    <link rel="stylesheet" href="{{ asset('assets/invitation_send/css/style.css') }}">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>

<body class="bg-color">
    <div class="container  text-center">
        <div class="container-fluid">
            <img src="{{asset('assets/invitation_send/img/logo.png')}}" alt="">
            <!-- <img src="img/logo.png" alt=""> -->
        </div>
    </div>
    <!-- btn -->
    <div class="w-100">
        <div class="container ">
            <div class="container-fluid">
                <div class="row justi-sec">

                    <div class="col-2 bt-se p-0 m-0 text-start">
                        <button type="button" class="button fs-5 fw-bold "><a
                                href="{{url('invitation-send')}}">Invitation</a></button>
                    </div>

                    <!-- <div class="col-2 bt-se p-0 m-0 text-start">
                        <button type="button" class="butt button fs-5 fw-bold "><a href="{{route('message')}}" class="text-dark">Message</a></button>
                    </div> -->
                    <div class="col-2 bt-se p-0 m-0 text-start">
                        <button type="button" class="butt button fs-5 fw-bold "><a
                                href="{{url('message')}}" class="text-dark">Message</a></button>
                    </div>

                    <div class="col-lg-5 with-sec text-end p-0 align-middle heading">
                        <h6 class="fw-bold text pt-2 font-s">WILL YOU BE ATTENDING?</h6>
                    </div>

                    <div class="col-1 text-end p-0 sec-p-page">
                        <button type="button" class="button bt fs-6 fw-bold  text-light" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRightresp" aria-controls="offcanvasRightresp">Yes ({{$rsvpcount}})</button>
                    </div>

                    <div class="col-1 text-end p-0 sec-p-page">
                        <button type="button" class="button bt fs-6 fw-bold text-light" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRightrespmaybe" aria-controls="offcanvasRightrespmaybe">Maybe ({{$rsvpcountmaybe}})</button>
                    </div>

                    <div class="col-1 text-end p-0  sec-p-page">
                        <button type="button" class="button bt fs-6 fw-bold text-light" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRightPop3" aria-controls="offcanvasRightPop3">No ({{$rsvpcountno}})</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="w-100 mt-5">
        <img src="{{ asset('images/product/'.$product->image) }}" alt="" class="img w-100">
        <img src="img/Group 48098047.png" alt="" class="img w-100">
    </div>

    <div class="w-100">
        <div class="container">
            <div class="container-fluid">
                <h2 class="text-dark text-center mt-5 fs-2">{{$createinvitions->type_events}}</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 text-dark bg-white sec p-5 bg-sec with-50-se mb-5">
                    <h6 class="text-secondary">When</h6>
                    <h5 class="fw-500 font-size text-dark">{{$createinvitions->date}}</h5>
                    <h5 class="fw-500 font-size text-dark">{{$createinvitions->time}}</h5>

                </div>
                <div class="col-lg-6 bg-white p-5 bg-white bg-sec with-50-se mb-5">
                    <h6 class="text-secondary">Where</h6>
                    <h5 class="fw-500 font-size text-dark">{{$createinvitions->location}}</h5>
                    <!-- <h5 class="fw-500 font-size text-dark">Surat, Gujarat</h5> -->
                    <div class="row">
                        <div class="col-lg-1 wit-2">
                            <img src="{{asset('assets/invitation_send/img/Vector.png')}}" alt="" class="">
                            <!-- <img src="img/Vector.png" alt=""> -->
                        </div>

                        <div class="col-lg-10  p-0 mar-l">
                            <h5 class="text-dark mb-0"><a href="{{url('invitation-send')}}">View Map</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100">
        <div class="container">
            <div class="container-fluid p-0">
                <div class="col-lg-12 text-dark bg-white  p-4 bg-sec mb-5 m-auto">
                    <h6 class="text-secondary">Hosted By</h6>
                    <h5 class="fw-500 font-size">{{$createinvitions->hosted_by}}</h5>
                    <h6 class="text-secondary">Hey Come Here</h6>
                </div>
                <div class="col-lg-12 text-dark bg-white  p-3 bg-sec mb-5 m-auto">
                    <h6 class="text-secondary">Contact Host</h6>
                    <h5 class="fw-500 font-size">{{$createinvitions->phone}}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100">
        <div class="container">
            <div class="container-fluid">
                <div class="row align-items-center mb-5">
                    <div class="col-6 p-0 m-0">
                        <h2 class="text-dark fs-5 fw-normal">Who’s Comming</h2>
                    </div>
                    <div class="col-6 p-0 m-0 text-end">
                        <!-- <button type="button" class="bg-dark text-light fs-5 fw-normal rounded">
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
                        See All Guest</button> -->

                        <button type="button" class="bg-dark rounded-3 text-light fs-5 fw-normal "
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                            See All Guest</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100">
        <div class="container">
            <div class="container-fluid">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-6 text-dark bg-white p-3 bg-sec with-2-p">
                                <h6>{{$createinvitions->hosted_by}} (Host)</h6>
                            </div>
                            <div class="col-6 text-dark bg-white  p-3 bg-sec with-2-p">
                                <h6 class="text-end">1 Guest</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 m-sec-p">
                        @foreach($rsvps as $rsvp)
                            <div class="row">
                                <div class="col-6 text-dark bg-white  p-3 bg-sec with-2-p">
                                    <h6>{{$rsvp->name}}</h6>
                                    <h6 class="text-secondary">{{$rsvp->comment}}</h6>
                                </div>
                                <div class="col-6 text-dark bg-white  p-3 bg-sec with-2-p">
                                    <h6 class="text-end mb-0">{{$rsvp->guest}} Guest</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- <div class="row g-5">
                    <div class="col-lg-6  m-sec">
                        <div class="row">
                            <div class="col-6 text-dark bg-white  p-3 bg-sec with-2-p">
                                <h6>{{$createinvitions->hosted_by}} (Host)</h6>
                                <h6 class="text-secondary">Test</h6>
                            </div>
                            <div class="col-6 text-dark bg-white p-3 bg-sec with-2-p">
                                <h6 class="text-end mb-0">1 Guest</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 m-sec-p">
                        <div class="row mt-3">
                            <div class="col-6 text-dark bg-white  p-3 bg-sec with-2-p">
                                <h6 class="">gshxkx</h6>
                                <h6 class="text-secondary">Test</h6>
                            </div>
                            <div class="col-6 text-dark bg-white  p-3 bg-sec with-2-p">
                                <h6 class="text-end ">1 Guest</h6>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

        <div class="w-100 bg-se mt-5">
            <div class="container">
                <div class="container-fluid">
                    <div class="row align-items-center p-2">
                        <div class="col-5 p-0">
                            <div class="row jus-sec">
                                <div class="col-1 icon-wi p-0 text-center">
                                    <i class="fa-brands fa-facebook-f text-light icon"></i>
                                </div>
                                <div class="col-1 icon-wi p-0 ">
                                    <i class="fa-brands fa-instagram text-light icon"></i>
                                </div>
                                <div class="col-1 icon-wi p-0">
                                    <i class="fa-brands fa-twitter text-light icon"></i>
                                </div>
                                <div class="col-1 icon-wi p-0">
                                    <i class="fa-brands fa-pinterest text-light icon"></i>
                                </div>
                                <div class="col-1 icon-wi p-0">
                                    <i class="fa-brands fa-youtube text-light icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-7 p-0 text-end">
                            <img src="{{asset('assets/invitation_send/img/Group 48098056.png')}}" alt="" class="img-w">
                            <!-- <img src="img/Group 48098056.png" alt="" class="img-w"> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- popop 1 -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h4 id="offcanvasRightLabel">Guestlist</h4>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body m-1">
                <div class="row justify-content-center">
                    <div class="col-lg-11  p-0">
                        <input type="text" class="text-start p-2 bg-sec border border-secondary rounded text-secondary" placeholder="Search Guests">
                        <!-- <button class="text-start p-2 bg-sec border border-secondary rounded text-secondary"> -->
                            <i class="fa-solid fa-magnifying-glass"></i> 
                        <!-- </button> -->
                    </div>
                    <div class="accordion mt-5" id="accordionExample">
                        <div class="accordion-item pt-5 px-3 rounded-3">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button text-light rounded-3" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="box-icon d-flex justify-content-between w-100">
                                        <div class="yes-hed">Yes ({{$rsvpcount}})</div>
                                        <div class="icon-dwon"><i class="fa-solid fa-angle-down"
                                                style="color: #ffffff;"></i></div>
                                    </div>
                                </button>
                            </h2>

                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-6 text-dark bg-white p-3 bg-sec rounded-3">
                                            <h6 class="text-secondary">{{$createinvitions->hosted_by}} (Host)</h6>
                                        </div>
                                        <div class="col-6 text-dark bg-white p-3 bg-sec rounded-3">
                                            <h6 class="text-end">1 Adult</h6>
                                        </div>
                                    </div>
                                    @foreach($rsvpsnew as $rsvps)
                                        @if($rsvps->status == 1)
                                            <div class="row mt-3">
                                                <div class="col-6 text-dark bg-white  p-3 bg-sec rounded-3">
                                                    <h6 class="text-secondary">{{$rsvps->name}} (Guest)</h6>
                                                </div>
                                                <div class="col-6 text-dark bg-white  p-3 bg-sec rounded-3">
                                                    <h6 class="text-end">{{$rsvps->guest}} Adult</h6>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="accordion-item  px-3 rounded-3">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="box-icon d-flex justify-content-between w-100">
                                        <div class="yes-hed text-light">Maybe ({{$rsvpcountmaybe}})</div>
                                        <div class="icon-dwon"><i class="fa-solid fa-angle-down"
                                                style="color: #ffffff;"></i></div>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-6 text-dark bg-white p-3 bg-sec rounded-3">
                                            <h6 class="text-secondary">{{$createinvitions->hosted_by}} (Host)</h6>
                                        </div>
                                        <div class="col-6 text-dark bg-white p-3 bg-sec rounded-3">
                                            <h6 class="text-end">1 Adult</h6>
                                        </div>
                                    </div>
                                    @foreach($rsvpsnew as $rsvps)
                                        @if($rsvps->status == 2)
                                            <div class="row mt-3">
                                                <div class="col-6 text-dark bg-white  p-3 bg-sec rounded-3">
                                                    <h6 class="text-secondary">{{$rsvps->name}} (Guest)</h6>
                                                </div>
                                                <div class="col-6 text-dark bg-white  p-3 bg-sec rounded-3">
                                                    <h6 class="text-end">{{$rsvps->guest}} Adult</h6>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item px-3 rounded-3">
                            <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <div class="box-icon d-flex justify-content-between w-100">
                                    <div class="yes-hed text-light">No ({{$rsvpcountno}})</div>
                                    <div class="icon-dwon"><i class="fa-solid fa-angle-down"
                                            style="color: #ffffff;"></i></div>
                                </div>
                            </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6 text-dark bg-white p-3 bg-sec rounded-3">
                                        <h6 class="text-secondary">{{$createinvitions->hosted_by}} (Host)</h6>
                                    </div>
                                    <div class="col-6 text-dark bg-white p-3 bg-sec rounded-3">
                                        <h6 class="text-end">1 Adult</h6>
                                    </div>
                                </div>
                                @foreach($rsvpsnew as $rsvps)
                                    @if($rsvps->status == 0)
                                        <div class="row mt-3">
                                            <div class="col-6 text-dark bg-white  p-3 bg-sec rounded-3">
                                                <h6 class="text-secondary">{{$rsvps->name}} (Guest)</h6>
                                            </div>
                                            <div class="col-6 text-dark bg-white  p-3 bg-sec rounded-3">
                                                <h6 class="text-end">{{$rsvps->guest}} Adult</h6>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item pb-5 px-3 rounded-3">
                            <h2 class="accordion-header" id="headingfour">
                            <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                <div class="box-icon d-flex justify-content-between w-100">
                                    <div class="yes-hed text-light">Not at Replies (0)</div>
                                    <div class="icon-dwon"><i class="fa-solid fa-angle-down"
                                            style="color: #ffffff;"></i></div>
                                </div>
                            </button>
                            </h2>
                            <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6 text-dark bg-white p-3 bg-sec rounded-3">
                                        <h6 class="text-secondary">Test Test (Host)</h6>
                                    </div>
                                    <div class="col-6 text-dark bg-white p-3 bg-sec rounded-3">
                                        <h6 class="text-end">1 Adult</h6>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6 text-dark bg-white  p-3 bg-sec rounded-3">
                                        <h6 class="text-secondary">Amponsah (Guest)</h6>
                                    </div>
                                    <div class="col-6 text-dark bg-white  p-3 bg-sec rounded-3">
                                        <h6 class="text-end">1 Adult</h6>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- popop1 end -->

        <!-- popop Yes -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRightresp" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h4 id="offcanvasRightLabel">RSVP</h4>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <h2 class="accordion-header" id="headingOne">
                    <button class="rounded button text-start p-1">
                        <h6 class="text-light mb-0 px-2"> You will be attending!</h6> 
                    </button>
                </h2>
                <div class="accordion-item mt-5 p-4">
                    <form action="{{url('rsvp-count')}}" method="post">
                    @csrf
                    <div class="row mt-2">
                        <div class="col">
                            <input type="hidden" name="invitation_id" value="{{$createinvitions->id}}">
                            <input type="hidden" name="contact_id" value="{{$contact_id}}">
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                            <input type="hidden" name="status" value="1">
                            <input type="text"  class="form-control border border-dark p-2" name="name" placeholder="RSVP Name"
                                aria-label="RSVP Name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control border border-dark p-2" name="email" placeholder="Email Address"
                                aria-label="Email Address">
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <label for="validationDefault01" class="form-label">Guests</label>
                        <div class="row justify-content-center">
                            <div class="col-12 text-center border border-dark wi-95 p-2 rounded-3 bg-white">
                                <button id="minus" class="rounded bor-1 ">−</button>
                                <input type="number" name="guest" value="1" id="input"
                                    class="form-page rounded bor-1 text-center " />
                                <button id="plus" class="rounded bor-1">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="col mt-3 pt-2 pb-2 ">
                        <input type="text" name="comment" class="form-control p-2 border border-dark" placeholder="Add a Comment..."
                            aria-label="Add a Comment...">
                    </div>
                    <h2 class="mt-3">
                        <button class="rounded button text-center w-100">
                            <h6 class="text-light mb-0">Submit RSVP</h6> 
                        </button>
                    </h2>
                    </form>
                </div>
            </div>
        </div>
        <!-- End popop-yes -->

        <!-- popop maybe -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRightrespmaybe" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h4 id="offcanvasRightLabel">RSVP</h4>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <h2 class="accordion-header" id="headingOne">
                    <button class="rounded button text-start p-1">
                        <h6 class="text-light mb-0 px-2"> You will be attending!</h6> 
                    </button>
                </h2>
                <div class="accordion-item mt-5 p-4">

                    <form action="{{url('rsvp-count')}}" method="post">
                    @csrf
                        <div class="row mt-2">
                            <div class="col">
                                <input type="hidden" name="invitation_id" value="{{$createinvitions->id}}">
                                <input type="hidden" name="contact_id" value="{{$contact_id}}">
                                <input type="hidden" name="user_id" value="{{$user_id}}">
                                <input type="hidden" name="status" value="2">
                                <input type="text" class="form-control border border-dark p-2" name="name" placeholder="RSVP Name"
                                    aria-label="RSVP Name">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control border border-dark p-2" name="email" placeholder="Email Address"
                                    aria-label="Email Address">
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                        <label for="validationDefault01" class="form-label">Guests</label>
                        <div class="row justify-content-center">
                            <div class="col-12 text-center border border-dark wi-95 p-2 rounded-3 bg-white">
                                <button id="minusmaybe" class="rounded bor-1 ">−</button>
                                <input type="number" name="guest" value="1" id="inputmaybe"
                                    class="form-page rounded bor-1 text-center " />
                                <button id="plusmaybe" class="rounded bor-1">+</button>
                            </div>
                        </div>
                    </div>

                        <div class="col mt-3 pt-2 pb-2 ">
                            <input type="text" name="comment" class="form-control p-2 border border-dark" placeholder="Add a Comment..."
                                aria-label="Add a Comment...">
                        </div>
                        <h2 class="mt-3">
                            <button class="rounded button text-center w-100">
                                <h6 class="text-light mb-0">Submit RSVP</h6> 
                            </button>
                        </h2>
                    </form>

                </div>
            </div>
        </div>
        <!-- End popop-maybe -->

        <!-- popop-no -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRightPop3" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h4 id="offcanvasRightLabel">RSVP</h4>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <h2 class="accordion-header" id="headingOne">
                    <button class="rounded button text-start p-1">
                        <h6 class="text-light mb-0 px-2"> You are not attending!</h6> 
                    </button>
                </h2>
                <div class="accordion-item mt-5 p-3">
                    <form action="{{url('rsvp-count')}}" method="post">
                    @csrf
                    <div class="row mt-1">
                        <div class="col">
                            <input type="hidden" name="invitation_id" value="{{$createinvitions->id}}">
                            <input type="hidden" name="contact_id" value="{{$contact_id}}">
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                            <input type="hidden" name="status" value="0">
                            <input type="text" class="form-control border border-dark" name="name" placeholder="RSVP Name"
                                aria-label="RSVP Name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control border border-dark" name="email" placeholder="Email Address"
                                aria-label="Email Address">
                        </div>
                    </div>
                    <div class="col mt-3 ">
                        <input type="text" class="form-control p-2 border border-dark" name="comment" placeholder="Add a Comment..."
                            aria-label="Add a Comment...">
                    </div>
                    <h2 class="mt-3">
                        <button class="rounded button text-center w-100">
                            <h6 class="text-light mb-0">Submit RSVP</h6> 
                        </button>
                    </h2>
                    </form>
                </div>
            </div>
        </div>
        <!-- end popop-no -->

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

    <script>
        new WOW().init();
    </script>
    <script>
        const minusButton = document.getElementById('minus');
        const plusButton = document.getElementById('plus');
        const inputField = document.getElementById('input');

        const minusButtonmaybe = document.getElementById('minusmaybe');
        const plusButtonmaybe = document.getElementById('plusmaybe');
        const inputFieldmaybe = document.getElementById('inputmaybe');

        minusButton.addEventListener('click', event => {
            event.preventDefault();
            const currentValue = Number(inputField.value) || 1;
            if(currentValue > 1){
                inputField.value = currentValue - 1;
            }
        });

        minusButtonmaybe.addEventListener('click', event => {
            event.preventDefault();
            const currentValue = Number(inputFieldmaybe.value) || 1;
            if(currentValue > 1){
                inputFieldmaybe.value = currentValue - 1;
            }
        });

        plusButton.addEventListener('click', event => {
            event.preventDefault();
            const currentValue = Number(inputField.value) || 1;
            inputField.value = currentValue + 1;
        });

        plusButtonmaybe.addEventListener('click', event => {
            event.preventDefault();
            const currentValue = Number(inputFieldmaybe.value) || 1;
            inputFieldmaybe.value = currentValue + 1;
        });
    </script>
</body>

</html>