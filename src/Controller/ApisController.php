<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\Controller\Component\RequestHandlerComponent;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class ApisController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

	public function beforeFilter(Event $event){
		$this->Auth->allow(['login','index','view']);
	}

    /**
     * Login
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function login(){
        if ($this->request->is('post')) {
            $requestData = $this->request->data;
            $data['Users'] = $requestData;
            $user = $this->Auth->identify();            
            if ($user) {
                $status = true;
                $message = 'success';
                $response['user_id'] = $user['id'];
                $response['name'] = $user['name'];
                $response['username'] = $user['username'];                
            }else{
                $status = false;
                $message = 'invalid username or password';
                $response = array();
            }  
        }else{
            $status = false;
            $message = 'please pass post request';
            $response = array();
        }
        $this->set([
                'status' => $status,
                'message' => $message,
                'data' => $response,
                '_serialize' => ['status','message','data']
            ]);          
    }

    public function logout(){
        return $this->redirect($this->Auth->logout());
    }

    public function addUser($id = null){
        $id = '2';
        $user = $this->Users->get($id);        
        $this->set([
            'user' => $user,
            '_serialize' => ['user']
        ]);
    }

}
