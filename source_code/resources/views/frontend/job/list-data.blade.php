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
                                <a href="{{route('detail', $val->id)}}"><img src="{{asset('storage/images/'.$val->company->logo)}}" alt="" style="max-width: 85px;"></a>
                            </div>
                            <div class="job-tittle">
                                <a href="{{route('detail', $val->id)}}"><h4>{{$val->job_title}}</h4></a>
                                <ul>
                                    <li>Skill:
                                        @foreach(explode(',',$val->skill_id) as $skill_id)
                                            {{ $skills->find($skill_id)->skill }}
                                            @if($loop->index == 1)
                                                @break
                                            @endif
                                        @endforeach
                                    </li>
                                    @if($val->company->city)
                                        <li><i class="fas fa-map-marker-alt"></i>{{ $val->company->city->city_name}}</li>
                                    @endif
                                    @if(session()->has('user'))
                                        <li>${{ number_format($val->min_salary) }} - ${{ number_format($val->max_salary) }}</li>
                                    @else
                                        <li><a href="{{ route('login') }}" style="color: #635c5c">Salary: đăng nhập để xem</a></li>
                                    @endif
                                </ul>
                                @if(strtotime($val->expiration) < time())
                                    <p class="text-warning">Tin tuyển dụng hết hạn</p>
                                    @endif
                            </div>
                        </div>
                        <div class="items-link f-right">
                            @if($val->job_type)
                                <a href="{{route('detail', $val->id)}}">Full Time</a>
                            @else
                                <a href="{{route('detail', $val->id)}}">Part Time</a>
                            @endif
                                @if(ceil((time() - strtotime($val->created_at))/3600) < 24)
                                    <span>{{ ceil((time() - strtotime($val->created_at))/3600)}} hour ago</span>
                                @else
                                    <span>{{ ceil((time() - strtotime($val->created_at))/86400)}} day ago</span>
                                @endif
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
                                                                                {{ $job_same->appends(request()->query()) }}
{{--                                            {{$job_same->links()}}--}}
{{--                                            {!! $job_same->links() !!}--}}
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




