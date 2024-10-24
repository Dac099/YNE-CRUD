<?php
namespace Dac099\YneCrud\Lib;
use Bramus\Router\Router;
use Dac099\YneCrud\Controllers\ProductController;
use Dac099\YneCrud\Controllers\CategoryController;
use Dac099\YneCrud\Controllers\WarehouseController;
use Dac099\YneCrud\Controllers\UserController;

class Routes
{
    private Router $router;
    public function __construct()
    {
        $this->router = new Router();

        $this->productRoutes();
        $this->categoryRoutes();
        $this->warehouseRoutes();
        $this->userRoutes();
        $this->signupRoute();
        $this->loginRoute();
        $this->signoutRoute();

        $this->router->run();
    }

    private function productRoutes():void
    {
        $this->router->get('/', function(){
            $controller = new ProductController();
            $controller->listAllProducts();
        });

        $this->router->get('/products', function(){
            $controller = new ProductController();
            $controller->formProduct();
        });

        $this->router->get('/products/{id}', function($id){
            echo 'Mostrando un solo producto';
            //Agregar lógica para ver las actualizaciones que se han hecho sobre el producto
        });

        $this->router->post('/products', function(){
            //Lógica para agregar un producto
        });

        $this->router->delete('/products/{id}', function($id){
            //Lógica para eliminar un producto
        });

        $this->router->put('/products/{id}', function($id){
            //Lógica para actualizar un producto
        });
    }

    private function categoryRoutes():void
    {
        $this->router->get('/categories', function(){
            $controller = new CategoryController();
            $controller->listAllCategories();
        });

        $this->router->get("/categories-create", function(){
            $controller = new CategoryController();
            $controller->formCategory();
        });

        $this->router->get('/categories/{id}', function($id){
            echo 'Aquí se muestra una sola categoría';
            //Agregar lógica para mostrar historial de cambios
        });

        $this->router->post('/categories', function(){
            //Lógica para agregar categoría
        });

        $this->router->delete('/categories/{id}', function($id){
            //Lógica para eliminar una categoría
        });

        $this->router->put('/categories/{id}', function($id){
            //Lógica para actualizar una categoría
        });
    }

    private function warehouseRoutes():void
    {
        $this->router->get('/warehouse', function(){
            $controller = new WarehouseController();
            $controller->listAllWarehouse();
        });

        $this->router->get('/warehouse-create', function(){
            $controller = new WarehouseController();
            $controller->formWarehouse();
        });

        $this->router->get('/warehouse/{id}', function($id){
            echo 'Mostrando un almacén';
            //Lógica para mostrar el historial de cambios
        });

        $this->router->post('/warehouse', function(){
            //Lógica para agregar un nuevo almacén
        });

        $this->router->delete('/warehouse/{id}', function($id){
            //Lógica para eliminar un almacén
        });

        $this->router->put('/warehouse/{id}', function($id){
            //Lógica para actualizar un almacén
        });
    }

    private function userRoutes():void
    {
        //Routes only for admin users
        $this->router->get('/users', function(){
            $controller = new UserController();
            $controller->listAllUsers();
        });

        $this->router->put('/users/{id}', function($id){
            //Lógica para actualizar un usuario
        });

        $this->router->delete('/users/{id}', function($id){
            //Lógica para actualizar un usuario
        });
    }

    private function signupRoute():void
    {
        $this->router->get('/signup', function(){
            //Lógica para renderizar vista de registro
        });

        $this->router->post('/signup', function(){
            //Lógica para registrar a un usuario
        });
    }

    private function loginRoute():void
    {
        $this->router->get('/login', function(){
            echo 'Inicio de sesión';
            //Lógica para renderizar inicio de sesión
        });

        $this->router->post('/login', function(){
            //Lógica para iniciar sesión
        });
    }

    private function signoutRoute():void
    {
        $this->router->post('/signout', function(){
           //Lógica para salir de la aplicación
        });
    }
}