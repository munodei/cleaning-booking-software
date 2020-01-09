      function locationDetails(location_name,address,suburb,neighbourhood,city,state,country,postal_code){
        $('#location_name1').html(location_name);
        $('#address1').html(address);
        $('#suburb1').html(suburb);
        $('#neighbourhood1').html(neighbourhood);
        $('#city1').html(city);
        $('#state1').html(state);
        $('#country1').html(country);
        $('#postal_code1').html(postal_code);
      }
       function editLocationDetails(id,location_name,address,suburb,neighbourhood,city,state,country,postal_code){
        $('#location_name2').html(location_name+" Update Location Details");
        $('#id_location').val(id);
        $('#location_name').val(location_name);
        $('#address').val(address);
        $('#suburb').val(suburb);
        $('#neighbourhood').val(neighbourhood);
        $('#city').val(city);
        $('#state').val(state);
        $('#country').val(country);
        $('#postal_code').val(postal_code);
      }
      function deletelocationDetails(location_name,id){
        $('#location_name3').html(location_name);
        $('#location_id').value(id);

      }
      function addLocation(){
        $('#location_name2').html('Add Location Details');
        $('#id_location').val('');
        $('#location_name').val('');
        $('#address').val('');
        $('#suburb').val('');
        $('#neighbourhood').val('');
        $('#city').val('');
        $('#state').val('');
        $('#country').val('');
        $('#postal_code').val('');

      }

      @if(Route::currentRouteName() ==='home' || Route::currentRouteName() ==='user-appointments')
      function viewAppointment(id){


          let AppointmentCurrentServices     = getSpecificElements('[data-action="AppointmentCurrentServices"]');
          $('#AppointmentCurrentServices').empty();
          let services     = {!! json_encode($services) !!};
          let appointments = {!! json_encode($appointments) !!}
          let jobs         = {!! json_encode($jobs)     !!};
          let total        = 0;

          jobs.forEach((job)=>{

            if(job.appointment_id == id){

              services.forEach((service)=>{

              if(service.id===job.service_id){

               for (i = 0; i < AppointmentCurrentServices.length; i++) {
                AppointmentCurrentServices[i].insertAdjacentHTML ('beforeend',`
                 
                      <button type="button" class="btn btn-primary col-md-12 col-xl-12 col-lg-12" >
                        ${service.service}
                         <span class="badge badge-light">${job.quantity}</span><i class="badge badge-danger">{{ get_option('currency_symbol') }}${job.quantity*service.price}</i> </button><br>
                      
                  
                
                `);
                }

                total += job.quantity*service.price;



              }



          });
          }

          });

            AppointmentCurrentServices[0].insertAdjacentHTML ('beforeend',`
                 
                      <button type="button" class="btn btn-primary col-md-12 col-xl-12 col-lg-12" >
                        Total
                         <i class="badge badge-danger">{{ get_option('currency_symbol') }}${total}</i> </button><br>
                      
                  
                
                `);

      }

           function getSpecificElements(identifier){
            return document.querySelectorAll(identifier);
        }

        function rescheduleAppointment(id,time_frame,date,time_of_day){
              $('#hidden_appointment_id').val(id);
              $('#scheduleDate').html(date);
              $('#scheduledTime').html(time_frame);
              $('#scheduledPeriod').html(time_of_day);



        }
      @endif