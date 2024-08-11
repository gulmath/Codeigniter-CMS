<div class="row">
<div class="col-md-12">
    <h4 class="m-b-lg">
	<?php echo "<b>$item->title</b> kaydını düzenliyorsunuz "; ?>
    </h4>
</div>
<div class="col-md-12">
<div class="widget">
				
					<hr class="widget-separator">
					<div class="widget-body">
					
						<form action="<?php echo base_url("product/save")?>" method="post">
							<div class="form-group">
								<label for="exampleInputEmail1">Ürün Adı</label>
								<input name="title" type="text" class="form-control" id="title" placeholder="title" value="<?php echo $item->title; ?>">
                               <?php if (isset($form_error)) { ?>
                                <small class="pull-right input-form-error"><?php echo form_error("title");?> </small>
                                <?php }?>

							</div>
							<div class="form-group">
                                <label for="exampleInputEmail1">Açıklama</label>
                                <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}">
								<?php echo $item->description;?>
								</textarea>
 							</div>
							
							<button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                            <a href="<?php echo base_url("product")?>" class="btn btn-danger btn-md btn-outline">İptal</a>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
</div>

</div>