<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Not Found Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            font-size: 16px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        header {
            min-height: 50px;
        }

        .head-text {
            text-transform: uppercase;
            width: 200px;
            height: auto;
            padding: 20px;
        }

        .head-text,
        .main-wrapper {
            width: 80%;
            margin: auto;
        }

        .main-wrapper {
            display: flex;
        }

        .scarecrow-img img {
            width: 90%;
            height: auto;
        }

        .error-text {
            width: 70%;
        }

        .error-text h2 {
            width: 80%;
            font-size: 3.75rem;
            letter-spacing: 0.5px;
            font-weight: normal;
        }

        .error-text p {
            width: 50%;
            padding: 5px;
        }

        a {
            cursor: pointer;
            width: auto;
            padding: 10px 20px;
            border: 1px solid #333;
            border-radius: 3px;
            color: white;
            background-color: #333;
            text-transform: uppercase;
            margin-top: 15px;
        }

        footer {
            padding: 15px;
            text-align: center;
            min-height: 50px;
            margin-top: auto;
        }

        .fa-copyright {
            font-weight: lighter;
        }

        /* star mobile-first media queries */

        /* Small devices (landscape phones, 576px and up) */


        /* Medium devices (tablets, 768px and up) */
        @media (max-width: 991.9px) {
            .main-wrapper {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .error-text h2 {
                width: 100%;
                font-size: 3rem;
                line-height: 100%;
                padding-top: 15px;
            }

            .error-text p {
                width: 100%;
                font-size: 0.8rem;
                line-height: 150%;
                padding-top: 15px;
            }
        }

        /* Large devices (desktops, 992px and up) */
        @media (min-width: 992px) {
            .error-text h2 {
                width: 100%;
                line-height: 100%;
                padding-top: 15px;
            }

            .error-text p {
                width: 100%;
                line-height: 150%;
                padding-top: 15px;
            }
        }

        /* end media queries */
    </style>
</head>


<body>

    @include('components.errors.404')

</body>

</html>
