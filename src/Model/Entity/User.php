<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\ORM\Table;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     * Note that '*' is set to true, which allows all unspecified fields to be
     * mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

     public function initialize(array $config)
    {   
        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->hasOne('Userdetails');
        
    }


    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
   public $validate = array(
        'username' => array(
            'nonEmpty' => array(
                'rule' => array('email', true),
                'message' => 'This email is required',
                'allowEmpty' => false
            ),
             'unique' => array(
                'rule'    => array('isUniqueEmail'),
                'message' => 'This email is already in use'
            )
        ),
         'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            ),
         ),
                
    );
    
        /**
     * Before isUniqueUsername
     * @param array $options
     * @return boolean
     */
    function isUniqueUsername($check) {
           
        $username = $this->find(
            'first',
            array(
                'fields' => array(
                    'User.id',
                    'User.username',
                    
                ),
                'conditions' => array(
                    'User.username' => $check['username']
                )
            )
        );       
        if(!empty($username)){
            if($this->data[$this->alias]['id'] == $username['User']['id']){
                return true; 
            }else{
                return false; 
            }
        }else{
            return true; 
        }
    }
   


    /**
     * Before isUniqueEmail
     * @param array $options
     * @return boolean
     */
    function isUniqueEmail($check) {

        $email = $this->find(
            'first',
            array(
                'fields' => array(
                    'User.id'
                ),
                'conditions' => array(
                    'User.email' => $check['email']
                )
            )
        );

        if(!empty($email)){
                if($this->data[$this->alias]['id'] == $email['User']['id']){
                return true; 
            }else{
                return false; 
            }
        }else{
            return true; 
        }
    }

     
}
