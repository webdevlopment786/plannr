<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planner</title>
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
                <div class="row ">
                    <div class="col-lg-2  box p-0 m-0 text-start">
                        <button type="button" class="butt button fs-5 fw-bold rounded text-dark bt-we"><a href="{{route('invitation')}}" class="text-dark">Invitation</a></button>
                    </div>

                    <div class="col-lg-2  box p-0 m-0 text-start">
                        <button type="button" class="button fs-5 fw-bold rounded bt-we"><a href="{{route('message')}}" class="text-light">Message</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100">
        <div class="container-fluid">
            <div class="container">
                <div class="row mt-5 align-items-center p-0">
                    <div class="col-6 sec-bg">
                        <i class="fa-solid fa-arrow-left fs-4 text-light p-2 text-center"></i>
                    </div>
                    <div class="col-6 p-0">
                        <img src="{{asset('assets/invitation_send/img/Group 48098033.png')}}" alt="" class="img-with">
                        <h6 class="mt-2 fw-normal text-dark">Test Test</h6>
                    </div>
                    <div class="line border border-dark w-100"></div>
                    <h5 class="mt-2 text-center">This is a private message with Test Test</h5>
                </div>
                <div class="row mt-5 align-items-center p-0">
                    <div class="col-6 ">
                        <img src="{{asset('assets/invitation_send/img/Group 48098066.png')}}" alt="">
                    </div>
                </div>
                <div class="col-2  p-3 mb-5 mt-2 bg-msg">
                    <h5 class="text-light mb-0">Message from host</h5>
                    <h6 class="text-light mb-0">Hey come here</h6>
                </div>
                <h6 class="text-secondary text-center">03 / 25 / 23 10:30 AM</h6>
                <div class="row justify-content-end">
                    <div class="col-1 p-3 mb-1 mt-2 bg-msg bg-ms text-center">
                        <h5 class="text-light mb-0">Hiii</h5>
                    </div>
                    <h6 class="text-end">Sent to 1</h6>
                </div>
                <div class="line border border-dark w-100 mt-5"></div>
                <div class="row mt-5 align-items-center border border-1 rounded p-2 border-dark">
                    <div class="col-6">
                        <h6 class="mb-0">Write a Message</h6>
                    </div>
                    <div class="col-6 p-0 m-0 text-eng d-flex justify-content-end">
                        <button type="button" class=" button bt-sec fs-6 fw-normal rounded text-light">SEND</button>
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
                        <div class="row ">
                            <div class="col-1 icon-wi p-0 text-center ">
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

</body>

</html>