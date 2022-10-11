<script src="https://kit.fontawesome.com/3cff919dc3.js" crossorigin="anonymous"></script>
<div class='wrap'>
    <?php
        echo('<h1 class="h1 fw-bold">'.get_admin_page_title().'</h1>');
    ?>
    <br><hr>
    <!-- Button trigger modal -->
    <button type="button" id="newRate" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRate">
    Add
    </button>
    <button type="button" id="newWeight" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addWeight">
    Add weight
    </button>
    <br><hr>

    <div class='content-searchBar'>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id='i-searchCountryRates' placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-success" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>
    <hr>

    <div class='content-mainTable'>
        <table class='wp-list-table widefast fixed striped pages table'>
            <thead>
                <th scope="col" style='text-align: center; width: 70mm; background-color: #000; color: #fff;'>Country</th>
                <th scope="col" style='text-align: center; background-color: #000; color: #fff;'>Rates</th>
            </thead>
            <tbody class='the-list' id='rc'>
              
            </tbody>
        </table>

    </div>
</div>

<!-- Modal -->
<div class="modal fade modal-lg" id="addRate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="exampleModalLabel">Add rate</h5>
        <button type="button" class="btn-close r-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off">
        <label class="btn btn-outline-secondary" for="option1">New</label>

        <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
        <label class="btn btn-outline-secondary" for="option2">Modify</label>
        <hr>
        <div id='newRate-content' class='none'>
          <div class="input-group">
            <span class="input-group-text fw-bold" id="basic-addon1">Country:</i></span>
            <select class="form-select" aria-label="Default select example"  id='country2'>

            </select>
            <span class="input-group-text fw-bold" id="basic-addon1">Rate type:</span>
              <select class="form-select" aria-label="Default select example" id='weightTypeNew'>
                <option selected style='text-align: center;' value='0'>-- Select --</option>
                <option value="1">Air</option>
                <option value="2">Maritime</option>
              </select>
          </div> 
          <hr>  
          <div id='newWeightAir' class='none'>
            <div class="input-group">
              <span class="input-group-text fw-bold" id="basic-addon1">Weights:</span>
              <select class="form-select" aria-label="Default select example"  id='weightAirNewRate'>

              </select>
              <span class="input-group-text fw-bold" id="basic-addon1">Price:</span>
              <input type="number" class="form-control" id="i-airPrice" aria-label="Username" aria-describedby="basic-addon1">
            </div>  
          </div>   
          <div id='newWeightMaritime' class='none'>
            <div class="input-group">
              <span class="input-group-text fw-bold" id="basic-addon1">Weights:</span>
              <select class="form-select" aria-label="Default select example"  id='weightMaritimeNewRate'>

              </select>
              <span class="input-group-text fw-bold" id="basic-addon1">Price:</span>
              <input type="number" class="form-control" id="i-maritimePrice" aria-label="Username" aria-describedby="basic-addon1">
            </div>  
          </div>          
        </div>  
        <div id='modifyRate-content' class='none'>
          <div class="input-group">
            <span class="input-group-text fw-bold" id="basic-addon1">Country:</i></span>
            <select class="form-select" aria-label="Default select example"  id='countryEdit'>

            </select>
            <span class="input-group-text fw-bold" id="basic-addon1">Rate type:</span>
              <select class="form-select" aria-label="Default select example" id='weightTypeEdit'>
                <option selected style='text-align: center;' value='0'>-- Select --</option>
                <option value="1">Air</option>
                <option value="2">Maritime</option>
              </select>
          </div> 
          <hr>  
          <div id='editWeightAir' class='none'>
            <div class="input-group">
              <span class="input-group-text fw-bold" id="basic-addon1">Weights:</span>
              <select class="form-select" aria-label="Default select example"  id='weightAirEditRate'>

              </select>
              <span class="input-group-text fw-bold" id="basic-addon1">Price:</span>
              <input type="number" class="form-control" id="i-airPriceEdit" aria-label="Username" aria-describedby="basic-addon1">
            </div>  
          </div>   
          <div id='editWeightMaritime' class='none'>
            <div class="input-group">
              <span class="input-group-text fw-bold" id="basic-addon1">Weights:</span>
              <select class="form-select" aria-label="Default select example"  id='weightMaritimeEditRate'>

              </select>
              <span class="input-group-text fw-bold" id="basic-addon1">Price:</span>
              <input type="number" class="form-control" id="i-maritimePriceEdit" aria-label="Username" aria-describedby="basic-addon1">
            </div>  
          </div>          
        </div>    
      </div>  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary r-close" data-bs-dismiss="modal">Close</button>
        <button type="button" id='btnSavedNewRate' class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<button id='countEdit' value='0' style='display: none'></button>
<!-- Modal Edit -->
<div class="modal fade modal-lg" id="editCotizacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <button id='idEdit' style='display: none'></button>
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="exampleModalLabel">Edit quote</h5>
        <button type="button" class="btn-close btncE" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
            <span class="input-group-text fw-bold" id="basic-addon1">Sirs:</span>
            <input type="text" class="form-control" id="sresE" placeholder="Kalstein France" aria-label="Username" aria-describedby="basic-addon1">
            <span class="input-group-text fw-bold" id="basic-addon1">Attention:</span>
            <input type="text" class="form-control" id='atcE' placeholder="Yul Rosal" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <hr>       
        <div class="input-group">
          <span class="input-group-text fw-bold" id="basic-addon1">Shipping Method:</i></span>
            <select class="form-select" aria-label="Default select example" id='envioME'>
            <option selected style='text-align: center;' value='0'>-- Select --</option>
            <option value="Aerial">Aerial</option>
            <option value="Maritime">Maritime</option>
          </select>
          <span class="input-group-text fw-bold" id="basic-addon1">Destination:</i></span>
          <select class="form-select" aria-label="Default select example"  id='countryE'>

          </select>
          <span class="input-group-text fw-bold" id="basic-addon1">Zipcode City:</span>
            <input type="text" class="form-control" id="zipcodeE" aria-label="Username" aria-describedby="basic-addon1">
        </div> 
        <hr>       
        <div class="input-group">
          <span class="input-group-text fw-bold" id="basic-addon1">Incoterm:</i></span>
            <select class="form-select" aria-label="Default select example" id='incotermE'>
            <option selected style='text-align: center;' value='0'>-- Select --</option>
            <option value="EXW Kalstein Shanghai">EXW Kalstein Shanghai</option>
            <option value="EXW Kalstein Francia">EXW Kalstein Francia</option>
          </select>
          <span class="input-group-text fw-bold" id="basic-addon1">Coins:</i></span>
          <select class="form-select" aria-label="Default select example"  id='divisaE'>
            <option selected style='text-align: center;' value='0'>-- Select --</option>
            <option value="EUR">EUR</option>
            <option value="USD">USD</option>
          </select>
          <span class="input-group-text fw-bold" id="basic-addon1">Payment Method:</span>
          <select class="form-select" aria-label="Default select example"  id='pagoE'>
            <option selected style='text-align: center;' value='0'>-- Select --</option>
            <option value="Bank Transfer">Bank Transfer</option>
            <option value="Credit/Debit Card (Payment Gateway)">Credit/Debit Card (Payment Gateway)</option>
            <option value="Paypal">Paypal</option>
          </select>
        </div>  
        <hr>       
        <form method='post' class='form'>
          <div class="input-group">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input type="text" id='i-searchE' name='txt-model' class="form-control" placeholder="Search products..." aria-label="Username" aria-describedby="basic-addon1">
            <span class="input-group-text fw-bold" id="basic-addon1">Quantity.</span>
            <input type="number" id='i-cantE' name='txt-cant' class="form-control" aria-label="Username" aria-describedby="basic-addon1" min="0" step="0.00">
            <button class="btn btn-outline-success btn-addE" type="submit" name='btn-addE' id="button-addon2">Add product</button>
            </div>
        </form>
        <hr>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Item</th>
                <th scope="col">Model</th>
                <th scope="col">Quantity</th>
                <th scope="col">Unit value</th>
                <th scope="col">Total value</th>
              </tr>
            </thead>
            <tbody id='list-productE'>
             
            </tbody>
          </table>
          <hr>
          <div class="input-group mb-3">
            <span class="input-group-text fw-bold fs-70em" id="basic-addon1">Subtotal:</span>
            <input type="number" id="subtotalE" value="0000.00" class="form-control fs-80em" aria-label="Username" aria-describedby="basic-addon1" min="0" step="0.01" readonly style='font-weight: bold'>
            <span class="input-group-text fw-bold fs-70em" id="basic-addon1">Disc:</span>
            <input type="number" id="descE" value="0000.00" class="form-control fs-80em" aria-label="Username" aria-describedby="basic-addon1" min="0" step="0.01" readonly style='font-weight: bold'>
            <span class="input-group-text fw-bold fs-70em" id="basic-addon1">Subtotal:</span>
            <input type="number" id="subtotal2E" value="0000.00" class="form-control fs-80em" aria-label="Username" aria-describedby="basic-addon1" min="0" step="0.01" readonly style='font-weight: bold'>
            <span class="input-group-text fw-bold fs-70em" id="basic-addon1">Shipping:</span>
            <input type="number" id="envioE" class="form-control fs-80em" aria-label="Username" aria-describedby="basic-addon1" min="0" step="0.01" style='font-weight: bold'>
            <span class="input-group-text fw-bold fs-70em" id="basic-addon1">Total</span>
            <input type="number" id="totalE" value="0000.00" class="form-control fs-80em" aria-label="Username" aria-describedby="basic-addon1" min="0" step="0.01" readonly style='font-weight: bold'>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-cancelarE" data-bs-dismiss="modal">Close</button>
        <button type="button" id='btnSavedE' class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addWeight" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="exampleModalLabel">New weight</h5>
        <button type="button" class="btn-close" id='w-close' data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group">
          <span class="input-group-text fw-bold" id="basic-addon1">Weight type:</span>
          <select class="form-select" aria-label="Default select example" id='weightType'>
            <option selected style='text-align: center;' value='0'>-- Select --</option>
            <option value="1">Air</option>
            <option value="2">Maritime</option>
          </select>
        </div>
        <br>
        <div id='weightAir' class='none'>
          <div class="input-group mb-3">
            <input type="number" class="form-control" id="i-kg" placeholder="5kg, 10kg, 15kg, 20kg..." aria-label="Username" aria-describedby="basic-addon1">
            <span class="input-group-text fw-bold" id="basic-addon1">Kg</span>
          </div>
        </div>
        <div id='weightMaritime' class='none'>
          <div class="input-group mb-3">
            <input type="number" class="form-control" id="i-m3" placeholder="5m³, 10m³, 15m³, 20m³..." aria-label="Username" aria-describedby="basic-addon1">
            <span class="input-group-text fw-bold" id="basic-addon1">m³</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id='w-cancel' class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" id='saveWeight'>Save</button>
      </div>
    </div>
  </div>
</div>