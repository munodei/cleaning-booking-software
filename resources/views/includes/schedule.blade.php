                                        <div class="row">
                                            @include('includes.cart')
                                            <div class="col-sm-8">
                                                <h5 class="info-text"> Recurrence of Our Services</h5>
                                            </div>

                                             <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label>How often do you need our cleaning services?</label>
                                                    
                                                    <select class="form-control" id="service_frequency" name="service_frequency" required>
                                                        <option value="">Choose...</option>
                                                        <option @if(old('service_frequency')==='once') selected @endif value="once">Only Once</option>
                                                        <option @if(old('service_frequency')==='once_a_week') selected @endif value="once_a_week">Once a Week</option> 
                                                        <option @if(old('service_frequency')==='multiple_times_a_week') selected @endif value="multiple_times_a_week">Multiple Times A Week</option>  
                                                     </select>
               
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label>First Cleaning Date</label>
                                                    
                                                        <input id="datepicker" name="datepicker" autocomplete="off" readonly="readonly" value="{{ old('datepicker') ?? '' }}" required />
               
                                                </div>
                                            </div>

                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label>When</label>
                                                                                                                                
                                                        <select class="form-control" id="time_of_day" name="time_of_day" required>
                                                            <option value="">Choose...</option>
                                                            <option @if(old('time_of_day')==='morning') selected @endif value="morning">Morning</option>
                                                            <option @if(old('time_of_day')==='noon') selected @endif value="noon">Noon</option> 
                                                         </select>
            
                                                </div>
                                            </div>


                                        </div>