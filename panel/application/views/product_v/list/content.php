<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Ürünler Listesi
            <a href="<?php echo base_url('product/new_form'); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i>Yeni Ekle</a>
        </h4>
    </div>
<div class="col-md-12">
				<div class="widget p-lg">
					<!--<h4 class="m-b-lg">Striped rows</h4>
					<p class="m-b-lg docs">
						Use <code>.table-striped</code> to add zebra-striping to any table row within the <code>&lt;tbody&gt;</code>.
					</p>-->
                    <?php if (empty($items)) { ?>
                    <div class="alert alert-info  alert-dismissible text-center">
								
								<!--<h5 class="alert-title">Kayıt Bulunamadı</h5>-->
								<p>Burada herhangi bir veri bulunmamaktadır. Eklemek için Yeni Ekle butonuna tıklayın...</p>
							</div>
                            <?php } else { ?>
					<table class="table table-hover table-striped">
						<thead>
                            <th>#id</th>
                            <th>url</th>
                            <th>Ürün Adı</th>
                            <th>Açıklama</th>
                            <th>Durumu</th>
                            <th>İşlem</th>
                        </thead>   
                        <tbody>
                         <?php foreach ($items as $item) {?>   
                        <tr>    
                            <td><?php echo $item->id;?></td>
                            <td><?php echo $item->url;?></td>
                            <td><?php echo $item->title;?></td>
                            <td><?php echo $item->description;?></td>
                            <td>
								
                                <input id="switch-2-2" type="checkbox" 
                                data-switchery data-color="#10c469" 
                                <?php echo ($item->isActive) ? "checked": "";?>
                                 />
						</td>
                            <td>
                               
                                <a href="#" type="button" class="btn btn-sm btn-danger btn-outline"><i class="fa fa-trash"></i> Sil </>
                                <a href="#" type="button" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</>
                            </td>
                        </tr>
                        <?php }?>
                           
                        </tbody>
					</table> <?php }?>
				</div><!-- .widget -->
			</div><!-- END column -->
</div>