<script src="https://kit.fontawesome.com/3cff919dc3.js" crossorigin="anonymous"></script>
<div class='wrap'>
    <?php
        echo('<h1 class="h1 fw-bold">'.get_admin_page_title().'</h1>');
    ?>
    <br><hr>
    <!-- Button trigger modal -->
    <button type="button" id="newCotizacion" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    New
    </button>
    <br><hr>

    <div class='content-searchBar'>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id='i-searchCotizacion' placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-success" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>
    <hr>

    <div class='content-mainTable'>
        <table class='wp-list-table widefast fixed striped pages table'>
            <thead>
                <th scope="col">Quote Number</th>
                <th scope="col">Domain</th>
                <th scope="col">Client</th>
                <th scope="col">Date</th>
                <th scope="col">Hour</th>
                <th scope="col" style='width: 60mm;'>Actions</th>
            </thead>
            <tbody class='the-list' id='cc'>
              
            </tbody>
        </table>
    </div>
</div>

<button id='count' value='0' style='display: none'></button>
<!-- Modal -->
<div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="exampleModalLabel">New quote</h5>
        <button type="button" class="btn-close btnc" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
            <span class="input-group-text fw-bold" id="basic-addon1">Sirs:</span>
            <input type="text" class="form-control" id="sres" placeholder="Kalstein France" aria-label="Username" aria-describedby="basic-addon1">
            <span class="input-group-text fw-bold" id="basic-addon1">Attention:</span>
            <input type="text" class="form-control" id='atc' placeholder="Yul Rosal" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <hr>       
        <div class="input-group">
          <span class="input-group-text fw-bold" id="basic-addon1">Shipping Method:</i></span>
            <select class="form-select" aria-label="Default select example" id='envioM'>
            <option selected style='text-align: center;' value='0'>-- Select --</option>
            <option value="Aerial">Aerial</option>
            <option value="Maritime">Maritime</option>
          </select>
          <span class="input-group-text fw-bold" id="basic-addon1">Destination:</i></span>
          <select class="form-select" aria-label="Default select example"  id='country'>

          </select>
          <span class="input-group-text fw-bold" id="basic-addon1">Zipcode City:</span>
            <input type="number" class="form-control" id="zipcode" aria-label="Username" aria-describedby="basic-addon1">
        </div>  
        <hr>       
        <div class="input-group">
          <span class="input-group-text fw-bold" id="basic-addon1">Incoterm:</i></span>
            <select class="form-select" aria-label="Default select example" id='incoterm'>
            <option selected style='text-align: center;' value='0'>-- Select --</option>
            <option value="EXW Kalstein Shanghai">EXW Kalstein Shanghai</option>
            <option value="EXW Kalstein Francia">EXW Kalstein Francia</option>
          </select>
          <span class="input-group-text fw-bold" id="basic-addon1">Coins:</i></span>
          <select class="form-select" aria-label="Default select example"  id='divisa'>
            <option selected style='text-align: center;' value='0'>-- Select --</option>
            <option value="EUR">EUR</option>
            <option value="USD">USD</option>
          </select>
          <span class="input-group-text fw-bold" id="basic-addon1">Payment Method:</span>
          <select class="form-select" aria-label="Default select example"  id='pago'>
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
            <input type="text" id='i-search' name='txt-model' class="form-control" placeholder="Search products..." aria-label="Username" aria-describedby="basic-addon1">
            <span class="input-group-text fw-bold" id="basic-addon1">Quantity</span>
            <input type="number" id='i-cant' name='txt-cant' class="form-control" aria-label="Username" aria-describedby="basic-addon1" min="0" step="0.00">
            <button class="btn btn-outline-success btn-add" type="submit" name='btn-add' id="button-addon2">Add product</button>
            </div>
        </form>
        <hr>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Item</th>
                <th scope="col">Model</th>
                <th scope="col">Qty</th>
                <th scope="col">Unit value</th>
                <th scope="col">Total value</th>
              </tr>
            </thead>
            <tbody id='list-product'>
             
            </tbody>
          </table>
          <hr>
          <div class="input-group mb-3">
            <span class="input-group-text fw-bold fs-70em" id="basic-addon1">Subtotal:</span>
            <input type="number" id="subtotal" value="0000.00" class="form-control fs-80em" aria-label="Username" aria-describedby="basic-addon1" min="0" step="0.01" readonly style='font-weight: bold'>
            <span class="input-group-text fw-bold fs-70em" id="basic-addon1">Disc:</span>
            <input type="number" id="desc" value="0000.00" class="form-control fs-80em" aria-label="Username" aria-describedby="basic-addon1" min="0" step="0.01" readonly style='font-weight: bold'>
            <span class="input-group-text fw-bold fs-70em" id="basic-addon1">Subtotal:</span>
            <input type="number" id="subtotal2" value="0000.00" class="form-control fs-80em" aria-label="Username" aria-describedby="basic-addon1" min="0" step="0.01" readonly style='font-weight: bold'>
            <span class="input-group-text fw-bold fs-70em" id="basic-addon1">Shipping:</span>
            <input type="number" id="envio" class="form-control fs-80em" aria-label="Username" aria-describedby="basic-addon1" min="0" step="0.01" style='font-weight: bold'>
            <span class="input-group-text fw-bold fs-70em" id="basic-addon1">Total</span>
            <input type="number" id="total" value="0000.00" class="form-control fs-80em" aria-label="Username" aria-describedby="basic-addon1" min="0" step="0.01" readonly style='font-weight: bold'>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id='btnSaved' class="btn btn-primary">Save</button>
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
<div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deleting quote</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete the quote <button class='idDelete' style='background: none; border: none; outline: none; font-weight: bold; cursor: text; margin: 0; padding: 0;'></button>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id='deleteOk'>Delete</button>
      </div>
    </div>
  </div>
</div>