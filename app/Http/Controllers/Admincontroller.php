<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Hash;

use Session;

use App\Models\User;

use App\Models\Statement;

use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Support\Facades\Auth;

class Admincontroller extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
    public function user(Request  $request)
    {
        $request->validate([
            'name'=>'required',
            'password'=>'required'
        ]);
        $credentials = $request->only('name', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return view('user')->with('user', $user);
        }else {
            return back()->withErrors(['name' => 'Invalid login credentials']);
        }
    }


    
    public function home()
    {
        $user = Auth::user();
        return view('home')->with('user', $user);
    }
    public function deposit()
    {
        $user = Auth::user();
        return view('deposit')->with('user', $user);
    }
    public function withdraw()
    {
        return view('withdraw');
    }
    public function transfer()
    {
        return view('transfer');
    }
    public function statement()
    {
        $user = Auth::user();
        $user_email=Auth::user()->email;
        $statement=Statement::where('email',$user_email)->paginate(4);
        return view('statement',compact('statement'));
        

        return view('statement');
    }
    public function submitregistration(Request $request)
    {
        $name=$request->input('name');
        $email=$request->input('email');
        $password=$request->input('password');

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);
        
        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);       
        $user->save();
        return view('login');
    }
    public function submitdeposit(Request $request)
    {
        $user = Auth::user();
        $id=Auth::id();
        $email=Auth::user()->email;
        $balance_amount=Auth::user()->balance;
        $deposit_money=$request->amount;
        $totalamount=$balance_amount+$deposit_money;
        $user=User::find($id);
        $user->balance=$totalamount;
        $user->save();
        $statement=new Statement;
        $statement->email=$email;
        $statement->amount=$deposit_money;
        $statement->type='Credit';
        $statement->details='Deposit';
        $statement->balance=$totalamount;
        $statement->save();
        return redirect()->back();
    }
    public function submitwithdrawal(Request $request)
    {
        $user = Auth::user();
        $id=Auth::id();
        $email=Auth::user()->email;
        $balance_amount=Auth::user()->balance;
        $withdrawal_money=$request->amount;
        $totalamount=$balance_amount-$withdrawal_money;
        $user=User::find($id);
        $user->balance=$totalamount;
        $user->save();
        $statement=new Statement;
        $statement->email=$email;
        $statement->amount=$withdrawal_money;
        $statement->type='Debit';
        $statement->details='Withdrawal';
        $statement->balance=$totalamount;
        $statement->save();
        return redirect()->back();
    }
}
