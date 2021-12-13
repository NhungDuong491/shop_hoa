
<script type="text/javascript" src="<?php echo base_url();?>/assets/back/ckeditor/ckeditor.js"></script>
    <!--  page-wrapper -->
    <div id="page-wrapper">
        <div class="row">
           <!-- page header -->
           <div class="col-lg-12">
            <h1 class="page-header">Thay đổi sản phẩm</h1>
        </div>
        <!--end page header -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
              <?php echo $this->session->flashdata('flsh_msg'); ?>
               <h4 class="error">
                    <?php $msg = $this->session->userdata('error_image');
                        echo $msg;
                        $this->session->unset_userdata('error_image');
                     ?>                       
                </h4>
                <div class="panel-heading">
                  <h4 class="success"> <?php echo $this->session->flashdata('update_pro_msg'); ?></h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                           <h5 style='color:red'> <?php echo validation_errors();?></h5>
                             <?php echo form_open_multipart('update-product','');?>
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" value="<?php echo $all_product->pro_title?>" name="pro_title" required="">
                                    <input type="hidden" class="form-control" value="<?php echo $all_product->pro_id?>" name="pro_id">
                                </div>
                                 <div class="form-group">
                                    <label>Mô tat sản phẩm</label>
                                    <textarea  id="ck" class="form-control" rows="3" name="pro_desc">
                                        <?php echo $all_product->pro_desc?>
                                    </textarea>
                                    <script>CKEDITOR.replace('ck')</script>
                                </div>
                                 <div class="form-group">
                                    <label>Chọn danh mục</label>
                                    <select class="form-control" name="pro_cat">
                                        <option>Chọn</option>
                                        <?php
                                         foreach ($all_cat as $category) {  ?>
                                           <option 
                                                <?php if($all_product->pro_cat==$category->category_id){?>
                                                selected="selected";
                                                <?php }?>
                                              value="<?php echo $category->category_id;?>"><?php echo $category->category_name?>
                                               
                                           </option>
                                          
                                        <?php } ?>
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label>Chọn danh mục phụ</label>
                                    <select class="form-control" name="pro_sub_cat">
                                        <option>Chọn</option>
                                        <?php
                                         foreach ($all_sub_cat as $sub_category) {  ?>
                                           <option 
                                                 <?php if($all_product->pro_sub_cat==$sub_category->sub_cat_id){?>
                                                selected="selected";
                                                <?php }?>
                                              value="<?php echo $sub_category->sub_cat_id;?>"><?php echo $sub_category->sub_category_name?>
                                               
                                           </option>
                                          
                                        <?php } ?>
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label>Chọn kiểu dáng</label>
                                    <select class="form-control" name="pro_brand">
                                        <option>Chọn</option>
                                        <?php $all_brand = $this->ProductModel->get_all_brand()?>
                                        <?php foreach ($all_brand as $brand) { ?>
                                        <option
                                            <?php if($all_product->pro_brand==$brand->brand_id){?>
                                                selected="selected";
                                                <?php }?>
                                             value="<?php echo $brand->brand_id;?>"><?php echo $brand->brand_name;?>
                                         </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label>Giá</label>
                                    <input type="number" class="form-control" value="<?php echo $all_product->pro_price?>" name="pro_price" required="">
                                </div>
                                 <div class="form-group">
                                    <label>Số lượng sản phẩm</label>
                                    <input type="number" class="form-control" value="<?php echo $all_product->pro_quantity?>" name="pro_quantity" required="">
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="form-control" name="pro_status">
                                        
                                    <?php if($all_product->pro_status==1){?>
                                        <option selected="" value="1">Đang bán</option>
                                          <option  value="2">Sản phẩm mẫu</option>
                                     <?php }elseif($all_product->pro_status==2){ ?>
                                         <option  value="1">Đang bán</option>
                                        <option selected="" value="2">Sản phẩm mẫu</option>
                                       <?php } ?> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Khả dụng</label>
                                    <select class="form-control" name="pro_availability">
                                        <option>chọn</option>
                                        <option value="1">Có sẵn</option>
                                        <option value="2">Đặt hàng</option>
                                        <option value="3">Sắp ra mắt</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Upload ảnh sản phẩm</label>
                                    <input type="file" name="pro_image">
                                    <input type="hidden" name="old_pro_image" value="<?php echo $all_product->pro_image?>">
                                    <img src="<?php echo base_url().$all_product->pro_image?>" width="80" height="50"/>

                                </div>
                                 <div class="form-group">
                                    <label>Sản phẩm nổi bật</label>
                                    <div class="checkbox">
                                        <label>
                                            <?php if($all_product->top_product==1){?>
                                            <input type="checkbox" name="top_product" value="1" checked="">Chọn sản phẩm nổi bật
                                            <?php } else{?>
                                                 <input type="checkbox" name="top_product" value="1">Chọn ản phẩm nổi bật
                                            <?php } ?>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Thay đổi</button>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form Elements -->
        </div>
    </div>
</div>
<!-- end page-wrapper -->

