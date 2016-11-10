<!--jquery for dropzone-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css">
<!--Validate js-->
<script type="text/javascript" src="modules/products/view/js/products.js"></script>

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="contact_form wow fadeInLeft">
            <form class="center" id="form_products" name="form_products">
              <div class ="form-group">
                    <input type="hidden" name="alta_products" value="alta_products">
                </div>
                <br><br><br><br><br><br>
                <fieldset>
                    <!-- Form Name -->
                    <legend>New Product</legend>
                    <!-- Serial Number -->
                    <label for="serial_number" class="col-md-4 control-label">Serial_name</label>
                    <input id="serial_number" name="serial_number" type="text" placeholder="Input serial number" class="form-control input-md" value="">
                    <div id="e_serial_number"></div>
                    <br>
                    <!-- Select Basic -->
                    <label for="category" class="col-md-4 control-label">Country</label>
                    <select id="category"  class="form-control input-md">
                    </select>
                    <span id="e_category" class="styerror"></span>
                    <br>
                    <!-- Select Basic -->
                    <label for="trademark" class="col-md-4 control-label">Trademark</label>
                    <select id="trademark" class="form-control input-md">

                    </select>
                    <span id="e_trademark" class="styerror"></span>
                    <br>
                    <!-- Select Basic -->
                    <label for="model" class="col-md-4 control-label">Model</label>
                    <select id="model" class="form-control input-md">
                        <span id="e_model" class="styerror"></span>
                    </select>
                    <br>
                    <!-- Datepicker-->
                    <label class="col-md-4 control-label" for="date_entry">Date entry</label>

                    <input id="date_entry" type="text" name="date_entry" class="form-control input-md" value="">
                    <div id="e_date_entry"></div>
                    <br>
                    <!-- Text input-->
                    <label class="col-md-4 control-label" for="Fecha salida">Date exit</label>
                    <input id="date_exit" type="text" name="date_exit" class="form-control input-md" value="">
                    <div id="e_date_exit"></div>
                    <br>
                    <!-- Text input-->
                    <label class="col-md-4 control-label" for="purchase_price">Purchase price</label>
                    <input id="purchase_price" name="purchase_price" type="text" placeholder="Purchase price" class="form-control input-md" value="">
                    <div id="e_purchase_price"></div>
                    <br>
                    <!-- Text input-->
                    <label class="col-md-4 control-label" for="sale_price">Sale price</label>
                    <input id="sale_price" name="sale_price" type="text" placeholder="sale_price" class="form-control input-md" value="">
                    <div id="e_sale_price"></div>
                    <br>
                    <!-- Text input-->
                    <label class="col-md-4 control-label" for="provider">Provider</label>
                    <input id="provider" name="provider" type="text" placeholder="provider" class="form-control input-md" value="">
                    <div id="e_provider"></div>
                    <br>

                    <!-- Text input-->

                    <label class="col-md-4 control-label" for="weight">Weight</label>
                    <input id="weight" name="weight" type="text" placeholder="weight" class="form-control input-md" value="">
                    <div id="e_weight"></div>
                    <br>

                    <!-- Text input-->
                    <label class="col-md-4 control-label" for="height">Height</label>
                    <input id="height" name="height" type="text" placeholder="height" class="form-control input-md" value="">
                    <div id="e_height"></div>
                    <br>

                    <!-- Text input-->
                    <label class="col-md-4 control-label" for="width">Width</label>
                    <input id="width" name="width" type="text" placeholder="Width" class="form-control input-md" value="">
                    <div id="e_width"></div>
                    <br>

                    <!-- Textarea -->
                    <label class="col-md-4 control-label" for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Describe your product here..." rows="4" class="form-control" value=""></textarea>
                    <div id="e_description"></div>
                    <br>

                    <!-- Multiple Radios -->
                    <label class="col-md-4 control-label" for="status">Status</label>
                    <br>
                    <div class="radio">
                        <label for="Estado-0">
                            <input type="radio" class="status" name="status" id="status-1" value="New" >
                            New
                        </label>
                    </div>
                    <div class="radio">
                        <label for="Estado-1">
                            <input type="radio"class="status" name="status" id="status-2" value="Second hand" >
                            Second hand
                        </label>
                    </div>
                    <div class="radio">
                        <label for="Estado-2">
                            <input type="radio" class="status" name="status" id="status-3" value="Repaired" >
                            Repaired
                        </label>

                    </div>
                    <br>

                    <!-- Multiple Checkboxes -->
                    <label class="col-md-4 control-label" for="warranty">Warranty</label>
                    <br>
                    <div class="checkbox">
                        <label for="Garantia-0">
                          <input type="checkbox" class="warranty" name="warranty[]"  value="Any" />
                              Any
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="Garantia-1">
                            <input type="checkbox" class="warranty" name="warranty[]"  value="6 months">
                            6 months
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="Garantia-2">
                            <input type="checkbox" class="warranty" name="warranty[]"  value="1 year">
                            1 year
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="Garantia-3">
                            <input type="checkbox" class="warranty" name="warranty[]"  value="5 years">
                            5 years
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="Garantia-4">
                            <input type="checkbox" class="warranty" name="warranty[]"  value="8 years">
                            8 years
                        </label>
                    </div>
                    <div id="e_warranty"></div>
                    <br>
                    <br >
                    <br >
                    <br >
                    <br >
                    <p>
            <span id="e_avatar" class="styerror"></span>
                   </p>
                    <div class="form-group" id="progress">
                        <div id="bar"></div>
                        <div id="percent">0%</div>
                    </div>

                    <div class="msg"></div>
                    <br>
                    <div id="dropzone" class="dropzone"></div><br/>
                    <br>
                    <br>
                    <br>
                    <!-- Button (Double) -->
                    <div class="form-group">

                        <button type="button" id="submit_products" name="submit_products" value="submit" class="btn btn-info">Submit</button>
                        <button id="Cancelar" name="Cancelar" class="btn btn-warning">Cancel</button>

                    </div>
                </fieldset>
            </form>
        </div>
    </div>
