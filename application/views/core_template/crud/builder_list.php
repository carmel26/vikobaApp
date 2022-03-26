

<script src="{php_open_tag_echo} BASE_ASSET; {php_close_tag}/js/jquery.hotkeys.js"></script>
<script type="text/javascript">

//This page is a result of an autogenerated content made by running test.html with firefox.

function domo(){

 

   // Binding keys

   $('*').bind('keydown', 'Ctrl+a', function assets() {

       window.location.href = BASE_URL + '/administrator/<?= ucwords($table_name); ?>/add';

       return false;

   });



   $('*').bind('keydown', 'Ctrl+f', function assets() {

       $('#sbtn').trigger('click');

       return false;

   });



   $('*').bind('keydown', 'Ctrl+x', function assets() {

       $('#reset').trigger('click');

       return false;

   });



   $('*').bind('keydown', 'Ctrl+b', function assets() {



       $('#reset').trigger('click');

       return false;

   });

}



jQuery(document).ready(domo);

</script>

<!-- Content Header (Page header) -->

<section class="content-header">

   <h1>

      <?= ucwords($subject); ?><small> <i class="fa fa-chevron-right"></i> <i class="label bg-yellow">{php_open_tag_echo} $<?= $table_name; ?>_counts; {php_close_tag}  {php_open_tag_echo} cclang('items'); {php_close_tag}</i></small>

   </h1>

   <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active"><?= ucwords($subject); ?></li>

   </ol>

</section>

<!-- Main content -->

<section class="content">

   <div class="row" >

      

      <div class="col-md-12">

         <div class="box box-warning">

            <div class="box-body ">

               <!-- Widget: user widget style 1 -->

               <div class="box box-widget widget-user-2">

              


                  <form name="form_<?= $table_name; ?>" id="form_<?= $table_name; ?>" action="{php_open_tag_echo} base_url('administrator/<?= $table_name; ?>/index'); {php_close_tag}">
 

               <div class="row">
                     <div class="col-md-4"></div>
                     <div class="col-md-8">
                        <div class="col-sm-4 " > 
                        </div>
                       
                        <div class="col-sm-5  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="{php_open_tag_echo} cclang('filter'); {php_close_tag}" value="{php_open_tag_echo} $this->input->get('q'); {php_close_tag}">
                        </div>
                        <input type="hidden" name="f" id="field" value="">
                       
                        <div class="col-sm-1 ">
                            <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="{php_open_tag_echo} cclang('filter_search'); {php_close_tag}">
                                 Filter
                              </button>
                        </div>
                        <div class="col-sm-1 ">
                           <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="{php_open_tag_echo} base_url('administrator/<?= $table_name; ?>');{php_close_tag}" title="{php_open_tag_echo} cclang('reset_filter'); {php_close_tag}">
                             <i class="fa fa-undo"></i>
                           </a>
                        </div>
                        <div class="col-sm-1 "> 
                             <?php if ($this->input->post('create')) { ?>{php_open_tag} is_allowed('<?= $table_name; ?>_add', function(){{php_close_tag}
                             <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="{php_open_tag_echo} cclang('add_new_button', ['<?= ucwords(clean_snake_case($table_name)); ?>']); {php_close_tag}  (Ctrl+a)" href="{php_open_tag_echo}  site_url('administrator/<?= $table_name; ?>/add'); {php_close_tag}"><i class="fa fa-plus-square-o" ></i></a>
                           {php_open_tag} }) {php_close_tag}
                           <?php } ?>
                        </div>
                     </div>
                  </div>





                  <div class="table-responsive"> 

                  <table class="table table-condensed dataTable dataTable">

                     <thead>

                        <tr class="">

                           <!-- <th>

                            <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">

                           </th> -->

                           <?php foreach ($this->crud_builder->getFieldShowInColumn(true) as $option): ?><th><?= ucwords(clean_snake_case($option['label'])); ?></th>

                           <?php endforeach; ?><th>Action</th>

                        </tr>

                     </thead>

       <tbody id="tbody_<?= $table_name; ?>">
                     {php_open_tag} foreach($<?= $table_name; ?>s as $<?= $table_name; ?>): {php_close_tag}
                        <tr>
                           <!-- <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="{php_open_tag_echo} $<?= $table_name; ?>->{primary_key}; ?>">
                           </td> -->
                           
                           <?php foreach ($this->crud_builder->getFieldShowInColumn() as $field): ?><?php 
                           if (!$this->crud_builder->getFieldFile($field) AND !$this->crud_builder->getFieldFileMultiple($field)){ 
                            ?><td>{php_open_tag_echo} _ent($<?= $table_name; ?>-><?= $field; ?>); {php_close_tag}</td><?php } elseif($this->crud_builder->getFieldFileMultiple($field)) { 
                            ?><td>
                              {php_open_tag} foreach (explode(',', $<?= $table_name; ?>-><?= $field; ?>) as $file): {php_close_tag}
                              {php_open_tag} if (!empty($file)): {php_close_tag}
                                {php_open_tag} if (is_image($file)): {php_close_tag}
                                <a class="fancybox" rel="group" href="{php_open_tag_echo} BASE_URL . 'uploads/<?= $table_name; ?>/' . $file; {php_close_tag}">
                                  <img src="{php_open_tag_echo} BASE_URL . 'uploads/<?= $table_name; ?>/' . $file; {php_close_tag}" class="image-responsive" alt="image <?= $table_name; ?>" title="<?= $field; ?> <?= $table_name; ?>" width="40px">
                                </a>
                                {php_open_tag} else: {php_close_tag}
                                  <a href="{php_open_tag_echo} BASE_URL . 'administrator/file/download/<?= $table_name; ?>/' . $file; {php_close_tag}">
                                   <img src="{php_open_tag_echo} get_icon_file($file); {php_close_tag}" class="image-responsive image-icon" alt="image <?= $table_name; ?>" title="<?= $field; ?> {php_open_tag_echo} $file; {php_close_tag}" width="40px"> 
                                 </a>
                                {php_open_tag} endif; {php_close_tag}
                              {php_open_tag} endif; {php_close_tag}
                              {php_open_tag} endforeach; {php_close_tag}
                           </td>
                           <?php } else { 
                            ?><td>
                              {php_open_tag} if (!empty($<?= $table_name; ?>-><?= $field; ?>)): {php_close_tag}
                                {php_open_tag} if (is_image($<?= $table_name; ?>-><?= $field; ?>)): {php_close_tag}
                                <a class="fancybox" rel="group" href="{php_open_tag_echo} BASE_URL . 'uploads/<?= $table_name; ?>/' . $<?= $table_name; ?>-><?= $field;?>; {php_close_tag}">
                                  <img src="{php_open_tag_echo} BASE_URL . 'uploads/<?= $table_name; ?>/' . $<?= $table_name; ?>-><?= $field;?>; {php_close_tag}" class="image-responsive" alt="image <?= $table_name; ?>" title="<?= $field; ?> <?= $table_name; ?>" width="40px">
                                </a>
                                {php_open_tag} else: {php_close_tag}
                                  <a href="{php_open_tag_echo} BASE_URL . 'administrator/file/download/<?= $table_name; ?>/' . $<?= $table_name; ?>-><?= $field;?>; {php_close_tag}">
                                   <img src="{php_open_tag_echo} get_icon_file($<?= $table_name; ?>-><?= $field; ?>); {php_close_tag}" class="image-responsive image-icon" alt="image <?= $table_name; ?>" title="<?= $field; ?> {php_open_tag_echo} $<?= $table_name; ?>-><?= $field; ?>; {php_close_tag}" width="40px"> 
                                 </a>
                                {php_open_tag} endif; {php_close_tag}
                              {php_open_tag} endif; {php_close_tag}
                           </td>
                           <?php } ?> 
                           <?php endforeach; 
                           ?><td width="200">
                              <?php if ($this->input->post('read')) { ?>{php_open_tag} is_allowed('<?= $table_name; ?>_view', function() use ($<?= $table_name; ?>){{php_close_tag}
                              <a style="margin-right: 2px" href="{php_open_tag_echo} site_url('administrator/<?= $table_name; ?>/view/' . ${table_name}->{primary_key}); {php_close_tag}"  class="btn btn-warning btn-xs"><i class="fa fa-eye-slash"></i></a>
                              {php_open_tag} }) {php_close_tag}
                              <?php } ?><?php if ($this->input->post('update')) { ?>{php_open_tag} is_allowed('<?= $table_name; ?>_update', function() use ($<?= $table_name; ?>){{php_close_tag}
                              <a href="{php_open_tag_echo} site_url('administrator/<?= $table_name; ?>/edit/' . ${table_name}->{primary_key}); {php_close_tag}" class="btn btn-info btn-xs"><i class="fa fa-pencil " ></i> </a>
                              {php_open_tag} }) {php_close_tag}
                              <?php } ?>{php_open_tag} is_allowed('<?= $table_name; ?>_delete', function() use ($<?= $table_name; ?>){{php_close_tag}
                              <a href="javascript:void(0);" data-href="{php_open_tag_echo} site_url('administrator/<?= $table_name; ?>/delete/' . ${table_name}->{primary_key}); {php_close_tag}" class="btn btn-danger btn-xs  remove-data"><i class="fa fa-close"></i></a>
                               {php_open_tag} }) {php_close_tag}
                           </td>
                        </tr>
                      {php_open_tag} endforeach; {php_close_tag}
                      {php_open_tag} if ($<?= $table_name; ?>_counts == 0) :{php_close_tag}
                         <tr>
                           <td colspan="100">
                           <?= ucwords($subject); ?> data is not available
                           </td>
                         </tr>
                      {php_open_tag} endif; {php_close_tag}
                     </tbody>

                  </table>

                  </div>

               </div>

                               <?= form_close(); ?>
                               <div class="col-md-4 pull-right">
                                    <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                                       {php_open_tag_echo} $pagination; {php_close_tag}
                                    </div>
                               </div>


            </div>

            <!--/box body -->

         </div>

         <!--/box -->

      </div>

   </div>

</section>

<!-- /.content -->



<!-- Page script -->

<script>

  $(document).ready(function(){

    $('.remove-data').click(function(){
      var url = $(this).attr('data-href');

      swal({

          title: "{php_open_tag_echo} cclang('are_you_sure'); {php_close_tag}",

          text: "{php_open_tag_echo} cclang('data_to_be_deleted_can_not_be_restored'); {php_close_tag}",

          type: "warning",

          showCancelButton: true,

          confirmButtonColor: "#DD6B55",

          confirmButtonText: "{php_open_tag_echo} cclang('yes_delete_it'); {php_close_tag}",

          cancelButtonText: "{php_open_tag_echo} cclang('no_cancel_plx'); {php_close_tag}",

          closeOnConfirm: true,

          closeOnCancel: true

        },

        function(isConfirm){

          if (isConfirm) {

            document.location.href = url;            

          }

        });



      return false;

    });





    $('#apply').click(function(){



      var bulk = $('#bulk');

      var serialize_bulk = $('#form_<?= $table_name; ?>').serialize();



      if (bulk.val() == 'delete') {

         swal({

            title: "{php_open_tag_echo} cclang('are_you_sure'); {php_close_tag}",

            text: "{php_open_tag_echo} cclang('data_to_be_deleted_can_not_be_restored'); {php_close_tag}",

            type: "warning",

            showCancelButton: true,

            confirmButtonColor: "#DD6B55",

            confirmButtonText: "{php_open_tag_echo} cclang('yes_delete_it'); {php_close_tag}",

            cancelButtonText: "{php_open_tag_echo} cclang('no_cancel_plx'); {php_close_tag}",

            closeOnConfirm: true,

            closeOnCancel: true

          },

          function(isConfirm){

            if (isConfirm) {

               document.location.href = BASE_URL + '/administrator/<?= $table_name; ?>/delete?' + serialize_bulk;      

            }

          });



        return false;



      } else if(bulk.val() == '')  {

          swal({

            title: "Upss",

            text: "{php_open_tag_echo} cclang('please_choose_bulk_action_first'); {php_close_tag}",

            type: "warning",

            showCancelButton: false,

            confirmButtonColor: "#DD6B55",

            confirmButtonText: "Okay!",

            closeOnConfirm: true,

            closeOnCancel: true

          });



        return false;

      }



      return false;



    });/*end appliy click*/





    //check all

    var checkAll = $('#check_all');

    var checkboxes = $('input.check');



    checkAll.on('ifChecked ifUnchecked', function(event) {   

        if (event.type == 'ifChecked') {

            checkboxes.iCheck('check');

        } else {

            checkboxes.iCheck('uncheck');

        }

    });



    checkboxes.on('ifChanged', function(event){

        if(checkboxes.filter(':checked').length == checkboxes.length) {

            checkAll.prop('checked', 'checked');

        } else {

            checkAll.removeProp('checked');

        }

        checkAll.iCheck('update');

    });



  }); /*end doc ready*/

</script>