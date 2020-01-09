                                        <div class="row">

                                            @include('includes.cart')

                                            <div class="col-md-8 col-sm-8">
                                                <h5 class="info-text"> Select Number of Bathing Rooms?</h5>

                                                 <div class="form-group">                                               
                                                    <select class="form-control" id="bathingrooms" name="bathingrooms" onchange="roomCal(this.value,document.getElementById('bedrooms').value,'bt');" >
                                                        <option value="">0</option>
                                                            @for($i=1;$i<=15;$i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                     </select>
                                                </div>

                                            </div>

                                      
                                            <input type="hidden" name="cart_total" id="cart_total" value="">
                                            <input type="hidden" name="period" id="period" value="">    
                                            <div class="col-md-8 col-sm-8">
                                                       <h5 class="info-text"> Select Number of Bedrooms Rooms?</h5>
                                                                                  
                                                     <div class="form-group">
                                                       
                                                        <select class="form-control" id="bedrooms" name="bedrooms" onchange="roomCal(document.getElementById('bathingrooms').value,this.value,'bd');" >
                                                            <option value="">0</option>
                                                                @for($i=1;$i<=15;$i++)
                                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                                @endfor
                                                         </select>
                                                    </div>
                                            </div>

                                            <div class="col-md-8 col-sm-8">
                                                       <h5 class="info-text">Request extra services</h5>

                                                @foreach($services as $service)

                                                    @if($service->id != 1000 && $service->id != 1005 && $service->id != 1003)

                                                    <div class="col-md-4 col-sm-4" data-toggle="modal" data-target="#exampleModal" onclick="serviceInformation({{ $service->id }});">
                                                        <div class="choice" data-toggle="wizard-checkbox" id="{{ $service->service_slug }}">
                                                            <input type="radio" name="{{ $service->service_slug }}" value="{{ $service->id }}" checked>
                                                            <div class="card card-checkboxes card-hover-effect">
                                                                <i class="ti-star"></i>
                                                                <p>{{ $service->service }}</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @endif
                                                @endforeach

                                                </div>
                                            <div class="col-md-8 col-sm-8 col-md-offset-4">
                                                       <h5 class="info-text"> Do you have all necessary cleaning chemicals and tools? </h5>

                                                        <div class="form-group">
                                                       
                                                        <select class="form-control" id="chemicals_and_tools" name="chemicals_and_tools" onchange="AddCleaningChemicalsAndTools(this.value)" >
                                                            
                                                                
                                                                    <option value="No">No</option>
                                                                    <option value="Yes">Yes</option>
                                                                
                                                         </select>
                                                    </div>
                                           
                                               

                                            </div>

                                        </div>

        <script type="text/javascript">


            
        </script>