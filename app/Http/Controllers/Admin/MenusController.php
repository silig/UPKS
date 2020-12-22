<?php

namespace App\Http\Controllers\Admin;

use JsValidator;
use Validator;
use DataTables;
use Illuminate\Http\Request;
use App\Repositories\MenuRepository;
use App\Http\Controllers\Controller;

class MenusController extends Controller {
    
    protected $model;

    public function __construct(
        MenuRepository $menu
    ) {
        $this->model = $menu;
    }
    
    protected function validationRules() {
        $rule['name'] = 'required';
        $rule['order'] = 'required';
        return $rule;
    }

    public function index(Request $request)
    {
        $menus = $this->model->getMenuPermission();

        return view('menus.list', compact('menus'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validation = Validator::make($request->all(), $this->validationRules());
            if ($validation->fails()) {
                return redirect()->back()->withInput()->withErrors($validation->errors());
            }

            try {
                $this->model->create($request);
                return redirect()->action('Admin\MenusController@index')->with('success', 'Data has been saved');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $options = $this->model->getOptions();
        $validator = JsValidator::make($this->validationRules());

        return view('menus.form', compact('options','validator'));
    }

    public function edit($id, Request $request)
    {
        if ($request->isMethod('post')) {

            $validation = Validator::make($request->all(), $this->validationRules());
            if ($validation->fails()) {
                return redirect()->back()->withInput()->withErrors($validation->errors());
            }

            try {
                $this->model->update($id, $request);
                return redirect()->action('Admin\MenusController@index')->with('success', 'Data has been updated');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $options = $this->model->getOptions();
        $validator = JsValidator::make($this->validationRules('edit'));
        $model = $this->model->find($id);

        return view('menus.form', compact('options','model','validator'));
    }

    public function view($id)
    {
        $model = $this->model->find($id);
        return view('menus.view', compact('model'));
    }

    public function delete($id) 
    {
        try {
            $this->model->destroy($id);
            return redirect()->action('Admin\MenusController@index')->with('success', 'Data has been deleted');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}

