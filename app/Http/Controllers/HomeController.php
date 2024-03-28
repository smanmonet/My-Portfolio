<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Member;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;




class HomeController extends Controller
{
    
    public function HomeMember(Request $request)
    {
       
        $member = QueryBuilder::for(Member::class)
            ->leftJoin('rank', 'member.rank', '=', 'rank.rankID')
            ->get();

        $value = session()->get("id");
        //$UserID = 2;
        $role = QueryBuilder::for(Role::class)
            ->leftJoin('roletype','role.roletypeID','=','roletype.roletypeID')
            ->where('role.empID',$value)
            ->get();


        
        //dd($value);
        

        return view('HomeHR',compact('member','role'));
    }

     public function search(Request $request){
        $value = session()->get("id");
        //dd($value);
        $UserID = $value;
        $role = QueryBuilder::for(Role::class)
            ->leftJoin('roletype','role.roletypeID','=','roletype.roletypeID')
            ->where('role.empID',$UserID)
            ->get();
        
        $query = $request->search;
        $member = QueryBuilder::for(Member::class)
            ->leftJoin('rank', 'member.rank', '=', 'rank.rankID')
            ->where('memberID', 'like', '%'.$query.'%')
                ->orWhere('Name', 'like', '%'.$query.'%')
                ->orWhere('Surname', 'like', '%'.$query.'%')
                ->orWhere('Address', 'like', '%'.$query.'%')
                ->orWhere('rank.rankName', 'like', '%'.$query.'%')
                ->orderBy('memberID', 'ASC')
                ->get();
        
        return view('HomeHR',compact('member','role'));
        
    }

    public function getMembers()
    {
        //$sql = "from member LEFT JOIN rank on member.rank = rank.rankID;";
       // $member = Member::all("select * from member LEFT JOIN rank on member.rank = rank.rankID");

        $member = Member::table('member')
            ->leftJoin('rank', 'member.rank', '=', 'rank.rankID')
            ->get();
        //$member = Member::table('member')->select('name', 'email as user_email')->get();
        //$member = Member::query('select * from member LEFT JOIN rank on member.rank = rank.rankID');
        //$member = Member::query("select * from member LEFT JOIN rank on member.rank = rank.rankID");
        //$member = Member::all();
        return response()->json([
            "results" => $member
        ],200);
    }
    public function index(){
        return view('addmember');
    }
    public function store(Request $request){
        $str = "";
        $upline = Member::where('memberID', $request->uplineID)->first();
        if($request->name != null){
              $prefix = ["create downline : ".$request->name." ".$request->surname."  ".
              "   upline: ".$upline->Name." ".$upline->Surname];
              $str = implode('  ',$prefix);
        }
      
      

        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'address' => 'required|string',
            'userID' => 'required|string|',
            'password' => 'required|string',
            'uplineID' => 'required|string'

        ]);
       Member::insert([
        'memberID' => null,
        'Name' => $request->name,
        'Surname' => $request->surname,
        'Address' => $request->address,
        'rank' => "1",
        'loginID' => $request->userID,
        'loginPass' => $request->password,
        'PV' =>  "0",
        'upline' => $request->uplineID
    ]);
    //->with('message','has create')
    //->with('name',$request->name)->with('sur',$request->name)
        return redirect('HomeHR/addmember')->with('message',$str);
    }
    public function update(int $id){


        $member = Member::find($id);
        return view('updateMember',compact('member'));
    }
    public function edit(Request $request,int $id){


        $upline = Member::where('memberID', $id)->first();
        $prefix = ["update member :".$upline->Name." ".$upline->Surname ];
        $str = implode('  ',$prefix);



        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'address' => 'required|string',
            //'rank'=> 'required|',
            'userID' => 'required|string|',
            'password' => 'required|string',
            //'PV'=> 'required|',
            

        ]);
       Member::find($id)->update([
        'Name' => $request->name,
        'Surname' => $request->surname,
        'Address' => $request->address,
        'loginID' => $request->userID,
        'loginPass' => $request->password,
        
    ]);
        return redirect()->back()->with('message',$str);
    }
    public $delete_id;
    protected $listeners = ['confirmation'=>'deleteMember'];
    public function deleteMember()
    {
        $member = Member::where('memberID',$this->delete_id)->first();
        $member->delete();

        $this->dispatchBrowserEvent('memberDeleted');
    }
    public function confirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('delete');
    }

    public function delete($id){
        $serv_cate = Member::find($id);
        $serv_cate->delete();
        return response()->json(['status'=>'Member Deleted Success']);

    }
    public function chaengeRole(Request $UserID){
        $UserID = 2;
       $role = QueryBuilder::for(Role::class)
       ->leftJoin('roletype','role.roleID','=','roletype.roletypeID')
       ->where('role.empID','=',$UserID)
       ->get();

       return view('HomeHR',['role'=>$role]);
    }



}
