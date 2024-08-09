@extends('user.layout')

@section('page_content')
    <section class="profile-moment">
        <!-- listing page start -->
        <div class="table-list">
            <div class="container">
                {{-- <div class="search-escort col-sm-4 p-3">
                <input type="text" id="search" class="form-control" placeholder="Search escort"
                    value="{{ request()->input('search') }}">
            </div> --}}

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                    <div class="tab-pane fade active show" id="menu-starters">
                        <div class="row gy-5" id="escort-list">
                            @if ($allescorts->isEmpty())
                                <div class="col-12">
                                    <p>No Data Available</p>
                                </div>
                            @else
                                @foreach ($allescorts as $escort)
                                    <div class="col-lg-3 menu-item">
                                        <a href="{{ route('escort.detail_by_id', $escort->id) }}" class="glightbox">
                                            @if ($escort->pictures)
                                                <img src="{{ asset('/public/images/escorts_img') . '/' . $escort->pictures[0] }}"
                                                    class="menu-img img-fluid"
                                                    alt="Picture">
                                            @else
                                                <img src="{{ asset('/public/images/escorts_img') . '/' . 'escort_profile.png' }}"
                                                    class="menu-img img-fluid" alt="Picture">
                                            @endif

                                            <h4>{{ $escort->nickname }}</h4>
                                        </a>
                                        <p class="ingredients"> Origin:
                                            {{ $escort->origin ? $escort->origin : 'Not Available' }}</p>
                                        <p class="ingredients"> Call:
                                            {{ $escort->phone_number ? $escort->phone_number : 'Not Available' }}</p>
                                         <a href="{{ route('escort.detail_by_id', $escort->id) }}" class="btn btn-primary btn-block">VIEW DETAILS</a>

                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                let query = $(this).val();
                $.ajax({
                    url: '{{ route('index') }}',
                    type: 'GET',
                    data: {
                        search: query
                    },
                    success: function(data) {
                        $('#escort-list').html(data);
                    }
                });
            });
        });
    </script>
@endsection
