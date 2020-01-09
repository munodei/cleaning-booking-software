                                        <div class="row">
                                            <h5 class="info-text"> Residence Information</h5>


                                            @guest

                                            @else

                                            @if(isset($locations[0]))

                                             <div class="col-sm-10 col-sm-offset-1">
                                                 <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Select Saved Location</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" onchange="assignLocationValues(this.value);" >
                                                        <option value=""> Select Location </option>
                                                            @foreach($locations as $location)
                                                                <option  value="{{ json_encode($location) }}">{{ $location->location_name }}</option>
                                                            @endforeach
                                                     </select>
                                                </div>
                                            </div>

                                            @else

                                            @endif

                                            @endguest

                                            <div class="col-sm-10 col-sm-offset-1">
                                                 <div class="form-group">
                                                    <label for="country">Select Country</label>
                                                    <select class="form-control" id="country" name="country" onchange="getState(this.value)" required="">
                                                        <option value=""> Select Country </option>

                                                            @foreach($countries as $country)
                                                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                                            @endforeach
                                                     </select>
                                                </div>
                                            </div>





                                            <div class="col-sm-10 col-sm-offset-1" id="state1" >
                   
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1" id="city1" >
                   
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1" id="neighbourhood1" >
                   
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1" id="suburb1" >
                   
                                            </div>

                                             <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group" id="address" style="display:none;" name="address">
                                                    <label for="physical_address">Physical Address</label>
                                                    <input type="text" class="form-control" name="physical_address" id="physical_address" onclick ="document.getElementById('postal_code1').style.display = '';" placeholder="Eg. 5th Avenue" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group" id="postal_code1" style="display:none;">
                                                    <label for="postal_code">Postal Code</label>
                                                    <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="5" required>
                                                </div>
                                            </div>

                                        </div>