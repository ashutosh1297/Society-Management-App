<?php 
    namespace App\Controller;
    use App\Controller\AppController;
    use Cake\ORM\TableRegistry;
    use Cake\Datasource\ConnectionManager;

    class SocietiesController extends AppController{
        // Actions
        public function index(){
            $societies = TableRegistry::get('society_list');
            $scoietiesHeaders = $societies->schema()->columns();
            $societiesQuery = $societies->find('all');
            $this->set('societies', $societiesQuery);
            $this->set('societiesHeaders', $scoietiesHeaders);

            if($this->request->is('post')){
                $society_name = $this->request->data('society_name');
                $address = $this->request->data('address');
                $current_chairman_name = $this->request->data('current_chairman_name');
                $contact = $this->request->data('contact');
                $societies_table = TableRegistry::get('society_list');
                $society = $societies_table->newEntity();
                $society->name = $society_name;
                $society->address = $address;
                $society->chairman = $current_chairman_name;
                $society->phone = $contact;
                if($societies_table->save($society))
                $this->redirect(array('action' => 'index'));
            }
        }

        public function delete($id = null) {
            $societies = TableRegistry::get('society_list');

            $member = $societies->get($id); 
            if ($societies->delete($member)) {
                echo "Society data deleted successfully.";
                $this->setAction('index');
            } else {
                echo "Unable to process your request, try again.";
                $this->setAction('index');
            }
            return $this->redirect(array('action' => 'index'));
        }
        public function update($id = null) {
            if($this->request->is('post')){
                $society_name = $this->request->data('name');
                $address = $this->request->data('society_address');
                $current_chairman_name = $this->request->data('chairman_name');
                $contact = $this->request->data('society_contact');

                $societies_table = TableRegistry::get('society_list');
                
                $societiy = $societies_table->get($id);
                $societiy->name = $society_name;
                $societiy->address = $address;
                $societiy->chairman = $current_chairman_name;
                $societiy->phone = $contact;
             
                if($societies_table->save($societiy))
                {
                    echo "Society is udpated";
                }
                $this->redirect(array(
                    'controller'=>'Societies',  
                    'action' => 'update/'.$id)
                     );
            } else {
                $societies = TableRegistry::get('society_list');
                $society = $societies->get($id);
                $this->set('id', $id);
                $this->set('society', $society);
            }
        } 
    }
?>