<!-- FOOTER -->


<footer class="mt-3">
    <div class="row footer justify-content-center">
        <div class="col-lg-3 footcolumn">
            <h4>About</h4>
            <ul>
                <li><a href="{{route('about')}}">About our asociation</a></li>
                <li><a href="{{route('membership')}}">Membership</a></li>
                <li><a href="{{route('list-membership')}}">Participation</a></li>
                <li><a href="{{route('terms')}}">Terms of Service for the website</a></li>
            </ul>
        </div>
        <div class="col-lg-3 footcolumn">
            <h4>Solutions (Products)</h4>
            <ul>
                <li><a href="{{route('no-frod-system')}}">The system of checking the user for the presence of chargebacks</a></li>
                <li><a href="{{route('rewiews-system')}}">Reviews of unscrupulous mediators</a></li>
                <li><a href="{{route('api')}}">API</a></li>
                <li><a href="{{route('catalog-index')}}">Black List</a></li>
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
