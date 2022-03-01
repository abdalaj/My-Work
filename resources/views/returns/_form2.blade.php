

<section class="content">

  <div class="box box-primary">
          <div class="box-body">
              <div class="row">
                  <div class="col-md-12">
                      <div class="col-md-6">
                          <div class="form-group">
                              <div class="container">
                                  <div class="row">
                                    <div class="col-sm">
                                      <nav class="navbar navbar-light bg-light">
                                          <form class="form-inline" method="get" action="{{url('/search')}}">
                                            @csrf
                                            <input class="form-control mr-sm-2" type="search" placeholder="Search"  name="search" aria-label="Search">


                                              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                            </form>

                                        </nav>
                                   </div>
                                  </div>
                                </div>
                                @php
                                $pay = \App\order::where('id','search')->get();
                                @endphp
                                <label>
                                  {{$pay}}
                                </label>
