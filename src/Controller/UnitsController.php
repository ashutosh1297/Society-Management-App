<?php 
    namespace App\Controller;
    use App\Controller\AppController;
    use Cake\ORM\TableRegistry;
    use Cake\Datasource\ConnectionManager;

    class UnitsController extends AppController{
        // Actions
        
        public function index(){
            $units = TableRegistry::get('homes');
            $unitsHeaders = $units->schema()->columns();
            $unitQuery = $units->find('all');
            $this->set('units', $unitQuery);
            $this->set('unitsHeaders', $unitsHeaders);

            $societies = TableRegistry::get('society_list');
            $societiesQuery = $societies->find('list')->select('id');
            $this->set('societies', $societiesQuery);

            $types = TableRegistry::get('hometypes');
            $typesQuery = $types->find('list')->select('id');
            $this->set('types', $typesQuery);

            if($this->request->is('post')){
                $type = $this->request->data('type');
                $society_id = $this->request->data('society_id');
                $parking = $this->request->data('parking');
                $rented = $this->request->data('rented');
                $size = $this->request->data('size');
                $units_table = TableRegistry::get('homes');
                $unit = $units_table->newEntity();
                $unit->type = $type;
                $unit->society = (int)$society_id;
                $unit->parking = (int)$parking;
                $unit->rented = (int)$rented;
                $unit->size = (int)$size;
                if($units_table->save($unit))
                $this->redirect(array('action' => 'index'));
            }
        }  
        public function delete($id = null) {
            $units = TableRegistry::get('homes');
            
            $unit = $units->get($id); 
            // $this->request->onlyAllow('post', 'delete');
            if ($units->delete($unit)) {
                echo "Unit deleted successfully.";
                $this->setAction('index');
            } else {
                echo "Unable to process your request, try again.";
                $this->setAction('index');
            }
            return $this->redirect(array('action' => 'index'));
        }
        public function update($id = null) {

            if($this->request->is('post')){
                $type = $this->request->data('type');
                $society_id = $this->request->data('society_id');
                $parking = $this->request->data('parking');
                $rented = $this->request->data('rented');
                $size = $this->request->data('size');

                $units_table = TableRegistry::get('homes');
                
                $unit = $units_table->get($id);
                $unit->type = $type;
                $unit->society = (int)$society_id;
                $unit->parking = (int)$parking;
                $unit->rented = (int)$rented;
                $unit->size = (int)$size;
             
                // TODO: Add feedback on update
                if($units_table->save($unit))
                $this->redirect(array(
                    'controller'=>'Units',  
                    'action' => 'update/'.$id)
                     );
            } else {
                $units = TableRegistry::get('homes');

                $societies = TableRegistry::get('society_list');
                $societiesQuery = $societies->find('list')->select('id');
                $this->set('societies', $societiesQuery);

                $types = TableRegistry::get('hometypes');
                $typesQuery = $types->find('list')->select('id');
                $this->set('types', $typesQuery);
                
                $unit = $units->get($id);
                $this->set('id', $id);
                $this->set('unit', $unit);
            }
            
        } 
    }
?>