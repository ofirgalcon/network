<?php $this->view('partials/head', array(
  "scripts" => array(
    "clients/client_list.js"
  )
)); ?>

<div class="container-fluid">
  <div class="row pt-4">
    <?php $widget->view($this, 'network_location'); ?>
    <?php $widget->view($this, 'wifi_networks'); ?>
    <?php $widget->view($this, 'wifi_state'); ?>
  </div> <!-- /row -->

  <div class="row pt-4">
    <?php $widget->view($this, 'network_vlan'); ?>
  </div> <!-- /row -->
</div>  <!-- /container -->

<script src="<?php echo conf('subdirectory'); ?>assets/js/munkireport.autoupdate.js"></script>

<?php $this->view('partials/foot'); ?>
