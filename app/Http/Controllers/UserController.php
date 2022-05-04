<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\DestroyRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Models\Userimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        /*        $search = $request->get('q');
                $data = User::query()
                    ->where('last_name', 'like', '%'.$search.'%')
                    ->orWhere('first_name', 'like', '%'.$search.'%')
                    ->orWhere('user_name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->paginate(5);
                $data =
                $data->appends(['q' => $search]);
                //$data = User::all();
                return view('user.index', [
                    'data' => $data,
                ]);*/
        return view('user.index');
    }

    public function api()
    {
        return DataTables::of(User::query())
            ->editColumn('created_at', function ($object) {
                return $object->year_created_at;
            })
            /*  ->editColumn('edit', function ($object) {
                  $link =route('user.edit',$object);
                  return  "<a class='btn btn-outline-primary' href='$link'>Edit user</a>";
              })*/

            /*->addColumn('image', function ($img) {
                $url= asset('storage/'.$img->image);
                return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';
            })->addColumn('action', function ($img) {
                  return '<a href="/admin/artist/'.$img->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
      <a href="user/images/"'.$img->id .'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
              })->rawColumns(['avatar', 'action'])*/


            ->addColumn('edit', function ($object) {
                return route('user.edit', $object);
            })
            ->addColumn('destroy', function ($object) {
                return route('user.destroy', $object);
            })
            ->make(true);
    }

    public function create()
    {
        return view('user.create');
    }


    public function store(StoreRequest $request)
    {

        /* $user = new User();
         $user->first_name = $request->first_name;
         $user->last_name = $request->last_name;
         $user->user_name = $request->user_name;
         $user->password = bcrypt($request->password);
         $user->email = $request->email;
         $user->save();*/

//        $object = new User();
//        $object->fill($request->except('_token'));
//        $object->save();
        /* if($request->file('avatar')){
             $file= $request->file('avatar');
             $filename= date('YmdHi').$file->getClientOriginalName();
             $file-> move(public_path('public/Image'), $filename);
             $data['avatar']= $filename;
         }
         $data->save();*/
        $data = new User();


        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time().".".$fileExtension;
            $file->move( 'img/avaUser', $fileName);
        }
        $data = [
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'user_name'=>$request->user_name,
            'email'=>$request->email,
            'password'=>$request->password,
            'avatar'=>$fileName
            ];
        User::create($data);

        return redirect()->route('user.index');
    }


    public function show(User $user)
    {
    }


    public function edit(User $user)
    {
        return view('user.edit', [
            'each' => $user,
        ]);
    }


    public function update(UpdateRequest $request, User $user)
    {
        /*        User::where('id',$user->id)->update(
                    $request->except([
                        '_token',
                        '_method',
                    ])
                );*/
        $user->fill($request->validated());
        $user->save();
        return redirect()->route('user.index');
    }

    public function destroy(DestroyRequest $request, $user)
    {
        User::destroy($user);
        return redirect()->route('user.index');
    }

    //Store image
   /* public function storeImage(Request $request)
    {
        $data = new Userimage();

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/img/avaUser'), $filename);
            $data['image'] = $filename;
        }
        $data->save();
        return redirect()->route('userimages.view');

    }*/

    //View image
    public function viewImage()
    {
        return view('user.images.view_image');
    }
}
