<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CashCore</title>
</head>
<body style="background: linear-gradient(to right, #1F636C, #052d35); margin: 0; height: 100%;">

    <div class="container mx-auto">
        <div class="coin absolute top-0 left-96" style="position: absolute; margin-top: 0; max-height: none; max-width: 700px; margin-left: 700px;">
            <img src="{{ asset('icons/Frame 54.png') }}" alt="Your Image" style="max-width: 700px;">
        </div>

        <header style="display: flex; background: linear-gradient(to right, #1F636C, #052d35); padding: 10px;">
            <nav>
                <ul style="margin-left: 9ch; list-style-type: none; margin-top: 40px; padding: 10px; display: flex; gap: 20px;">

                <li><a href="{{ url('/') }}" style="color: #ffffff; text-decoration: none; font-weight: bold; transition: color 0.3s, text-decoration 0.3s;">CashCore</a></li>
                    <li><a href="{{ url('/') }}" style="color: #ffffff; text-decoration: none; transition: color 0.3s, text-decoration 0.3s;">Home</a></li>
                    <li><a href="/features.html" style="color: #ffffff; text-decoration: none; transition: color 0.3s, text-decoration 0.3s;">Features</a></li>
                    <li><a href="{{ route('dashboard') }}" style="color: #ffffff; text-decoration: none; transition: color 0.3s, text-decoration 0.3s;">Dashboard</a></li>
                <li><a href="{{ route('login') }}" style="color: #ffffff; text-decoration: none;">Login</a></li>
                <li><a href="{{ route('register') }}" style="color: #ffffff; text-decoration: none;">Sign Up</a></li>
</nav>
            </div>
        </header>

        <div>
            <h1 style="margin-top: 60px; margin-left: 3ch; font-size: 48pt; color: #ffffff;">Your online<br>budget Tracker.</h1>
            <div class="heading" style="display: flex; gap: 30px;">
                <div class="w-1/4" style="margin-left: 16ch; font-weight: normal; color: #ffffff; max-width: 10px;">
                    <h3>20%<br><br>Track your income.</h3>
                </div>

                <div class="w-1/4" style="font-weight: normal; color: #ffffff; max-width:10px; margin-left:11ch;">
                    <h3>20%<br><br>Track your expenses.</h3>
                </div>

                <div class="w-1/4" style="font-weight: normal; color: #ffffff;max-width: 10px;margin-left:14ch;">
                    <h3>20%<br><br>Track your savings.</h3>
                </div>
            </div>

            <div class="middle-text" style="display: flex; gap: 5px; color: #ffffff; font-weight: 6px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                <img src="{{ asset('icons/play 1.png') }}"  alt="Your Image" class="play" style="margin-left: 10ch;">
                <h4 style="font-size: 16px;">see how it works</h4>
            </div>
        </div>

        <div class="mt-16" style="margin-left: 12ch; color: #ffffff;">
            <h5>100% flexible online budgeting and tracking<br>platform that gives you more total finance<br>control.</h5>
        </div>
    </div>
</body>
</html>


