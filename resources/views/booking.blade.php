<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/') }}/front/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="{{ url('/') }}/front/img/favicon.png" />


    <title>{{ get_option('site_title') }}| Cleaning Booking</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/paper-bootstrap-wizard"/>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    @include('includes.metatags')

    <!-- CSS Files -->
    <link href="{{ url('/') }}/front/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ url('/') }}/front/css/paper-bootstrap-wizard.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ url('/') }}/front/css/demo.css" rel="stylesheet" />

    <!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        
        
    <link href="{{ url('/') }}/front/css/themify-icons.css" rel="stylesheet">
    <link href="{{ url('/') }}/css/home.css" rel="stylesheet">
    </head>

    <body>

    <div class="image-container set-full-height" style="background-image: url('{{ url('/') }}/front/img/paper-1.jpeg')">
        <!--   Creative Tim Branding   -->
        <a href="{{ url('/') }}">
             <div class="logo-container">
                <div class="logo">
                    <img src="{{ get_option('logo') }}"width="50px" height="50px">
                </div>
                <div class="brand">
                    {{ get_option('site_name') }}
                </div>
            </div>
        </a>

        <!--  Made With Paper Kit  -->
        <a href="#" class="made-with-pk">
            <div class="brand">PK</div>
            <div class="made-with">Made with <strong>Paper Kit</strong></div>
        </a>

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1">

                    <!--      Wizard container        -->
                    <div class="wizard-container">

                        <style >
                            
                            .nav-pills > li.active > a [class*="fa-"], .nav-pills > li.active > a:hover [class*="fa-"], .nav-pills > li.active > a:focus [class*="fa-"] {
                                color:  white;}
                        </style>

                        <div class="card wizard-card" data-color="orange" id="wizardProfile">
                        <form action="{{ route('make-booking')}}" method="post" name="bookingForm" id="bookingForm">

                        {!! csrf_field() !!}
                        <!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->

                                <div class="wizard-header text-center">
                                    <h3 class="wizard-title">Make your Booking</h3>
                                    <p class="category">This information is important to have a cleaning booking with us.</p>
                                </div>

                                <div class="wizard-navigation">
                                    <div class="progress-with-circle">
                                         <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#location" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-map"></i>
                                                </div>
                                                Location
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#booking" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i style="margin-top: 23px;"  class="fa fa-clock-o"></i>
                                                </div>
                                                Booking
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#schedule" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i  style="margin-top: 23px;"  class="fa fa-calendar"></i>
                                                </div>
                                                Schedule
                                            </a>
                                        </li>
                                         <li>
                                            <a href="#checkout" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i style="margin-top: 23px;"  class="fa fa-money"></i>
                                                </div>
                                                Checkout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">

                                

                                    <div class="tab-pane" id="location">
                                        @include('includes.location')
                                    </div>

                                    <div class="tab-pane" id="booking">

                                        @include('includes.booking')

                                    </div>

                                    <div class="tab-pane" id="schedule">

                                        @include('includes.schedule')

                                    </div>

                                    <div class="tab-pane" id="checkout">

                                        @include('includes.checkout')

                                    </div>

                              

                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-warning btn-wd' name='next' value='Next' />
                                        @if(Auth::check())
                                        <input type='button' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' onclick="event.preventDefault();$('#bookingForm').submit();" value='Finish' />
                                        @endif
                                    </div>

                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div><!-- end row -->
        </div> <!--  big container -->

        <div class="footer">
            <div class="container text-center">
                Made with <i class="fa fa-heart heart"></i> by <a href="{{ url('/')}}">{{ get_option('site_title') }} </a>
            </div>
        </div>
        <div class="fixed-plugin">
             <div class="dropdown">
            <a href="#" data-toggle="dropdown">
                    <i class="fa fa-user"> </i>
                </a>
                <ul class="dropdown-menu">
                    <li class="header-title">User Options</li>
                     @guest
                    <li>
                        <a href="{{ url('/login') }}">                      
                           Login
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}">                      
                           Register
                        </a>
                    </li>
                    @else
                    @endguest
                </ul>
            </div>
            <div class="dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="fa fa-cog fa-2x"> </i>
                </a>
                <ul class="dropdown-menu">
                    <li class="header-title">{{ get_option('site_name') }}</li>
                    <li>
                        <a href="{{ url('/') }}">                      
                           Home
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ url('/booking') }}">                      
                           Make Booking
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/booking') }}">                      
                           How it Works
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/booking') }}">                      
                           Get A Quote
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contact-us') }}">                      
                           Contact Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about-us') }}">                   
                           About Us
                        </a>
                   </li>

                </ul>
            </div>
        </div>
    </div>



</body>

    <!--   Core JS Files   -->
    <script src="{{ url('/') }}/front/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/front/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/front/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

    <!--  Plugin for the Wizard -->
    <script src="{{ url('/') }}/front/js/demo.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/front/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

    <!--  More information about jquery.validate here: https://jqueryvalidation.org/     -->
    <script src="{{ url('/') }}/front/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <script>
        const services        = {!! json_encode($services->toArray()) !!};
        let cart              = (JSON.parse(localStorage.getItem('cart')) || []);
        let extraServices     = getSpecificElements('[data-action="ExtraServices"]');
        let roomToCleaned     = getSpecificElements('[data-action="RoomeToBeCleaned"]');
        let chemicalsAndTools = getSpecificElements('[data-action="CleaningChemicalsAndTools"]');
        let deliveryService   = getSpecificElements('[data-action="DeliveryService"]');
        let cartTotalElements = getSpecificElements('[data-action="CartTotal"]');
        let cartItems         = getSpecificElements('[data-action="cartItems"]');
        console.log(cart);

        $(document).ready(function(){

            if(cart.length >0){
                cart.forEach(cartItem =>{

                    if(1000==cartItem.id){
                    AddCleaningToDom(cartItem);
                    }

                    if(1001==cartItem.id){
                        AddDeliveryToDom(cartItem);
                    }

                    if(1003==cartItem.id || 1005==cartItem.id){
                        insertRoomsToBeCleanedTODOM(cartItem);
                        1003==cartItem.id ?   $('#bedrooms').val(cartItem.unit):   $('#bathingrooms').val(cartItem.unit);
                    }

                    services.forEach((service) => { 
                            if(service.id==cartItem.id && 1003!=cartItem.id && 1005!=cartItem.id && 1001!=cartItem.id && 1000!=cartItem.id){
                                insertServiceToDom(cartItem);
                                $('#'+service.service_slug).addClass("active");
                            }
                        });

                });
                countCartTotal();
            }

        });

        @guest

        @else


        @endguest

        var select = 0;
        
        function getSuburb(id){

            postAjax("{{ url('/') }}/get-suburbs/"+id+"/"+select,"suburb1");
            $('#physical_address').val('');
            $('#postal_code').val('');


        }

        function getNeighbourhood(id){

            postAjax("{{ url('/') }}/get-neighbourhoods/"+id+"/"+select,"neighbourhood1");
             $('#suburb').val('');
             $('#physical_address').val('');
             $('#postal_code').val('');

        }

        function getCity(id){

             postAjax("{{ url('/') }}/get-cities/"+id+"/"+select,"city1");
             $('#neighbourhood').val('');
             $('#suburb').val('');
             $('#physical_address').val('');
             $('#postal_code').val('');
        }


        function getState(id){

             postAjax("{{ url('/') }}/get-states/"+id+"/"+select,"state1");         
             $('#city').val('');
             $('#neighbourhood').val('');
             $('#suburb').val('');
             $('#physical_address').val('');
             $('#postal_code').val('');


             
        }

        function assignLocationValues(location){

            location = JSON.parse(location);
            $('#country').val(parseInt(location.country));
            postAjax("{{ url('/') }}/get-states/"+parseInt(location.country)+"/"+parseInt(location.state),"state1");            
            postAjax("{{ url('/') }}/get-cities/"+location.state+"/"+location.city,"city1");         
            postAjax("{{ url('/') }}/get-neighbourhoods/"+location.city+"/"+location.neighbourhood,"neighbourhood1");           
            postAjax("{{ url('/') }}/get-suburbs/"+location.neighbourhood+"/"+location.suburb,"suburb1");          
            $('#address').show();
            $('#physical_address').val(location.address);  
            $('#postal_code1').css('display',''); 
            $('#postal_code').val(location.postal_code);
        


        }

        function postAjax(url,id){

            $('#address').hide();

            $.ajax({
                    url: url,
                    cache: false,
                    success: function(html){
                        $('#'+id).html(html);   
                    }           
            });

          

        }


        function showAddress(id){
            if(id!=""||id!=null||id!=undefined){
                $('#address').show();  
            }
        }

        function roomCal(id,tx,typ){

            let total_of_bt = id * 40;
            let total_of_bd = tx * 20;


            let isInCart = (cart.filter(service => (service.id ===parseInt(typ==='bd' ? 1003: 1005))).length >0);

            if(!isInCart){

            let newService ={
                                id:typ==='bd' ? 1003: 1005,
                                service_slug: typ==='bd' ? tx+' Bedrooms': id+' Bathrooms',
                                service:typ==='bd' ? tx+' Bedrooms': id+' Bathrooms',
                                service_description:typ==='bd' ? tx+' Bedrooms': id+' Bathrooms',
                                price:(typ==='bt' ? 40: 20) * (typ==='bt' ? id: tx),
                                unit: (typ==='bt' ? id: tx),
            }

            cart.push(newService);
            localStorage.setItem('cart',JSON.stringify(cart));
            insertRoomsToBeCleanedTODOM(newService);

            }else{

                cart.forEach(service => {

                    if(service.id ===parseInt(typ==='bd' ? 1003: 1005)){
                        service.service_slug = typ==='bd' ? tx+' Bedrooms': id+' Bathrooms';
                        service.service = typ==='bd' ? tx+' Bedrooms': id+' Bathrooms';    
                        service.price = (typ==='bt' ? 40: 20) * (typ==='bt' ? id: tx);
                        service.unit = (typ==='bt' ? id: tx);
                        $('#'+service.id).detach(); 
                        insertRoomsToBeCleanedTODOM(service); 
                    }

                    });
                        
            }

            

            countCartTotal();
        }   

        function insertRoomsToBeCleanedTODOM(service){
            for (i = 0; i < roomToCleaned.length; i++) {
                roomToCleaned[i].insertAdjacentHTML ('beforeend',`
                <small class="text-muted" style="display:block;" id="${service.id}">${service.service}:<span>{{ get_option('currency_symbol') }}${service.price}</span></small>
                
                `);
            }
        }        

        function serviceInformation(id){
            services.forEach((service) => { 
                if(service.id==id){
                    $('#service_price').val("$"+service.price);
                    addToCart(service.id);
                    let x                    = getSpecificElements('[data-action="Service"]');

                    for (i = 0; i < x.length; i++) {
                        x[i].value= service.service;
                        x[i].innerHTML= service.service;
                    }
                }
            });

            countCartTotal();

        }

        function getSpecificElements(identifier){
            return document.querySelectorAll(identifier);
        }

        function addToCart(id){

            let isInCart = (cart.filter(service => (service.id ===parseInt(id))).length >0);

            if(!isInCart){

                services.forEach((service) => { 
                if(service.id==id){
                    let newService ={
                                id:service.id,
                                service_slug: service.service.slug,
                                service:service.service,
                                service_description:service.service_description,
                                price:service.price,
                                unit:service.unit,
                    }
                    cart.push(newService);
                    localStorage.setItem('cart',JSON.stringify(cart));
                    insertServiceToDom(newService);

                }
                }); 
        }else{


             cart.forEach((service) => { 
                if(service.id===parseInt(id))
                    $('#'+service.id).detach();
                    
            });
            cart = cart.filter(cartItem => (cartItem.id !==parseInt(id)));
            localStorage.setItem('cart',JSON.stringify(cart));
           

        }

                
                countCartTotal();
           
        }

        function insertServiceToDom(service){

            for (i = 0; i < extraServices.length; i++) {
                extraServices[i].insertAdjacentHTML ('beforeend',`
                <small class="text-muted" style="display:block;" id="${service.id}">${service.service}:<span>{{ get_option('currency_symbol') }}${service.price} per ${service.unit}</span></small>
                
                `);
            }

        }

        function clearCartInformation(){

            services.forEach((service) => { 
            $('#'+service.service_slug).removeClass("active");
                if($(`#${service.id}`)!=null && $(`#${service.id}`)!=undefined){
                    $(`#${service.id}`).detach();
                  
                }
            });
            for(let i=1000;i<=1005;i++){

                if($(`#${i}`)!=null && $(`#${i}`)!=undefined){
                    $(`#${i}`).detach();
                  
                }

            }
        cart = [];
        $('#bathingrooms').val('0');
        $('#bedrooms').val('0');
        $('#chemicals_and_tools').val('Yes');
        localStorage.removeItem('cart');
        countCartTotal();


            }

        function AddCleaningChemicalsAndTools(state){

            let isInCart = (cart.filter(service => (service.id ===parseInt(1000))).length >0);

            if(!isInCart && state ==='No'){

            let newService ={
                                id:1000,
                                service_slug: 'add_cleaning_chemicals_and_tools',
                                service:'Cleaning Chemicals And Tools',
                                service_description:'Add Cleaning Chemicals And Tools',
                                price:200,
                    }
                    cart.push(newService);
                    localStorage.setItem('cart',JSON.stringify(cart));
                    AddCleaningToDom(newService);
                    countCartTotal();


            }else{

                cart = cart.filter(cartItem => (cartItem.id !==parseInt(1000)));
                localStorage.setItem('cart',JSON.stringify(cart));
                $(`#1000`).remove();
                countCartTotal();


            }

        }

        function AddCleaningToDom(service){

            for (i = 0; i < chemicalsAndTools.length; i++) {
                        chemicalsAndTools[i].insertAdjacentHTML ('beforeend',`
                        <small class="text-muted" style="display:block;" id="${service.id}">${service.service}:<span>{{ get_option('currency_symbol') }}${service.price}</span></small>
                     
                        `);
                        }

        }

        function AddDeliveryToDom(service){

        for (i = 0; i < deliveryService.length; i++) {
            deliveryService[i].insertAdjacentHTML ('beforeend',`
                    <small class="text-muted" style="display:block;" id="${newService.id}">${newService.service}:<span>{{ get_option('currency_symbol') }}${newService.price}</span></small>
                   
                    `);
                    }

        }

        function AddRoomCLeaningToDom (service){

            for (i = 0; i < roomToCleaned.length; i++) {
                roomToCleaned[i].insertAdjacentHTML ('beforeend',`
                    <small class="text-muted" style="display:block;" id="${newService.id}">${newService.service}:<span>{{ get_option('currency_symbol') }}${newService.price}</span></small>
                 
                    `);
                    }
        }

         function countCartTotal(){
             let cartTotal = 0.00;
             let period    = 0.00;
             cart.forEach(cartItem => cartTotal += cartItem.price);
             cart.forEach(cartItem => period    += cartItem.period);
             
             for (i = 0; i < cartTotalElements.length; i++) {
                 //console.log(countCartTotal);
                cartTotalElements[i].innerHTML='{{ get_option('currency_symbol') }}'+cartTotal;
                cartItems[i].innerHTML=cart.length;
                }

            $('#cart_total').val(cartTotal);
            $('#period').val(period);
             
         }


        function sameAddress(){

            $("#address2_checkout").hide();
            $("#country_checkout1").hide();
            $("#state_checkout1").hide();
            $("#address_checkout").val($('#physical_address').val());
            $("#zip_checkout").val($('#postal_code').val());

        }

        function newAddress(){

            $("#address2_checkout").show();
            $("#country_checkout1").show();
            $("#state_checkout1").show();
            $("#address_checkout").val('');
            $("#zip_checkout").val('');

        }






    </script>
           <script>
           
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap',
            minDate: new Date(),
        });
       </script> 
</html>