@extends('welcome')
@section('content')
<div style="background-color: whitesmoke;padding:10px;height: 600px;">
    <p style="font-family: Display;font-size: x-large;">>Name of the Item [$140.00]</p>
    <hr class="soft"/>
    <div style="width: 41.66666666666667%;float: left;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;display: block;">
        <div class="view-product">
            <img src="../public/frontend/img/chao1c.jpg" alt="" />
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide " style="height:90px;width: 100%;background-color: antiquewhite">
            
              <!-- Wrapper for slides -->
                <div class="carousel-inner" style="display: flex;justify-content: center;align-items: center;top:30%;">
                    <div class="item" style="width: 100px;height:50px;">
                      <a href=""><img src="../public/frontend/img/chao1p1.jpg" alt="" style="width: 100px;height:50px;"></a>                      
                    </div>                     
                    <div class="item " style="width: 100px;height:50px;">
                        <a href=""> <img src="../public/frontend/img/chao1p2.jpg" alt="" style="width: 100px;height:50px;"></a>
                    </div>
                    <div class="item " style="width: 100px;height:50px;">

                        <a href=""><img src="../public/frontend/img/chao1p3.jpg" alt="" style="width: 100px;height:50px;"></a>
                    </div>

                    
                </div>

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev" >&lsaquo;</a>
              <a class="right item-control" href="#similar-product" data-slide="next">&rsaquo;</a>

        </div>

    </div>
    <form style="margin-left: 35%;">
        
      <div class="control-group">
        <label class="control-label"><span>$140.00</span></label>
        <div class="controls">
        <input type="number" class="span6" placeholder="Qty." style="width: 30%;">
        </div>
        <label class="control-label"><span>Materials</span></label>
        <div class="controls">
          <select class="span11" style="width: 30%;">
              <option>Material 1</option>
              <option>Material 2</option>
              <option>Material 3</option>
              <option>Material 4</option>
            </select>
        </div>
      </div>
      <button type="submit" class="shopBtn"><span class=" icon-shopping-cart"></span> Add to cart</button>
    </form>
</div>
<br><br>
<div style="display: block">
    <div>
        <ul id="productDetail" class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
            <li class=""><a href="#profile" data-toggle="tab">Related Products </a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Acceseries <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#cat1" data-toggle="tab">Category one</a></li>
                <li><a href="#cat2" data-toggle="tab">Category two</a></li>
              </ul>
            </li>
          </ul>
    </div>
    
  <div id="myTabContent" class="tab-content tabWrapper">
  <div class="tab-pane fade active in" id="home">
    <h4>Product Information</h4>
      <table class="table table-striped">
      <tbody>
      <tr class="techSpecRow"><td class="techSpecTD1">Color:</td><td class="techSpecTD2">Black</td></tr>
      <tr class="techSpecRow"><td class="techSpecTD1">Style:</td><td class="techSpecTD2">Apparel,Sports</td></tr>
      <tr class="techSpecRow"><td class="techSpecTD1">Season:</td><td class="techSpecTD2">spring/summer</td></tr>
      <tr class="techSpecRow"><td class="techSpecTD1">Usage:</td><td class="techSpecTD2">fitness</td></tr>
      <tr class="techSpecRow"><td class="techSpecTD1">Sport:</td><td class="techSpecTD2">122855031</td></tr>
      <tr class="techSpecRow"><td class="techSpecTD1">Brand:</td><td class="techSpecTD2">Shock Absorber</td></tr>
      </tbody>
      </table>
      <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
  </div>
  <div class="tab-pane fade" id="profile">
  <div class="row-fluid">	  
  <div class="span2">
      <img src="assets/img/d.jpg" alt="">
  </div>
  <div class="span6">
      <h5>Product Name </h5>
      <p>
      Nowadays the lingerie industry is one of the most successful business spheres.
      We always stay in touch with the latest fashion tendencies - 
      that is why our goods are so popular..
      </p>
  </div>
  <div class="span4 alignR">
  <form class="form-horizontal qtyFrm">
  <h3> $140.00</h3>
  <label class="checkbox">
      <input type="checkbox">  Adds product to compair
  </label><br>
  <div class="btn-group">
    <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
    <a href="product_details.html" class="shopBtn">VIEW</a>
   </div>
      </form>
  </div>
  </div>
          <div class="control-group">
          <label class="control-label"><span>Color</span></label>
          <div class="controls">
            <select class="span11">
                <option>Red</option>
                <option>Purple</option>
                <option>Pink</option>
                <option>Red</option>
              </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label"><span>Materials</span></label>
          <div class="controls">
            <select class="span11">
                <option>Material 1</option>
                <option>Material 2</option>
                <option>Material 3</option>
                <option>Material 4</option>
              </select>
          </div>
        </div>
        <h4>100 items in stock</h4>
        <p>Nowadays the lingerie industry is one of the most successful business spheres.
        Nowadays the lingerie industry is one of ...
        <p>
        <button type="submit" class="shopBtn"><span class=" icon-shopping-cart"></span> Add to cart</button>
      </form>
  </div>
  </div>
      <hr class="softn clr"/>
</div>

@endsection