<div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill" data-action="cartItems">3</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div data-action="RoomeToBeCleaned"> 
            <h6 class="my-0">Rooms Cleaning</h6>
           
          </div>
          
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div data-action="ExtraServices">
            <h6 class="my-0" >Extra Services</h6>
            
          </div>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div data-action="CleaningChemicalsAndTools">
            <h6 class="my-0">Cleaning Materials and Tools</h6>
            
          </div>
          
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total ({{ get_option('currency') }})</span>
          <strong data-action="CartTotal">$0</strong>
          <input type='button' class='btn btn-fill btn-warning btn-wd' name='clearCart' onclick="clearCartInformation()" value='Clear Cart' />
        </li>
      </ul>

    </div>
    <script>
    

    </script>