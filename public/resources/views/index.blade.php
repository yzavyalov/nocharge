<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:title" content="Internet Association of Fintech Services">
    <meta property="og:description" content="Our participants consist of online enterprises engaged in the facilitation and management of user payments. We are committed to fostering seamless communication among these entities and furnishing them with cutting-edge tools to mitigate their operational costs.
During the global online payment process, certain challenges arise, accounting for approximately 10% of their turnover. These include customers abusing chargebacks and unscrupulous intermediaries misappropriating funds from their merchants.
Our endeavor focuses on facilitating the exchange of information regarding such entities among participants to prevent financial losses and reduce expenses. We have devised innovative mechanisms to automate the information exchange process, thereby reducing losses to around 3%, enhancing the efficiency and resilience of our partners in the online payment sphere.">
    <meta property="og:image" content="{{ asset('img/Logo.png') }}">
    <meta property="og:url" content="https://iafs.info/">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Internet Association of Fintech Services</title>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="{{ asset('img/Logo.png') }}" alt="International Internet Financial Association" id="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Internet Association of Fintech Services</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('about')}}">About our asociation</a></li>
                            <li><a class="dropdown-item" href="{{route('membership')}}">Membership</a></li>
                            <li><a class="dropdown-item" href="{{route('list-membership')}}">Participation</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Solutions (Products)
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('no-frod-system')}}">The system of checking the user for the presence of chargebacks</a></li>
                            <li><a class="dropdown-item" href="{{route('rewiews-system')}}">Reviews of unscrupulous mediators</a></li>
                            <li><a class="dropdown-item" href="{{route('ludoman-system')}}">System for verifying user data in ludomaniac registries</a></li>
                            <li><a class="dropdown-item" href="{{route('cascad-system')}}">Cascading payment management system</a></li>
                            <li><a class="dropdown-item" href="{{route('api')}}">API</a></li>
                            <li><a class="dropdown-item" href="{{route('catalog')}}">Catalogue</a></li>
{{--                            <li><hr class="dropdown-divider"></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Password generation system (Enigma)</a></li>--}}
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Laws
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('protection')}}">Protection of user personal data</a></li>
                            <li><a class="dropdown-item" href="{{ route('links') }}">Useful links</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('policy') }}">Our policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
                <button class="custom-btn btn-9" onclick="window.location.href='{{ route('dashboard') }}'">SIGN IN</button>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="container main">
        <div class="row justify-content-center">
            <div class="col-lg-12-xl-10">
                <div class="row">
                    <div class="col title">
                        <h2>Internet Association of Fintech Services</h2>
                    </div>
                </div>
                <div class="row banner">
                    <div class="col">
                        <img src="{{ asset('img/titulcard.png') }}" class="img-fluid" alt="High risk">
                    </div>
                </div>

                <div class="row block-description">
                    <div class="column">
                        Our participants consist of online enterprises engaged in the facilitation and management of user payments. We are committed to fostering seamless communication among these entities and furnishing them with cutting-edge tools to mitigate their operational costs.
                    </div>
                    <div class="column">
                        During the global online payment process, certain challenges arise, accounting for approximately 10% of their turnover. These include customers abusing chargebacks and unscrupulous intermediaries misappropriating funds from their merchants.
                    </div>
                    <div class="column">
                        Our endeavor focuses on facilitating the exchange of information regarding such entities among participants to prevent financial losses and reduce expenses. We have devised innovative mechanisms to automate the information exchange process, thereby reducing losses to around 3%, enhancing the efficiency and resilience of our partners in the online payment sphere.
                    </div>
                </div>

                <div class="row justify-content-center mt-3 subscription">
                    <div class="col border border-2 rounded">
                        <form method="post" action="{{route('subscription-form')}}">
                            @csrf
                            <div class="row form-sendmail">
                                <div class="col-lg">
                                    <label for="exampleInputEmail1" class="form-label">Send your email and we will get back to you</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                </div>
                                <div class="col-auto button-sendform">
                                    <button type="submit" class="custom-btn btn-9">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="ai-block">
                    <div class="row head-body justify-content-center">
                        <div class="col-lg-3 ai" id="artificial">artificial</div>
                        <div class="col-lg-6 face-block">
                            <img src="../img/face1.png" class="face" alt="">
                        </div>
                        <div class="col-lg-3 ai" id="intelligence">intelligence</div>
                    </div>
                    <div class="row">
                        <div class="col ai-text">
                            <p>
                                Artificial intelligence has the capability to analyze vast volumes of data, while also drawing analogies. Leveraging this ability, AI can forecast responses to queries with a probability of accuracy approaching 100%. Consequently, by harnessing the data continuously amassed from our partners, we can assess the likelihood of chargebacks or fraudulent transactions. Currently, we are actively refining algorithms and advancing AI training. In the future, we will extend the opportunity to our partners to access the probability percentage of issues pertaining to their users.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row block-column">
                    <div class="col column">
                        <img src="{{asset('img/output_2784568585_0.jpg')}}" alt="synergy" align="left">
                        <h3><b><a href="{{ route('about') }}">About</a></b></h3>
                        <p>Our organization unites companies that accept payments on the Internet in order to reduce their costs.</p>
                    </div>
                    <div class="col column">
                        <img src="{{asset('img/api.png')}}" alt="synergy" align="left">
                        <h3><b><a href="{{ route('api') }}">API</a></b></h3>
                        <p>Our system allows you to check information both through your account on the website and using the API</p>

                    </div>
                    <div class="col column">
                        <img src="{{asset('img/server.png')}}" alt="synergy" align="left">
                        <h3><b><a href="{{ route('membership') }}">Member</a></b></h3>
                        <p>To participate in our system, start by registering.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>


<footer class="mt-3">
    <div class="row footer justify-content-center">
        <div class="col-lg-3 footcolumn">
            <h4>About</h4>
            <ul>
                <li><a href="{{route('about')}}">About our asociation</a></li>
                <li><a href="{{route('membership')}}">Membership</a></li>
                <li><a href="{{route('list-membership')}}">Participation</a></li>
            </ul>
        </div>
        <div class="col-lg-3 footcolumn">
            <h4>Solutions (Products)</h4>
            <ul>
                <li><a href="{{route('no-frod-system')}}">The system of checking the user for the presence of chargebacks</a></li>
                <li><a href="{{route('rewiews-system')}}">Reviews of unscrupulous mediators</a></li>
                <li><a href="{{route('api')}}">API</a></li>
                <li><a href="{{route('catalog')}}">Catalogue</a></li>
                <li><a href="#">Password generation system (Enigma)</a></li>
            </ul>
        </div>
        <div class="col-lg-3 footcolumn">
            <h4>Laws</h4>
            <ul>
                <li><a href="{{route('protection')}}">Protection of user personal data</a></li>
                <li><a href="#">Useful links</a></li>
            </ul>
        </div>
        <div class="col-lg-3 footcolumn">
            <h4>Contacts</h4>
            <ul>
                <li><a href="mailto:ang@iafs.info">Head of the department for work with partners</a></li>
                <li><a href="mailto:casino@iafs.info">For companies involved in gaming business</a></li>
                <li><a href="mailto:forex@iafs.info">For companies involved in the forex market</a></li>
                <li><a href="mailto:administrator@iafs.info">Technical questions</a></li>
            </ul>
        </div>
    </div>
</footer>
{{----}}
{{--<script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js')}}"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GH2FYMHWGM"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-GH2FYMHWGM');
</script>

<script>
    document.addEventListener('mousemove', (event) => {
        const face = document.getElementById('face');
        const mouseX = event.clientX;
        const mouseY = event.clientY;
        const faceX = face.getBoundingClientRect().left + face.clientWidth / 2;
        const faceY = face.getBoundingClientRect().top + face.clientHeight / 2;
        const angle = Math.atan2(mouseY - faceY, mouseX - faceX);
        const angleDeg = angle * (180 / Math.PI);
        face.style.transform = `rotate(${angleDeg}deg)`;
    });
</script>

</body>
</html>
