<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" >
        <title>Email Verification</title>
        <body>
            <div class="hd">
                Made with ❤️ by Planner
            </div>
            <div class="verify-container">
                <div class="headimg">
                <img src="https://cdn4.iconfinder.com/data/icons/social-media-logos-6/512/112-gmail_email_mail-512.png" alt="" width="50" height="50">
            </div>

            <h2 class="verify-title">Here is your one time password</h2>
            <h4 class="verify-subtitle">To validate your emial address </h4>
            <h1 class="verify-number"><?php echo $otp; ?> </h1>
            <form action="#" method="post">
            </form>
            </div>
        </body>
        <div class="ft">
        FAQ's | Terms & Conditions | Contact us
        </div>
        <style>
        body {
            font-family: monospace;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .verify-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 60vh;

        }

        .verify-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 16px;
            text-align: center;
        }
        h4.verify-subtitle {
            font-size: 14px;
            text-align: center;
            font-weight: 200;
            margin-bottom: 20px;
        }
        h1.verify-number {
            text-align: center;
            letter-spacing: 0.5em;
            font-size: 32px;
        }
        p.validate {
            text-align: center;
            color: #f8312f;
            font-size: 15px;
        }
        .hd {
            padding: 5vh;
            text-transform: uppercase;
            font-size: 22px;
        }
        .ft {
            margin-top: 5vh;
            text-transform: uppercase;
        }
        .headimg {
            text-align: center;
        }
        @media only screen and (max-width: 768px) {
        
        .hd {
            padding: 3vh;
            
        }
        .verify-container {
            
            width: 35vh;
        }
        
        }
        </style>
    </head>
</html>
