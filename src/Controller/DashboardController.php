<?php 
    namespace App\Controller;
    use App\Controller\AppController;
    use Cake\ORM\TableRegistry;
    use Cake\Datasource\ConnectionManager;

    class DashboardController extends AppController{
        // Actions
        public function index(){
            $members = TableRegistry::get('members');
            $membersQuery = $members->find('all')->count();
            $this->set('members', $membersQuery);

            $societies = TableRegistry::get('society_list');
            $societiesQuery = $societies->find('all')->count();
            $this->set('societies', $societiesQuery);

            $complaints = TableRegistry::get('complaints');
            $complaintsCountQuery = $complaints->find('all')->count();
            $this->set('complaints', $complaintsCountQuery);
            $this->set('complaintsQuery', $complaints);

            $homes = TableRegistry::get('homes');
            $homesQuery = $homes->find('all')->count();
            $this->set('homes', $homesQuery);
        }
    }
?>