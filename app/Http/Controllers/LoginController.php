<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Log;
use App\MemberBarcode;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
use Mail;
class LoginController extends Controller
{


 public function register(Request $request){
  $new=$request->input("email");
    $user=new Users();
       if($user->validate($request->all())){
        $user->fill($request->all()); 
        $user->flag=1;
        $user->role=$request->input('role');
         $pass=$request->input("password");
          $hpass=Hash::make($pass);
           $user->password=$hpass;
            $user->file_path="sample";
         
            $user->save();
           
            
        return json_encode(['status' => 1, 'title' => "Success", 'text' => "User successfully registered."]);

        }
       
      else{
       
         $nam=$request->input("fullname",null);
         if($nam==""){
          return json_encode(['status'=>0,'title'=>"error",'text'=>"Fullname is Required."]);
            // return json_encode(['status'=>0,'title'=>"error",'text'=>" * Fullname is Required"]);
          }
          $email=$request->input("email",null);
          if($email==""){
             return json_encode(['status'=>0,'title'=>"error",'text'=>" * Email is Required"]);
           }
            $a=DB::table("users")->where('email','=',$email)->count();
     if($a==1){
       return json_encode(['status'=>0,'title'=>"error",'text'=>"* User is already registered with ".$email]);

     }
           $pass=$request->input("password",null);
           if($pass==""){
              return json_encode(['status'=>0,'title'=>"error",'text'=>" * Password is Required"]);
            }
            if(strlen($pass)<6){
       return json_encode(['status'=>0,'title'=>"error",'text'=>"* Password should be minimum of 6 character."]);

     }
            $pass=$request->input("password",null);
            $cpass=$request->input("password_confirmation",null);
            if($pass!=$cpass){
            return json_encode(['status'=>0,'title'=>"error",'text'=>" * Password do not matched"]);
            }
            $rol=$request->input("role",null);
            if($rol==""){
            return json_encode(['status'=>0,'title'=>"error",'text'=>" * Role Field is Required"]);
            }


  }
    //  $a=json_encode($user->errors);
    //  return redirect('/login.register')->with("msginfo"," * Email Field is required.");

       // }
          // return json_encode(['status'=>0,'title'=>"error",'text'=>"Role Field is Required"]);

  }


  public function login(Request $request){
   // dd($request->all());
     $user=new Users();
    $username=$request->input("username");
    $password=$request->input("password");
 // dd($request->format($request->input("email")));
$a=DB::table("users")->where('username','=',$username)->first();
if (empty($a)){
return redirect()->back()->with("msgerror","User doesnot exist.");

}
// dd($a);
    if(Hash::check($password,$a->password)){

      if($a->role=="admin"){
      // session_start();
       Session::put('id',$a->id);
       Session::put('username',$a->username);
        Session::put('role',$a->role);
       Session::put('authStatus',2);
       
         return view('main');

     }
}else{

        return redirect()->back()->with("msgerror","Username and Password donot match.");
  // return "User Not Found";
}
}
public function loginApi(Request $request){
    
     $user=new Users();
    $email=$request->input("email");
    $password=$request->input("password");
 // dd($request->format($request->input("email")));
$a=DB::table("users")->where('email','=',$email)->first();
if (empty($a)){
    return ['status'=>0,'msg'=>"User doesnot exist"];
}
    if(Hash::check($password,$a->password)){

      if($a->role=="branch-admin"){
      // session_start();
       Session::put('id',$a->id);
       Session::put('fullname',$a->fullname);
       Session::put('email',$a->email);
        Session::put('role',$a->role);
       Session::put('authStatus',2);
         //return view('main');
         return ['status'=>1,'msg'=>"success",'name'=>$a->fullname];

     }else if($a->role=="user" && $a->flag==1){
       Session::put('id',$a->id);
       Session::put('fullname',$a->fullname);
       Session::put('email',$a->email);
       Session::put('role',$a->role);
         //return redirect('user');
         return ['status'=>1,'msg'=>"success",'name'=>$a->fullname];
}else if($a->role=="user" && $a->flag==0){
    return ['status'=>0,'msg'=>"User not Verified OR Temporarily Disabled"];
 }else if($a->role=="super-admin"){
      // session_start();
       Session::put('id',$a->id);
       Session::put('fullname',$a->fullname);
       Session::put('email',$a->email);
        Session::put('role',$a->role);
       Session::put('authStatus',1);
         return ['status'=>1,'msg'=>"success",'name'=>$a->fullname];


}
}else{

        return ['status'=>0,'msg'=>"Username or Password not matched"];
  // return "User Not Found";
}
}
public function changePassword(Request $request){
//dd($request->all());
$id=Session::get('id');

$user=Users::find($id);
$pass=$user->password;
$em=$user->email;
$oldPass=($request->input("oldpassword"));
  if(Hash::check($oldPass,$pass)){
 $user->password=Hash::make($request->input("newpassword"));
  $user->save();
   $logs = new Log();
       $logs->user_id=$id;
       $logs->action="Password Changed";
       $logs->detail="Password changed by  "  .$em;
       $logs->save();
return json_encode(['status'=>1,'title'=>"success",'text'=>"Password Sucessfully Changed."]);
}else{
  

 return json_encode(['status'=>0,'title'=>"error",'text'=>"Password Not Matched!!"]);
     }
}



public function verification( Request $request){
$token=$request->input('token');
$id=DB::table('users')->where('token','=',$token)->value('id');
//dd($id);
if($id!=null){
  $user=Users::find($id);
  $user->flag=1;
  $user->save();
  return redirect('/')->with("verification","You Can Start Your Session");
}else{
  return redirect('/')->with("verification","Not verified.");
}


}

public function forgetPassword(Request $request){
$email=$request->input("email");
$id=DB::table('users')->where('email','=',$email)->value('id');
if($id!=null){
  $user=Users::find($id);
  $name=$user->fullname;
  $randomValue=rand(1,100000);
  $hash=Hash::make($randomValue);
 $url=url('/login/passverify?token='.$hash);
  Mail::send('email.forget',['url'=>$url,'name'=>$name],function($m) use ($email){
$m->to($email);
$m->subject('User Activation.');
});
$user->forget_pass=$hash;
  $user->save();


  return redirect('/')->with("password","Check your email to login.");
}else{
  return redirect()->back()->with("error","Username not exist.");
}


}


public function passwordVerification( Request $request){
$token=$request->input('token');
$id=DB::table('users')->where('forget_pass','=',$token)->value('id');
if($id!=null){
  $a=Users::find($id);
  $email=$a->email;
  return view('login.setpassword')->with("email",$email);


 }else{
  return redirect('/')->with("verification","Not verified.");
}


}

public function changeForgetPassword(Request $request){
//dd($request->all());
$email=$request->input('email');
$pass=$request->input('password');
$cPass=$request->input('c_password');
if($pass==$cPass){
$id=DB::table('users')->where('email','=',$email)->value('id');
$user=Users::find($id);
 $user->password=Hash::make($pass);
  $user->save();
return redirect("/")->with('passwordChanged',"Password Sucessfully Changed");
}else{
  

 return redirect()->back()->with('notmatch',"Password Not Matched");
     }
}


public function logout(){
  
  Session::flush();
    return redirect("/");
  }



}

