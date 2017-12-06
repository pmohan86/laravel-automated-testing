<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Validator;
use App\Client;

class ClientController extends Controller
{
    private $clientListFileName = 'ClientList.csv';
    private $clientListColumns = [
        'name',
        'gender',
        'dob',
        'phone',
        'email',
        'address',
        'nationality',
        'education',
        'preferred_contact_mode',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $formInput = $request->all();

        Log::info('Store Page. Data input is:', $formInput);

        $validator = $this->validateInput($formInput);
        if ($validator->fails()) {
            return redirect(route('clients.create'))
                        ->withErrors($validator)
                        ->withInput();
        }

        $dataToBeAdded = array_only($formInput, $this->clientListColumns);

        Client::create($dataToBeAdded);
            
        $request->session()->flash('success', 'User creation successful!');

        return redirect(route('clients.create'))
                    ->withInput();
    }

    private function validateInput($formInput)
    {
        $validator = Validator::make($formInput, [
            'name'   => 'required|string',
            'gender' => [
                'required',
                Rule::in(['female', 'male', 'others']),
            ],
            'dob'                    => 'required',
            'phone'                  => 'required|digits_between:10,15',
            'email'                  => 'required|email',
            'address'                => 'required',
            'nationality'            => 'required|alpha',
            'education'              => 'required|alpha',
            'preferred_contact_mode' => [
                'required',
                Rule::in(['email', 'phone', 'none']),
            ],
        ]);

        return $validator;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
