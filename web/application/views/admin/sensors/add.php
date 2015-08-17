    <div class="container top">
      
      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            List Sensors
          </a> 
          <span class="divider">/</span>
        </li>
        <li>
          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>">
           Add New Sensor
          </a> 
          <span class="divider">/</span>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Add New Sensor
        </h2>
      </div>
 
      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> new sensor created with success.';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Something went wrong..!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>
      
      <?php
      //form data
      $attributes = array('class' => 'form-horizontal', 'id' => '');
      $options_sensor = array('' => "Select");
      foreach ($sensortypes as $row)
      {
        $options_sensortype[$row['id']] = $row['name'];
      }

      //form validation
      echo validation_errors();
      
      echo form_open('admin/sensors/add', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">Name</label>
            <div class="controls">
              <input type="text" id="" name="name" value="<?php echo set_value('name'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Description</label>
            <div class="controls">
              <input type="text" id="" name="description" value="<?php echo set_value('description'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">IP Address</label>
            <div class="controls">
              <input type="text" id="" name="ipaddress" value="<?php echo set_value('ipaddress'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <?php
          echo '<div class="control-group">';
            echo '<label for="sensortype_id" class="control-label">Sensor Type</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');
              
              echo form_dropdown('sensortype_id', $options_sensortype, set_value('sensortype_id'), 'class="span2"');

            echo '</div>';
          echo '</div">';
          ?>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <button class="btn" type="reset">Cancel</button>
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>
     