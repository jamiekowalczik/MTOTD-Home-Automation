    <div class="container top">

      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            List Sensor Objects
          </a> 
          <span class="divider">/</span>
        </li>
      </ul>

      <div class="page-header users-header">
        <h2>
          Sensor Objects
          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>
        </h2>
      </div>
      
      <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
			$attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
           
            $options_sensor = array(0 => "all");
            foreach ($sensors as $row)
            {
              $options_sensor[$row['id']] = $row['name'];
            }
            //save the columns names in a array that we will use as filter         
            $options_sensorobjects = array();    
            foreach ($sensorobjects as $array) {
              foreach ($array as $key => $value) {
                $options_sensorobjects[$key] = $key;
              }
              break;
            }

            echo form_open('admin/sensorobjects', $attributes);
     
              echo form_label('Search:', 'search_string');
              echo form_input('search_string', $search_string_selected, 'style="width: 170px;
height: 26px;"');

              echo form_label('Filter by sensor:', 'sensor_id');
              echo form_dropdown('sensor_id', $options_sensor, $sensor_selected, 'class="span2"');

              echo form_label('Order by:', 'order');
              echo form_dropdown('order', $options_sensor, $order, 'class="span2"');

              $data_submit = array('name' => 'mysubmit', 'class' => 'btn btn-primary', 'value' => 'Go');

              $options_order_type = array('Asc' => 'Asc', 'Desc' => 'Desc');
              echo form_dropdown('order_type', $options_order_type, $order_type_selected, 'class="span1"');

              echo form_submit($data_submit);

            echo form_close();
            ?>

          </div>

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="yellow header headerSortDown">Name</th>
                <th class="red header">Description</th>
                <th class="red header">Sensor</th>
                <th class="red header">Pin</th>
                <th class="red header">Misc</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($sensorobjects as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['name'].'</td>';
                echo '<td>'.$row['description'].'</td>';
                echo '<td>'.$row['sensor_name'].'</td>';
                echo '<td>'.$row['sensor_pin'].'</td>';
                echo '<td>'.$row['misc'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/sensorobjects/update/'.$row['id'].'" class="btn btn-info">view & edit</a>  
                  <a href="'.site_url("admin").'/sensorobjects/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>
      </div>
    </div>