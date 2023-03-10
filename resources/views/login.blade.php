<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            padding: 0;
            margin: 0;
        }

        .vid-container {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .bgvid {
            position: absolute;
            left: 0;
            top: 0;
            width: 100vw;
        }

        .inner-container {
            width: 400px;
            height: 400px;
            position: absolute;
            top: calc(50vh - 200px);
            left: calc(50vw - 200px);
            overflow: hidden;
        }

        .bgvid.inner {
            top: calc(-50vh + 200px);
            left: calc(-50vw + 200px);
            filter: url("data:image/svg+xml;utf9,<svg%20version='1.1'%20xmlns='http://www.w3.org/2000/svg'><filter%20id='blur'><feGaussianBlur%20stdDeviation='10'%20/></filter></svg>#blur");
            -webkit-filter: blur(10px);
            -ms-filter: blur(10px);
            -o-filter: blur(10px);
            filter: blur(10px);
        }

        .box {
            position: absolute;
            height: 100%;
            width: 100%;
            font-family: Helvetica;
            color: #fff;
            background: rgba(0, 0, 0, 0.13);
            padding: 30px 0px;
        }

        .box h1 {
            text-align: center;
            margin: 30px 0;
            font-size: 30px;
        }

        .box input {
            display: block;
            width: 300px;
            margin: 20px auto;
            padding: 15px;
            background: rgba(0, 0, 0, 0.2);
            color: #fff;
            border: 0;
        }

        .box input:focus,
        .box input:active,
        .box button:focus,
        .box button:active {
            outline: none;
        }

        .box button {
            background: #2ecc71;
            border: 0;
            color: #fff;
            padding: 10px;
            font-size: 20px;
            width: 330px;
            margin: 20px auto;
            display: block;
            cursor: pointer;
        }

        .box button:active {
            background: #27ae60;
        }

        .box p {
            font-size: 14px;
            text-align: center;
        }

        .box p span {
            cursor: pointer;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="vid-container">
        <video class="bgvid" autoplay="autoplay" muted="muted" preload="auto" loop>
            <source
                src="https://mazwai.com/videvo_files/video/free/2015-09/small_watermarked/postcard_from_big_sur_preview.webm"
                type="video/webm">
        </video>
        <div class="inner-container">
            <video class="bgvid inner" autoplay="autoplay" muted="muted" preload="auto" loop>
                <source
                    src="https://mazwai.com/videvo_files/video/free/2015-09/small_watermarked/postcard_from_big_sur_preview.webm?random=1"
                    type="video/webm">
            </video>
            <div class="box">
                <h1>Login</h1>
                <form action="{{ url('user') }}" method="POST">
                    @csrf
                    <input type="text" name="name" id="name" placeholder="Username" />
                    <input type="password" name="password" id="password" placeholder="Password" />
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="color:red">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit">Login</button>
                </form>
                <p>Not a member? <span><a href="{{ url('register') }}">Sign Up</a></span></p>
            </div>

        </div>
    </div>
</body>

</html>
