    <!-- Button Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4 " >
                    <h5 class="mb-4">Boshqaruv</h5>
                    <div class="d-flex">

                        <div style="width: 610px;" >
                            <h6>Viloyati:  {{ $objekt->city->region->name }}</h6>
                            <hr>
                            <h6>Tuman:  {{ $objekt->city->name }}</h6>
                            <hr>
                            <h6>Obyekt nomi:  {{ $objekt->name }}</h6>
                            <hr>
                            <h6>Obyekt tel raqami:  {{ $objekt->phone }}</h6>
                        </div>
                        <div class="d-flex align-items-end w-100 justify-content-end">
                            <button onclick="editmodal3('{{ $objekt->id }}')" style="margin-right:5px" class="btn btn-success "><i class="bi bi-pen"></i></button>
                            @if ($objekt->status == 1 )
                            <a href="{{ route('obyekt.show', $objekt->id) }}"  class="btn btn-danger ">Stop</a>
                            @else
                            <a href="{{ route('obyekt.show', $objekt->id) }}"  class="btn btn-primary ">Start</a>
                            @endif
                        </div>
                    </div>
                    
                </div>
             
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Ishlash vaqti</h6>
                    <form action="{{ route('obyekt.update',$objekt->id) }}" method="POST">
                        @method("PUT")
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="10:00"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" name="start" >
                            <span class="input-group-text" id="basic-addon2">dan</span>
                        </div>
    
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="13:00"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" name="finish" >
                            <span class="input-group-text" id="basic-addon2">gacha</span>
                        </div>
                        <div class="m-n2">
                            <button class="btn btn-primary m-2">Saqlash</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Button End -->