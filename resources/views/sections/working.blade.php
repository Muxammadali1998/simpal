            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Salse</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Viloyat</th>
                                    <th scope="col">Shahar</th>
                                    <th scope="col">Obyekt</th>
                                    <th scope="col">Start</th>
                                    <th scope="col">Finish</th>
                                    <th scope="col">Show</th>
                                    <th scope="col">O'chirish</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($working as $obj)
                                    <tr>
                                        <td>{{$obj->city->region->name}}</td>
                                        <td>{{$obj->city->name}}</td>
                                        <td>{{$obj->city->name}}</td>
                                        <td>{{$obj->start}}</td>
                                        <td>{{$obj->finish}}</td>
                                        <td><a class="btn btn-sm btn-info" href="">View</a></td>
                                        <td><a class="btn btn-sm btn-danger" href="">Stop</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->