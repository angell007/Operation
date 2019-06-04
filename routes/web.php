<?php

Route::redirect('/', 'login');

// admin articulos
// Route::get('admin/articulos', 'Admin\ArticuloController@index')->name('admin.articulos');
// Route::get('admin/articulos/datatables', 'Admin\ArticuloController@datatables')->name('admin.articulos.datatables');
Route::get('admin/articulos/create/{articulo?}', 'Admin\ArticuloController@createModal')->name('admin.articulos.create');
Route::post('admin/articulos/create/{articulo}', 'Admin\ArticuloController@create');
// Route::get('admin/articulos/update/{articulo}', 'Admin\ArticuloController@updateModal')->name('admin.articulos.update');
// Route::patch('admin/articulos/update/{articulo}', 'Admin\ArticuloController@update');
// Route::delete('admin/articulos/delete/{articulo}', 'Admin\ArticuloController@delete')->name('admin.articulos.delete');

// admin categorias
// Route::get('admin/categorias', 'Admin\CategoriaController@index')->name('admin.categorias');
// Route::get('admin/categorias/datatables', 'Admin\CategoriaController@datatables')->name('admin.categorias.datatables');
// Route::get('admin/categorias/create', 'Admin\CategoriaController@createModal')->name('admin.categorias.create');
// Route::post('admin/categorias/create', 'Admin\CategoriaController@create');
// Route::get('admin/categorias/update/{categoria}', 'Admin\CategoriaController@updateModal')->name('admin.categorias.update');
// Route::patch('admin/categorias/update/{categoria}', 'Admin\CategoriaController@update');
// Route::delete('admin/categorias/delete/{categoria}', 'Admin\CategoriaController@delete')->name('admin.categorias.delete');

// admin clientes
Route::get('admin/clientes', 'Admin\ClienteController@index')->name('admin.clientes');
Route::get('admin/clientes/datatables', 'Admin\ClienteController@datatables')->name('admin.clientes.datatables');
Route::get('admin/clientes/create', 'Admin\ClienteController@createModal')->name('admin.clientes.create');
Route::post('admin/clientes/create', 'Admin\ClienteController@create');
Route::get('admin/clientes/update/{cliente}', 'Admin\ClienteController@updateModal')->name('admin.clientes.update');
Route::patch('admin/clientes/update/{cliente}', 'Admin\ClienteController@update');
Route::delete('admin/clientes/delete/{cliente}', 'Admin\ClienteController@delete')->name('admin.clientes.delete');
Route::get('admin/clientes/servicios/{id?}', 'Admin\ClienteController@servicios')->name('admin.clientes.servicios');
Route::get('admin/clientes/servicios/serviciosCliente/{id?}', 'Admin\ClienteController@serviciosCliente')->name('admin.clientes.serviciosCliente');

// admin detalles
// Route::get('admin/detalles', 'Admin\DetalleController@index')->name('admin.detalles');
// Route::get('admin/detalles/datatables', 'Admin\DetalleController@datatables')->name('admin.detalles.datatables');
// Route::get('admin/detalles/create', 'Admin\DetalleController@createModal')->name('admin.detalles.create');
// Route::post('admin/detalles/create', 'Admin\DetalleController@create');
// Route::get('admin/detalles/update/{detalle}', 'Admin\DetalleController@updateModal')->name('admin.detalles.update');
// Route::patch('admin/detalles/update/{detalle}', 'Admin\DetalleController@update');
// Route::delete('admin/detalles/delete/{detalle}', 'Admin\DetalleController@delete')->name('admin.detalles.delete');

// admin estado_pedidos
Route::get('admin/estado_pedidos', 'Admin\EstadoPedidoController@index')->name('admin.estado_pedidos');
Route::get('admin/estado_pedidos/datatables', 'Admin\EstadoPedidoController@datatables')->name('admin.estado_pedidos.datatables');
Route::get('admin/estado_pedidos/create', 'Admin\EstadoPedidoController@createModal')->name('admin.estado_pedidos.create');
Route::post('admin/estado_pedidos/create', 'Admin\EstadoPedidoController@create');
Route::get('admin/estado_pedidos/update/{estado_pedido}', 'Admin\EstadoPedidoController@updateModal')->name('admin.estado_pedidos.update');
Route::patch('admin/estado_pedidos/update/{estado_pedido}', 'Admin\EstadoPedidoController@update');
Route::delete('admin/estado_pedidos/delete/{estado_pedido}', 'Admin\EstadoPedidoController@delete')->name('admin.estado_pedidos.delete');

// admin facturas
// Route::get('admin/facturas', 'Admin\FacturaController@index')->name('admin.facturas');
// Route::get('admin/facturas/datatables', 'Admin\FacturaController@datatables')->name('admin.facturas.datatables');
// Route::get('admin/facturas/create', 'Admin\FacturaController@createModal')->name('admin.facturas.create');
// Route::post('admin/facturas/create', 'Admin\FacturaController@create');
// Route::get('admin/facturas/update/{factura}', 'Admin\FacturaController@updateModal')->name('admin.facturas.update');
// Route::patch('admin/facturas/update/{factura}', 'Admin\FacturaController@update');
// Route::delete('admin/facturas/delete/{factura}', 'Admin\FacturaController@delete')->name('admin.facturas.delete');

// admin modo_servicios
Route::get('admin/modo_servicios', 'Admin\ModoServicioController@index')->name('admin.modo_servicios');
Route::get('admin/modo_servicios/datatables', 'Admin\ModoServicioController@datatables')->name('admin.modo_servicios.datatables');
Route::get('admin/modo_servicios/create', 'Admin\ModoServicioController@createModal')->name('admin.modo_servicios.create');
Route::post('admin/modo_servicios/create', 'Admin\ModoServicioController@create');
Route::get('admin/modo_servicios/update/{modo_servicio}', 'Admin\ModoServicioController@updateModal')->name('admin.modo_servicios.update');
Route::patch('admin/modo_servicios/update/{modo_servicio}', 'Admin\ModoServicioController@update');
Route::delete('admin/modo_servicios/delete/{modo_servicio}', 'Admin\ModoServicioController@delete')->name('admin.modo_servicios.delete');

// admin pedidos
Route::get('admin/pedidos', 'Admin\PedidoController@index')->name('admin.pedidos');
Route::get('admin/pedidos/datatables', 'Admin\PedidoController@datatables')->name('admin.pedidos.datatables');
Route::get('admin/pedidos/create', 'Admin\PedidoController@createModal')->name('admin.pedidos.create');
Route::post('admin/pedidos/create', 'Admin\PedidoController@create');
Route::get('admin/pedidos/update/{pedido}', 'Admin\PedidoController@updateModal')->name('admin.pedidos.update');
Route::patch('admin/pedidos/update/{pedido}', 'Admin\PedidoController@update');
Route::delete('admin/pedidos/delete/{pedido}', 'Admin\PedidoController@delete')->name('admin.pedidos.delete');

// admin productos
Route::get('admin/productos', 'Admin\ProductoController@index')->name('admin.productos');
Route::get('admin/productos/datatables', 'Admin\ProductoController@datatables')->name('admin.productos.datatables');
Route::get('admin/productos/create', 'Admin\ProductoController@createModal')->name('admin.productos.create');
Route::post('admin/productos/create', 'Admin\ProductoController@create');
Route::get('admin/productos/update/{producto}', 'Admin\ProductoController@updateModal')->name('admin.productos.update');
Route::patch('admin/productos/update/{producto}', 'Admin\ProductoController@update');
Route::delete('admin/productos/delete/{producto}', 'Admin\ProductoController@delete')->name('admin.productos.delete');

// admin proveedors
Route::get('admin/proveedors', 'Admin\ProveedorController@index')->name('admin.proveedors');
Route::get('admin/proveedors/datatables', 'Admin\ProveedorController@datatables')->name('admin.proveedors.datatables');
Route::get('admin/proveedors/create', 'Admin\ProveedorController@createModal')->name('admin.proveedors.create');
Route::post('admin/proveedors/create', 'Admin\ProveedorController@create');
Route::get('admin/proveedors/update/{proveedor}', 'Admin\ProveedorController@updateModal')->name('admin.proveedors.update');
Route::patch('admin/proveedors/update/{proveedor}', 'Admin\ProveedorController@update');
Route::delete('admin/proveedors/delete/{proveedor}', 'Admin\ProveedorController@delete')->name('admin.proveedors.delete');

// admin razons
Route::get('admin/razons', 'Admin\RazonController@index')->name('admin.razons');
Route::get('admin/razons/datatables', 'Admin\RazonController@datatables')->name('admin.razons.datatables');
Route::get('admin/razons/create', 'Admin\RazonController@createModal')->name('admin.razons.create');
Route::post('admin/razons/create', 'Admin\RazonController@create');
Route::get('admin/razons/update/{razon}', 'Admin\RazonController@updateModal')->name('admin.razons.update');
Route::patch('admin/razons/update/{razon}', 'Admin\RazonController@update');
Route::delete('admin/razons/delete/{razon}', 'Admin\RazonController@delete')->name('admin.razons.delete');

// admin servicios
Route::get('admin/servicios', 'Admin\ServicioController@index')->name('admin.servicios');
Route::get('admin/servicios/datatables', 'Admin\ServicioController@datatables')->name('admin.servicios.datatables');
Route::get('admin/servicios/create', 'Admin\ServicioController@createModal')->name('admin.servicios.create');
Route::post('admin/servicios/create', 'Admin\ServicioController@create');
// Route::get('admin/servicios/update/{servicio}', 'Admin\ServicioController@updateModal')->name('admin.servicios.update');
Route::patch('admin/servicios/update/{servicio}', 'Admin\ServicioController@update');
Route::delete('admin/servicios/delete/{servicio}', 'Admin\ServicioController@delete')->name('admin.servicios.delete');

Route::get('admin/servicios/update/{servicio}', 'Admin\ServicioController@servicio')->name('admin.servicios.update');
Route::get('admin/servicios/servicios/show/{id?}', 'Admin\ServicioController@serviciosCliente')->name('admin.servicios.serviciosCliente');


// admin tipos
Route::get('admin/tipos', 'Admin\TipoController@index')->name('admin.tipos');
Route::get('admin/tipos/datatables', 'Admin\TipoController@datatables')->name('admin.tipos.datatables');
Route::get('admin/tipos/create', 'Admin\TipoController@createModal')->name('admin.tipos.create');
Route::post('admin/tipos/create', 'Admin\TipoController@create');
Route::get('admin/tipos/update/{tipo}', 'Admin\TipoController@updateModal')->name('admin.tipos.update');
Route::patch('admin/tipos/update/{tipo}', 'Admin\TipoController@update');
Route::delete('admin/tipos/delete/{tipo}', 'Admin\TipoController@delete')->name('admin.tipos.delete');

// admin cargos
// Route::get('admin/cargos', 'Admin\CargoController@index')->name('admin.cargos');
// Route::get('admin/cargos/datatables', 'Admin\CargoController@datatables')->name('admin.cargos.datatables');
// Route::get('admin/cargos/create', 'Admin\CargoController@createModal')->name('admin.cargos.create');
// Route::post('admin/cargos/create', 'Admin\CargoController@create');
// Route::get('admin/cargos/update/{cargo}', 'Admin\CargoController@updateModal')->name('admin.cargos.update');
// Route::patch('admin/cargos/update/{cargo}', 'Admin\CargoController@update');
// Route::delete('admin/cargos/delete/{cargo}', 'Admin\CargoController@delete')->name('admin.cargos.delete');
// Route::get('/producto/search/{id?}','ProductoController@buscar')->name('nit');
Route::get('admin/productos/search/{id?}', 'Admin\ProductoController@buscar')->name('nit');


// admin users
Route::get('admin/users', 'Admin\UserController@index')->name('admin.users');
Route::get('admin/users/datatables', 'Admin\UserController@datatables')->name('admin.users.datatables');
Route::get('admin/users/create', 'Admin\UserController@createModal')->name('admin.users.create');
Route::post('admin/users/create', 'Admin\UserController@create');
Route::get('admin/users/update/{user}', 'Admin\UserController@updateModal')->name('admin.users.update');
Route::patch('admin/users/update/{user}', 'Admin\UserController@update');
Route::delete('admin/users/delete/{user}', 'Admin\UserController@delete')->name('admin.users.delete');


// // admin users
// Route::get('admin/users', 'Admin\UserController@index')->name('admin.users');
// Route::get('admin/users/datatables', 'Admin\UserController@datatables')->name('admin.users.datatables');
// Route::get('admin/users/create', 'Admin\UserController@createModal')->name('admin.users.create');
// Route::post('admin/users/create', 'Admin\UserController@create');
// Route::get('admin/users/update/{user}', 'Admin\UserController@updateModal')->name('admin.users.update');
// Route::patch('admin/users/update/{user}', 'Admin\UserController@update');
// Route::delete('admin/users/delete/{user}', 'Admin\UserController@delete')->name('admin.users.delete');

// admin
// Route::get('admin/notas', 'Admin\NotaController@index')->name('admin.notas');
// Route::get('admin/notas/datatables', 'Admin\NotaController@datatables')->name('admin.notas.datatables');
Route::get('admin/notas/create/{id?}', 'Admin\NotaController@createModal')->name('admin.notas.create');
Route::post('admin/notas/create/{id?}', 'Admin\NotaController@create');
// Route::get('admin/notas/update/{nota}', 'Admin\NotaController@updateModal')->name('admin.notas.update');
// Route::patch('admin/notas/update/{nota}', 'Admin\NotaController@update');
// Route::delete('admin/notas/delete/{nota}', 'Admin\NotaController@delete')->name('admin.notas.delete');

// Route::get('admin/partes/create/{id?}', 'Admin\NotaController@createModal')->name('admin.partes.create');
// Route::post('admin/partes/create/{id?}', 'Admin\NotaController@create');


// admin partes
// Route::get('admin/partes', 'Admin\ParteController@index')->name('admin.partes');
// Route::get('admin/partes/datatables', 'Admin\ParteController@datatables')->name('admin.partes.datatables');
Route::get('admin/partes/create/{id?}', 'Admin\ParteController@createModal')->name('admin.partes.create');
Route::post('admin/partes/create/{id?}', 'Admin\ParteController@create');
// Route::get('admin/partes/update/{parte}', 'Admin\ParteController@updateModal')->name('admin.partes.update');
// Route::patch('admin/partes/update/{parte}', 'Admin\ParteController@update');
// Route::delete('admin/partes/delete/{parte}', 'Admin\ParteController@delete')->name('admin.partes.delete');
