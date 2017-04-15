# customer_portal

This small App was built in CakePHP 3.4 And displays a web portal for customers to view, edit, add trips as well as Passengers for Airline Travel, customers are able to delete information as required, also uses MySQL Database with Normalised tables For relational data.
for data between customers, trips and passengers to be logically related to each other with the CakePHP 3.x ORM (Object Relational Model) Conventions. 
In order to run this application on localhost i.e. xampp or wampp, not 'localhost/customer_portal/customer' it will be 'localhost/customer_portal/customers' instead, which plural. Please read https://book.cakephp.org/ for more on conventions.

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
The controller allways extends the App Controller and this handles requests from the view and talks to the model and in return the model talks to the database, below diplays the add of new passengers to the database,controller handles all the requests from the view which in turn comes from the end user 
```php
public function add()
    {
        $passenger = $this->Passengers->newEntity();   
        if ($this->request->is('post')) {
            $passenger = $this->Passengers->patchEntity($passenger, $this->request->getData());
            if ($this->Passengers->save($passenger)) {
                $this->Flash->success(__('The passenger has been saved.'));

                return $this->redirect(['action' => 'index']);
                    $this->set(compact('passenger')); 
   ```                 
from above the action which is method name in which it has to be the same name the as view in templates, which is part of the conventions and in this method the variable ```php"$passenger"``` is assigned to a newentity model object then the condition test if request is post for example when user submits form if it is then it will patch entity object second arguement ```phpgetData()``` which is all data from form, test if saved in database if so will give message ```php$this->Flash->success(__('The passenger has been saved.'));``` if satisfactory will redirect with this method call action to the index page ```phpreturn $this->redirect(['action' => 'index']);```
This statement in the above code ```php     $this->set(compact('passenger')); ``` is a way of setting the variable to be accessed from the controller in the view for example see below...
```php<td><?= h($passenger->title) ?></td>
                <td><?= h($passenger->name) ?></td>
                <td><?= h($passenger->surname) ?></td>
                <td><?= h($passenger->passportID) ?></td>
```
As you can see the the variable passenger is being accessed to display the passenger name, surname, passportID etc all the way going back to the model then data stored the database through the controller.



