            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="#009cff"  xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><path d="M482,224.603v24.688h-33.73v-71.405l-101.207,0.065v-34.722H271v-27h75.667v-30H167.5v30H241v27h-72.604v34.731h-35.654 v42.379h-74.93v61.538H30v-61.336H0v164.438h30v-73.102h27.812v72.324h86.216l37.654,41.57H448.27v-70.522H482v24.688h30V224.603 H482z M87.812,250.339h44.93v103.862h-44.93V250.339z M418.27,325.249v70.522H194.985l-32.243-35.597V207.96h35.654v-34.731h118.667 v34.741l101.207-0.065v71.386H482v45.959H418.27z"/></svg>
                            <div class="ms-3">
                                <p class="mb-2">{{$card1}}</p>
                                <h6 class="mb-0">{{ isset($objekt) ? $objekt->status == 1 ? "Ishlamoqda" : "O'chiq"  : count($cities). "ta" }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">{{$card2}}</p>
                                <h6 class="mb-0">{{ isset($objekt)? '00' : count($working). " ta"}} </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa bi-clock fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">{{$card3}}</p>
                                @if (isset($objekt))
                                    <h6 class="mb-0">{{$objekt->start}} || {{$objekt->finish}}</h6>
                                @else
                                    <h6 class="mb-0">{{0 . " ta"}}</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#009cff" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                              </svg>

                            <div class="ms-3">
                                <p class="mb-2">{{$card4}}</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->