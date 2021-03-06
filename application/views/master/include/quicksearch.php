<?php
$selectedcat = '';
$selectedtype = '';
$defaultselectedfileds = '';
?> 

<form action="products/product_list" method="post" id="quick_search_form">
    <input type="hidden" name="quick_search" id="quick_search" value="quick_search">

    <div class="adv_srch margintop10px">
        <div class="col-md-2 col-xs-8"><h4 class="paddingtopzero"> <?php echo lang('Quick Search') ?> </h4></div>
        <div class="col-md-8">
            <div class="box-list-select width100percent3">
                <div class="col-md-3 quick_main_test">
                    <select name="searchtype" id="searchtype" class="form-control selectpicker">
                        <option value="0">Vehicle Type</option>
                    	<option value="1">Product Type</option>
                    </select>
                </div>
                <div class="col-md-5 quick_main_test">
                
                   <div class="left" id="leftblock">
                        <span id="vehicle_type_span"> 
                        <select name="vehicle_category_id[]" id="vehicle_category_id" class="form-control selectpicker">
                            <?php foreach ($product_catagory as $catagory) { ?>
                                <option
                                    value="<?php echo $catagory['id']; ?>"><?php echo $catagory['category_name']; ?></option>
                                <?php
                                if ($selectedcat == '')
                                    $selectedcat = $catagory['id'];
                            }?>
                        </select>
           
                         </span>
                    </div>
                    
                    
                    <div class="right" id="rightblock">
                        <span id="product_type_span">

                        <?php 
						 echo '<select name="product_type_id[]" id="product_type_id" class="form-control selectpicker">';
						  foreach($product_types as $category)
						 {
							if(isset($id) && $id == '')
								echo '<option value="'.$category['id'].'">'.$category['product_type_name'].'-'.$category['category_name'].'</option>';
							else
								echo '<option value="'.$category['id'].'">'.$category['product_type_name'].'</option>';
						 } 
						 echo '</select>';
						?>
                        </span>
                    </div>
					
					 
                </div>
                
                <div class="col-md-3 quick_main_test">
                    <span id="product_maker_span">
                    <select name="maker_id[]" id="maker_id" class="form-control selectpicker" >
                       <?php foreach($product_makers as $make){
                            if($selectedtype==$make['product_type_id'] && $selectedcat==$make['vehicle_category_id'])
                            ?>
                                <option value="<?php echo $make['id'];?>"><?php echo $make['maker_name'];?></option>
                        <?php } ?>
                    </select>
                    </span>

                </div>
                <div class="col-md-3 displaynon">
                    <span id="product_model_span">
                        <?php if(!empty($product_models)) { ?> 
                            <select name="model_id[]" id="model_id" class="form-control selectpicker" >												
                            <?php foreach($product_models as $model){?>
                                <option value="<?php echo $model['id'];?>"><?php echo $model['model_name'];?></option>
                            <?php }?>
                         
                        </select>
                           <?php } ?>
                   </span>
                </div>
                <div class="clear"></div>

            </div>
        </div>
        <div class="col-md-1 fix-btn-search-ad">
            <button name="quicksearch" type="submit" class="btn btn-primary btn-search-ad"
                    id="quicker_search"><?php echo lang('search') ?></button>
        </div>
    </div>
</form>
