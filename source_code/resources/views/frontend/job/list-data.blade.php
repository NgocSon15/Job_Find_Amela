<section class="featured-job-area feature-padding">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <h2>Featured Jobs</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10" >
                <!-- single-job-content -->
                @foreach($job_same as $key=>$val)
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href=""><img src="assets/img/icon/job-list1.png" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="job_details.html"><h4>Digital Marketer</h4></a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                    <li>$3500 - $4000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="job_details.html">Full Time</a>
                            <span>7 hours ago</span>
                        </div>
                    </div>
            @endforeach
            <!-- single-job-content -->
                <div class="pagination-area pb-115 text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="single-wrap d-flex justify-content-center">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-start">
{{--                                                                                {{ $job_same->appends(request()->query()) }}--}}
{{--                                            {{$job_same->links()}}--}}
                                            {!! $job_same->links() !!}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    window.onload = function (){
        $(document).ready(function() {
            var pageLinks = document.querySelectorAll('a.page-link');
            for (var i = 0; i < pageLinks.length; i++) {
                var pageLink = pageLinks[i];
                pageLink.onclick = function(event) {
                    event.preventDefault();
                    link = this.href;
                    $.ajax({
                        url: link,
                        type: "GET",
                        dataType: 'html',
                    }).done(function(data) {
                        $('#list-data').html(data);
                        // document.querySelector('#list-data').innerHTML = data
                    });
                }
            }
        })
    }

</script>


