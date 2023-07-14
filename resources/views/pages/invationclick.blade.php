<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>planner</title>
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
                    <div class="col-lg-2 box p-0 m-0 text-start">
                        <button type="button" class="button fs-5 fw-bold rounded bt-we"><a href="{{route('invitation')}}">Invitation</a></button>
                    </div>

                    <div class="col-lg-2 p-0 box m-0 text-start">
                        <button type="button" class="butt button fs-5 fw-bold rounded bt-we"><a href="{{route('message')}}" class="text-dark">Message</a></button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="w-100">
        <div class="container-fluid">
            <div class="container">
                <h5 class="mt-5 fw-bold">Event Message</h5>
                <div class="row">
                    <div class="col-6 with-se b-color p-4 rounded-3 with-s">
                        <p class="mb-0 text-light mr-2 fs-5"><i class="fa-solid fa-lock text-light"
                                style="margin-right: 10px;"></i>To participate in this conversation, you must RSVP.</p>
                    </div>
                </div>
                <div class="row mt-5 align-items-center">
                    <div class="col-1 p-0 margin-text">
                        <img src="{{asset('assets/invitation_send/img/Group 48098058.png ')}}" alt="">
                    </div>
                    <div class="col-11 p-0 m-w">
                        <h3>Test Test (Host)</h3>
                        <h6>Send message to your host</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>