# customer_portal

This small App was built in CakePHP 3.4 And displays a web portal for customers to view, edit, add trips as well as Passengers for Airline Travel, customers are able to delete information as required, also uses MySQL Database with Normalised tables For relational data.
for data between customers, trips and passengers to be logically related to each other with the CakePHP 3.x ORM (Object Relational Model) Conventions. 
In order to run this application on localhost i.e. xampp or wampp, not 'localhost/customer_portal/customer' it will be 'localhost/customer_portal/customers' instead, which plural. So please follow conventions

<h3>Features</h3>

In this application the basic validation was done in the tableClass for the model which is included from the Cake class API

```php 
<?php
use Cake\Validation\Validator;
```
class which enables you to use the method

```php 
 public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('surname', 'create')
            ->notEmpty('surname');

```
As described above the ORM(Object Relational Model) is also implemented in this class which enables programmers manipulate database tables using CakePHP conventions and objects for example below displays the relational methods i.e one to many, many to many, one to one which has the same concept as relating database tables
```php
public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('customers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->hasMany('Passengers', [
            'foreignKey' => 'customers_id',
            'dependent' => true,
    ]);}
```
The controller allways extends the App Controller and this handles requests from the view and talks to the model and return model talks to the database below diplays the add of new passenger to the database,controller handles all the requests from the view which in turn comes from the end user 
```php
public function add()
    {
        $passenger = $this->Passengers->newEntity();   
        if ($this->request->is('post')) {
            $passenger = $this->Passengers->patchEntity($passenger, $this->request->getData());
            if ($this->Passengers->save($passenger)) {
                $this->Flash->success(__('The passenger has been saved.'));

                return $this->redirect(['action' => 'index']);
```
from above the action which is method has to same as view in templates which is part of the conventions and in this method the variable ```php"$passenger"``` is assigned to a newentity model object then the condition test if request is post for example when user submits form if it is then it will patch entity object second arguement ```phpgetData()``` which is all data from form, test if saved in database if so will give message ```php$this->Flash->success(__('The passenger has been saved.'));``` if satisfactory will redirect with this method call action to the index page ```phpreturn $this->redirect(['action' => 'index']);```




