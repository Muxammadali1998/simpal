<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Vertical Navs &amp; Tabs</h6>
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        @foreach ($cities as $key=>$city)
                            @if ($key == 0)
                            <button class="nav-link active" id="v-pills-home-tab{{$key}}" data-bs-toggle="pill" data-bs-target="#v-pills-home{{$key}}" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">{{$city->name}}</button>
                            
                            @else
                                
                            <button class="nav-link " id="v-pills-home-tab{{$key}}" data-bs-toggle="pill" data-bs-target="#v-pills-home{{$key}}" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">{{$city->name}}</button>
                            @endif
                        @endforeach
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        @foreach ($cities as $key=>$city)

                            @if ($key == 0)
                            <div class="tab-pane fade active show " id="v-pills-home{{$key}}" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                @foreach ($city->obyektlar as $obj)
                                <a href="/obyekt/{{$obj->id}}"class="btn btn-outline-primary m-2"><i class="fa fa-home me-2"></i>{{$obj->name}}</a> 
                                @endforeach
                            </div>
                            @else
                                <div class="tab-pane fade " id="v-pills-home{{$key}}" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    @foreach ($city->obyektlar as $obj)
                                    <a href="/obyekt/{{$obj->id}}"class="btn btn-outline-primary m-2"><i class="fa fa-home me-2"></i>{{$obj->name}}</a> 
                                    @endforeach
                                </div>
                            @endif
                        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>