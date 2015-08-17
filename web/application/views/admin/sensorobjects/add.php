    <div class="container top">
      
      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            List Sensor Objects
          </a> 
          <span class="divider">/</span>
        </li>
        <li>
          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>">
            Add New Sensor Object
          </a> 
          <span class="divider">/</span>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Add New Sensor Object
        </h2>
      </div>
 
      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> new sensor object created with success.';
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
      $options_sensor = "";
      $attributes = array('class' => 'form-horizontal', 'id' => '');
      $options_sensorobject = array('' => "Select");
      foreach ($sensors as $row)
      {
        $options_sensor[$row['id']] = $row['name'];
      }

      //form validation
      echo validation_errors();
      
      echo form_open('admin/sensorobjects/add', $attributes);
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
            <label for="inputError" class="control-label">Sensor Pin</label>
            <div class="controls">
              <input type="text" id="" name="sensor_pin" value="<?php echo set_value('sensor_pin'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
           <div class="control-group">
            <label for="inputError" class="control-label">Misc</label>
            <div class="controls">
              <input type="text" id="" name="misc" value="<?php echo set_value('misc'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <?php
          echo '<div class="control-group">';
            echo '<label for="sensor_id" class="control-label">Sensor</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');
              
              echo form_dropdown('sensor_id', $options_sensor, set_value('sensor_id'), 'class="span2"');

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
     