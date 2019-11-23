<?php

add_shortcode("gbl_bookmarklet", "gbl_bookmarklet");
function gbl_bookmarklet() {
  ob_start();
?>
<div class="gbl-bookmarklet-form">
  <div class="gbl-section">
    <div class="gbl-row">
      <label class="gbl-label">Linkshare ID</label>
      <input type="text" id="linkshare_id" />
    </div>

    <div class="gbl-row">
      <label class="gbl-label">U1 Description(Optional)</label>
      <input type="text" id="u1_description" />
    </div>

    <div class="gbl-row">
      <select id="gbl_advertisers">
		  <option value="Bandier" data-id="40468" data-url="http://lagencefashion.com/">Bandier</option>
        <option value="L'AGENCE" data-id="42841" data-url="http://lagencefashion.com/">L'AGENCE</option>
        <option value="NORDSTROM.com" data-id="1237" data-url="https://shop.nordstrom.com/">NORDSTROM.com</option>
        <option value="Ramy Brook" data-id="43707" data-url="https://www.ramybrook.com">Ramy Brook</option>
        <option value="Rebecca Taylor" data-id="37545" data-url="https://www.rebeccataylor.com/">Rebecca Taylor</option>
        <option value="Schutz Shoes" data-id="43056" data-url="https://schutz-shoes.com/">Schutz Shoes</option>
        <option value="Shopbop" data-id="42352" data-url="https://www.shopbop.com" >Shopbop</option>
        <option value="SSENSE" data-id="38292" data-url="http://www.ssense.com/" selected>SSENSE</option>
        <option value="Vince" data-id="39798" data-url="http://www.vince.com">Vince LLC</option>
      </select>
    </div>

    <div class="gbl-row">
      <input type="button" id="build_bookmarklet" value="Build Bookmarklet" />
    </div>

    <div class="gbl-row">
      <div id="gbl_result_bookmarklet" class="gbl-result"></div>
    </div>
  </div>

  <div class="gbl-section">
    <div class="gbl-row">
      <label class="gbl-label">Optional, add shopping page link for affiliate URL</label>
      <input type="text" id="murl" />
    </div>

    <div class="gbl-row">
      <input type="button" id="build_url" value="Build URL" />
    </div>

    <div class="gbl-row">
      <div id="gbl_result_url" class="gbl-result"></div>
    </div>
  </div>

</div>

<script src="<?= get_stylesheet_directory_uri(); ?>/lib/bm-assets/bm-loader.js?<?= time(); ?>"></script>

<?php
  return ob_get_clean();
}

add_shortcode("b2_gbl_bookmarklet", "b2_gbl_bookmarklet");
function b2_gbl_bookmarklet() {
  ob_start();
?>
<div class="gbl-bookmarklet-form">
  <div class="gbl-section">
    <div class="gbl-row">
      <label class="gbl-label">Skimlinks ID<span class="required">*</span></label>
      <input type="text" id="skimlinks_id" />
    </div>

    <div class="gbl-row">
      <label class="gbl-label">XCUST(Optional)</label>
      <input type="text" id="xcust" />
    </div>

    <div class="gbl-row" style="display: none;">
      <label class="gbl-label">SREF(Optional)</label>
      <input type="text" id="sref" />
    </div>

    <div class="gbl-row">
      <input type="button" id="build_skim_bookmarklet" value="Build Bookmarklet" />
      <input type="button" id="build_skim_url" value="Build URL" style="display: none;" />
    </div>
  </div>

  <div class="gbl-section">
    <div class="gbl-row">
      <div id="gbl_result_message"></div>
      <div id="gbl_result_bookmarklet" class="gbl-result"></div>
      <div id="gbl_result_url" class="gbl-result"></div>
    </div>
  </div>

</div>

<script src="<?= get_stylesheet_directory_uri(); ?>/lib/bm-assets/bm-loader.js?<?= time(); ?>"></script>

<?php
  return ob_get_clean();
}


add_shortcode("bookmarklet_tracking_table", "bookmarklet_tracking_table");

function bookmarklet_tracking_table() {
  ob_start();
  global $wpdb;
  
  $rows = $wpdb->get_results("SELECT * FROM gbl_bml_trackings ORDER BY id DESC");
  $i = 1;
?>
  <link rel="stylesheet" href="<?= get_stylesheet_directory_uri(); ?>/lib/bm-assets/jquery.dataTables.min.css" type="text/css" media="all">
  <script src="<?= get_stylesheet_directory_uri(); ?>/lib/bm-assets/jquery.dataTables.min.js"></script>
  
  <table id="tracking_table" class="gbl_dataTables" style="width: 100%;">
    <thead>
      <tr>
        <th>#</th>
        <th>ID</th>
        <th>User Name</th>
        <th>Target URL</th>
        <th>Full URL</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rows as $row) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td><?= $row->link_id; ?></td>
        <td><?= $row->user_name; ?></td>
        <td><?= $row->target_link; ?></td>
        <td><?= $row->full_link; ?></td>
        <td><?= $row->created_at; ?></td>
      </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
  <script>
    jQuery(document).ready(function($) {
      $('#tracking_table').DataTable();
    })
  </script>
<?php
  return ob_get_clean();
}


?>