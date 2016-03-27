<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('/login',
    [
        'middleware'=>
            [
                //'apiValidate:authenticationRequest'
            ],
        'uses'=>'Auth\AuthController@login'
    ]
);

Route::post('/register',
    [
        'middleware'=>
            [
                'apiValidate:registrationRequest'
            ],
        'uses'=>'Auth\AuthController@register'
    ]
);

Route::get('/users',
    [
        'middleware'=>
            [
                'apiAuthenticate:getUsersRequest'
            ],
        'uses'=>'UsersController@index'
    ]
);

Route::get('/customers',
    [
        'middleware'=>
            [
                'apiAuthenticate:getCustomersRequest'
            ],
        'uses'=>'CustomersController@index'
    ]
);

Route::post('/customer/add',
    [
        'middleware'=>
            [
                'apiAuthenticate:addCustomerRequest',
                'apiValidate:addCustomerRequest'
            ],
        'uses'=>'CustomersController@store'
    ]
);


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
