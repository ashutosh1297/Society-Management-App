<div class="container-fluid wrapper-div">
    <table class="table table-hover">
        <thead>
            <tr>
            <?php
                foreach ($societiesHeaders as $row):  
                echo "<th scope='col'>".$row."</th>";
                endforeach; 
                echo "<th scope='col'>Actions</th>";
            ?>
            </tr>
        </thead>
        <tbody>
             <?php if($societies->count() !== 0):
                foreach ($societies as $row):  
                    echo "<tr>";
                    foreach ($societiesHeaders as $column):  
                    echo "<td>".$row->$column."</td>";
                    endforeach; 
                    echo "<td class='actions'>";
			        echo $this->Html->link(
                        'Edit',
                        ['controller' => 'Societies', 'action' => 'update', $row->id],
                    );
                    echo ' | ';
			        echo $this->Html->link(
                        'Delete',
                        ['controller' => 'Societies', 'action' => 'delete', $row->id],
                        ['confirm' => 'Are you sure you wish to delete this member?'],
                    );
		            echo "</td>";
                endforeach; 
                else:   
                    echo "<tr class='table-danger'><td text-align='center' colspan=".count($societiesHeaders).">No data found!<td></tr>";
                endif;?>
        </tbody>
    </table>
</div>

<div class="container wrapper-div">
    <h3> Add new society: </h3>
    <?php
    echo $this->Form->create("Users",array('url'=>'/Societies'));
    echo $this->Form->input('society_name');
    echo $this->Form->input('address');
    echo $this->Form->input('current_chairman_name');
    echo $this->Form->input('contact', array('type'=>'number'));
    echo $this->Form->button('Submit');
    echo $this->Form->end();
    ?> 
</div>