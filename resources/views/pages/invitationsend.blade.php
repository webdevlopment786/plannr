<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plannr</title>
    <link rel="stylesheet" href="{{ asset('assets/invitation_send/css/style.css') }}">
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
        </div>
    </div>
    <!-- btn -->
    <div class="w-100">
        <div class="container ">
            <div class="container-fluid">
                <div class="row justi-sec">

                    <div class="col-2 bt-se p-0 m-0 text-start">
                        <button type="button" class="button fs-5 fw-bold rounded"><a
                                href="{{route('invitation')}}">Invitation</a></button>
                    </div>

                    <div class="col-2 bt-se p-0 m-0 text-start">
                        <button type="button" class="butt button fs-5 fw-bold rounded"><a
                                href="{{route('message')}}" class="text-dark">Message</a></button>
                    </div>

                    <div class="col-4 with-sec text-end p-0 align-middle heading">
                        <h6 class="fw-bold text pt-2 font-s">WILL YOU BE ATTENDING?</h6>
                    </div>

                    <div class="col-1 text-end p-0 sec-p-page">
                        <button type="button" class="button bt fs-6 fw-bold rounded" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><a
                                href="#">Yes (1)</a></button>
                    </div>

                    <div class="col-1 text-end p-0  sec-p-page">
                        <button type="button" class="button bt fs-6 fw-bold rounded text-light"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight">Maybe (0)</button>
                    </div>

                    <div class="col-1 text-end p-0  sec-p-page">
                        <button type="button" class="button bt fs-6 fw-bold rounded text-light"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightPop3"
                            aria-controls="offcanvasRightPop3">No (1)</button>
                    </div>

                    <div class="col-1 text-end p-0  sec-p-page">
                        <button type="button" class="button bt fs-6 fw-bold rounded text-light"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightresp"
                            aria-controls="offcanvasRightresp">Rsvp</button>
                    </div>


                    <!-- <div class="col-1 text-end p-0 sec-p-page">
                        <button type="button" class="button bt fs-6 fw-bold rounded"><a
                                href="http://127.0.0.1:5500/popop2.html">Rsvp</a></button>
                    </div> -->

                </div>

            </div>
        </div>
    </div>
    <div class="w-100 mt-5">
        <img src="{{asset('assets/invitation_send/img/Group 48098047.png ')}}" alt="" class="img w-100">
    </div>

    <div class="w-100">
        <div class="container">
            <div class="container-fluid">
                <h2 class="text-dark text-center mt-5 fs-2">Birthday</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 text-dark bg-light sec p-5 bg-sec with-50-se mb-5">
                    <h6 class="text-secondary">When</h6>
                    <h5 class="fw-bold font-size">Monday, May 5</h5>
                    <h5 class="fw-bold font-size">2:00 PM - 6:00 PM</h5>

                </div>
                <div class="col-lg-6 bg-light p-5 bg-sec with-50-se mb-5">
                    <h6 class="text-secondary">Where</h6>
                    <h5 class="fw-bold font-size">India</h5>
                    <h5 class="fw-bold font-size">Surat, Gujarat</h5>
                    <div class="row">
                        <div class="col-lg-1 wit-2">
                            <img src="{{asset('assets/invitation_send/img/Vector.png')}}" alt="" class="">
                        </div>

                        <div class="col-lg-10 pt-1 p-0 mar-l">
                            <h6 class="text-secondary ">view map</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100">
        <div class="container">
            <div class="container-fluid p-0">
                <div class="col-lg-12 text-dark bg-light  p-4 bg-sec mb-5 m-auto">
                    <h6 class="text-secondary">Hosted By</h6>
                    <h5 class="fw-bold font-size">Test Test</h5>
                    <h6 class="text-secondary">Hey Come Here</h6>
                </div>
                <div class="col-lg-12 text-dark bg-light  p-3 bg-sec mb-5 m-auto">
                    <h6 class="text-secondary">Contact Host</h6>
                    <h5 class="fw-bold font-size">(876) 295-3271</h5>
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
                        <button type="button" class="bg-dark text-light fs-5 fw-normal rounded">See All Guest</button>
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
                            <div class="col-6 text-dark bg-light p-3 bg-sec with-2-p">
                                <h6>Test Test (Host)</h6>
                            </div>
                            <div class="col-6 text-dark bg-light  p-3 bg-sec with-2-p">
                                <h6 class="text-end">1 Guest</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 m-sec-p">
                        <div class="row">
                            <div class="col-6 text-dark bg-light  p-3 bg-sec with-2-p">
                                <h6>Abz</h6>
                                <h6 class="text-secondary">Hello</h6>
                            </div>
                            <div class="col-6 text-dark bg-light  p-3 bg-sec with-2-p">
                                <h6 class="text-end mb-0">1 Guest</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6  m-sec">
                        <div class="row">
                            <div class="col-6 text-dark bg-light  p-3 bg-sec with-2-p">
                                <h6>Test Test (Host)</h6>
                                <h6 class="text-secondary">Test</h6>
                            </div>
                            <div class="col-6 text-dark bg-light  p-3 bg-sec with-2-p">
                                <h6 class="text-end mb-0">1 Guest</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 m-sec-p">
                        <div class="row mt-3">
                            <div class="col-6 text-dark bg-light  p-3 bg-sec with-2-p">
                                <h6 class="">gshxkx</h6>
                                <h6 class="text-secondary">Test</h6>
                            </div>
                            <div class="col-6 text-dark bg-light  p-3 bg-sec with-2-p">
                                <h6 class="text-end ">1 Guest</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 bg-se mt-5">
        <div class="container">
            <div class="container-fluid">
                <div class="row align-items-center">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- popop 1 -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Guestlist</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body m-1">
            <div class="row">
                <button class="text-start p-2 bg-sec rounded">
                    <i class="fa-solid fa-magnifying-glass"></i> Search Guests
                </button>
                <div class="accordion mt-3" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button rounded text-light" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Yes (2)
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6 text-dark bg-light  p-3 bg-sec">
                                        <h6 class="text-secondary">Test Test (Host)</h6>
                                    </div>
                                    <div class="col-6 text-dark bg-light  p-3 bg-sec">
                                        <h6 class="text-end">1 Adult</h6>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6 text-dark bg-light  p-3 bg-sec">
                                        <h6 class="text-secondary">Test Test (Host)</h6>
                                    </div>
                                    <div class="col-6 text-dark bg-light  p-3 bg-sec">
                                        <h6 class="text-end">1 Adult</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed text-light rounded mt-3" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                Maybe (0)
                            </button>
                        </h2>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed text-light rounded mt-3" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                No (0)
                            </button>
                        </h2>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed rounded mt-3 text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                Not at Replies (0)
                            </button>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popop1 end -->

    <!-- popop 2 -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRightresp" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">RSVP</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button rounded text-light">
                    You will be attending!
                </button>
            </h2>
            <div class="accordion-item mt-5 p-3">
                <div class="row mt-2">
                    <div class="col">
                        <input type="text" class="form-control border border-dark p-2" placeholder="RSVP Name" aria-label="RSVP Name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control border border-dark p-2" placeholder="Email Address" aria-label="Email Address">
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <label for="validationDefault01" class="form-label">Guests</label>
                    <div class="row ">
                        <div class="col-12">
                            <button id="minus" class="rounded border border-dark p-1">−</button>
                            <input type="number" value="0" id="input" class="form-page rounded border border-dark p-1"/>
                            <button id="plus" class="rounded border border-dark p-1">+</button>
                        </div>
                    </div>
                </div>
                <div class="col mt-3 pt-2 pb-2 ">
                    <input type="text" class="form-control p-2 border border-dark" placeholder="Add a Comment..."
                        aria-label="Add a Comment...">
                </div>
                <h2 class="accordion-header mt-5" id="headingOne">
                    <button class="accordion-button rounded text-light">
                        Submit RSVP
                    </button>
                </h2>
            </div>
        </div>
    </div>
    <!-- End popop-2 -->

    <!-- popop-3 -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRightPop3" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">RSVP</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button rounded text-light">
                    You will be attending!
                </button>
            </h2>
            <div class="accordion-item mt-5 p-3">
                <div class="row mt-1">
                    <div class="col">
                        <input type="text" class="form-control border border-dark" placeholder="RSVP Name" aria-label="RSVP Name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control border border-dark" placeholder="Email Address" aria-label="Email Address">
                    </div>
                </div>
                <div class="col mt-3 ">
                    <input type="text" class="form-control p-2 border border-dark" placeholder="Add a Comment..."
                        aria-label="Add a Comment...">
                </div>
                <h2 class="accordion-header mt-3" id="headingOne">
                    <button class="accordion-button rounded text-light">
                        Submit RSVP
                    </button>
                </h2>
            </div>
        </div>
    </div>
</body>
</html>