			

			<div class="css-treeview">
				<h4>Kategori</h4>
				<ul class="tree-list-pad">

				<?php
					$menu = 0;
                    $sql = "SELECT * FROM kategori_produk ORDER BY id_k_produk ASC";
                    foreach($db->selectALL($sql) as $data){
                ?>

					<li><input type="checkbox" id="item-<?php echo $menu; ?>" /><label for="item-<?php echo $menu; ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i><?php echo $data['nama_k_produk']; ?></label>
						<ul>

						<?php
		                    $sql = "SELECT * FROM kategori_sp_produk WHERE id_k_produk = '". $data['id_k_produk'] ."' ORDER BY id_sp_produk ASC";
		                    foreach($db->selectALL($sql) as $data_submenu){
		                    	//if ($data_submenu['id_k_produk'] == "K003") {
		                    		//$enkrip = "Essentials";
		                    	//}else{
		                    		$enkrip = md5($data_submenu['id_sp_produk']);
		                    	//}
		                ?>

		                	<li><a href="index.php?page=categories&id=<?php echo $enkrip; ?>"><i class="fa fa-long-arrow-right"></i><?php echo $data_submenu['nama_sp_produk']; ?></a></li>

						<?php } ?>

						</ul>

				<?php $menu = $menu + 1; ?>
				<?php } ?>

					<!-- <li><label><i class="fa fa-long-arrow-right" ></i>SOKA Essentials</label></li> -->

				</ul>
			</div>

			<div class="community-poll">
				<h4>Warna</h4>
					<div class="checklist colors">
					    
        				<?php
        					$sekat = 1;
                            $sql = "SELECT * FROM warna ORDER BY nama_warna ASC";
                            foreach($db->selectALL($sql) as $data_warna){
                                if ( ($sekat == 1) || ($sekat == 7) ){
                                    if ($sekat == 1){
                                        echo "<ul>";
                                    }else{
                                        echo "</ul><ul>";
                                    }
                                }
                        ?>
    					    <li><a href="index.php?page=categories&id2=<?php echo md5($data_warna['id_warna']); ?>"><span style="background:#<?php echo $data_warna['color_number']; ?>"></span><?php echo $data_warna['nama_warna']; ?></a></li>
    					<?php $sekat++; } echo "</ul>"; ?>
					    
					
					    <!--
						<ul>
							<li><a href=""><span></span>Beige</a></li>
							<li><a href=""><span style="background:#222"></span>Black</a></li>
							<li><a href=""><span style="background:#6e8cd5"></span>Blue</a></li>
							<li><a href=""><span style="background:#f56060"></span>Brown</a></li>
							<li><a href=""><span style="background:#44c28d"></span>Green</a></li>
						</ul>

						<ul>
							<li><a href=""><span style="background:#999"></span>Grey</a></li>
							<li><a href=""><span style="background:#f79858"></span>Orange</a></li>
							<li><a href=""><span style="background:#b27ef8"></span>Purple</a></li>
							<li><a href=""><span style="background:#f56060"></span>Red</a></li>
							<li><a href=""><span style="background:#fff;border: 1px solid #e8e9eb;width:13px;height:13px;"></span>White</a></li>
						</ul>        
						-->
    				</div>
			</div>
			