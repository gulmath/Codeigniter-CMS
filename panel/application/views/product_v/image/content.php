<div class="row">
		<div class="col-md-12">
			<h4 class="m-b-lg">
			<strong><?php echo $item->title; ?>	</strong>	Ürününe Fotoğraf Ekle
			</h4>
		</div>

		<div class="col-md-12">
						<div class="widget p-lg">
							<div class="widget-body">
								<form action="<?php echo base_url("product/image_upload"); ?>" class="dropzone" data-plugin="dropzone" data-options="{ url: '<?php echo base_url("product/image_upload"); ?>'}">
									<div class="dz-message">
										<h3 class="m-h-lg">Yüklemek istediğiniz resimleri buraya sürükleyiniz.</h3>
										<p class="m-b-lg text-muted">(Yüklemek için dosyalarınızı sürükleyin yada buraya tıklayın..)</p>
									</div>
								</form>
							</div><!-- .widget-body -->
						</div><!-- .widget -->
		</div>
</div>
<div class="row">
		<div class="col-md-12">
			<h4 class="m-b-lg">
			<strong><?php echo $item->title; ?>	</strong> kaydına ait Resimler		</h4>
		</div>
		<div class="col-md-12">
						<div class="widget p-lg">
						
							
							<div class="widget-body">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<th>#id</th>
										<th>Görsel</th>
										<th>Resim Adı</th>
										<th>Durumu</th>
										<th>İşlem</th>
									</thead>
									<tbody>
										<tr>
											<td class="w100">#1</td>
											<td class="w100"><img width="30" src="<?php echo base_url("uploads");?>/product-3.jpg" alt="" class="img-responsive"></td>

											<td>deneme_urunu.jpg</td>
											<td class="w100"> <input 
										data-url="<?php echo base_url("product/isActiveSetter/");?>"
										class="isActive" id="switch-2-2" type="checkbox" 
										data-switchery data-color="#10c469" 
										<?php echo (true) ? "checked": "";?>
										/></td>
											<td class="w100"><button data-url="<?php echo base_url("product/delete_form/");?>" 
										type="button" class="btn btn-sm btn-danger btn-outline remove-btn btn-block">
										<i class="fa fa-trash"></i> Sil 
									</button></td>
										</tr>
									</tbody>
								</table>

							</div><!-- .widget-body -->
						</div><!-- .widget -->
		</div>
</div>