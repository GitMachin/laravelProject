<?php


namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\UsersConnexion;
use App\User;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    //

    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getList()
    {
        return view('users.list'); 
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function dtAjax()
    {
        $query = User::leftJoin( 'users_connexions AS connexions', 'users.id', '=','connexions.user_id' )
                        ->select('users.*', 'connexions.date_connexion AS date_co');
        return Datatables::of( $query )->make(true);
    }
}
