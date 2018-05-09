<?php

namespace App\Http\Controllers\admin;

use App\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Yajra\Datatables\Datatables;
use Illuminate\Database\Eloquent\Collection;

class CampaignController extends Controller
{
    /*
     * Name: __construct
     * Created By: SIPL
     * Created Date: 9-Nov-2018
     * Purpose: Constructor for checking user auth.
     */

    public function __construct(Request $request)
    {
        $this->middleware('auth');
    }

    /*
     * Name: index
     * Created By: SIPL
     * Created Date: 9-Nov-2018
     * Purpose: for show campaign list
     */

    public function index()
    {
        try {
            $data['title'] = config('constant.TITLE_COMPAIGN_LIST');
            return view('admin.campaign.campaign-list', $data);
        } catch (\Exception $ex) {
            return redirect()->route('campaign.index')->with('error', $ex->getMessage());
        }
    }


    /*
     * Name: campaignData
     * Created By: SIPL
     * Created Date: 09-May-2018
     * Purpose: for ajax call of datatable campaign list
     */

    public function campaignData()
    {
        try {
            /* Check Request is Ajax */
            $column = ['campaigns.id', 'campaigns.campaign_name', 'campaigns.campaign_type', 'campaigns.user_type', 'campaigns.is_active', 'campaigns.is_deleted', 'campaigns.created_at'];
            $campaigns = Campaign::select($column)
                ->where('is_deleted', 0)
                ->orderBy('id', 'DESC');
            return Datatables::of($campaigns)->addColumn('action', function ($user) {
                $action = '<div class="td-action-slide">';
                $action .= '<a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>';
                $action .= '<ul>';
                $action .= '<li><a data-tooltip title="Edit User" href="' . Route("campaign_type.edit", $campaigns->id) . '" class="button edit-button" title="Edit"><i class="fa fa-edit"></i></a></li>';
                $action .= '</ul>';
                $action .= '</div>';
                return $action;
            })->editColumn('user_type', function ($user) {
                if ($campaigns->user_type == 1) {
                    return 'Participant';
                } else {
                    return 'Photographer';
                }
            })->editColumn('created_at', function ($user) {
                return date(config('app.date_format'), strtotime($user->created_at));
            })->make(true);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('campaign.index')->with('error_msg', \Config::get('contants.COMMON_ERROR'));
        } catch (\Exception $ex) {
            return redirect()->route('campaign.index')->with('error_msg', $ex->getMessage());
        }
    }


    /*
     * Name: create
     * Created By: SIPL
     * Created Date: 7-May-2018
     * Purpose: Create a User
     */
    public function create()
    {
        try {
            $data['user'] = [];
            $data['title'] = \config('constants.TITLE_ADD_USER');
            /** Get validation messages */
            $data['validationMessages'] = \App\User::$validationMessages;
            /* Render the user add form */
            return view('admin.user.add-update', $data);
        } catch (\Exception $ex) {
            return redirect()->route('user.index')->with('error_msg', $ex->getMessage());
        }
    }

    /*
     * Name: store
     * Created By: SIPL
     * Created Date: 7-May-2018
     * Purpose: Save a user detail
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            //Server side validations
            $validator = \Validator::make($data, \App\User::validationRulesForUser(), User::$validationMessages);

            if ($validator->fails()) {
                //Redirect user back with input if server side validation fails
                return redirect()->route('user.create')->withErrors($validator)->withInput();
            }
            $user = new \App\User();
            $user->short_code_id = 1; //$request->input('short_code');
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = '';
            $user->phone_number = $request->input('phone_number');
            $user->user_type = $request->input('user_type');
            $user->created_at = date('Y-m-d H:i:s');
            $user->updated_at = date('Y-m-d H:i:s');
            //Save user details
            if ($user->save()) {
                return redirect()->route('user.index')->with('success_msg', config('constants.SUCCESS_RECORD_ADDED_SUCCESSFULLY'));
            } else {
                return redirect()->route('user.index')->with('error_msg', config('app.messages.default_error'));
            }
        } catch (\Exception $ex) {
            return redirect()->route('user.create')->with('error_msg', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /*
     * Name: edit
     * Created By: SIPL
     * Created Date: 07-May-2018
     * Purpose: open the edit user form
     * @param  int  $id
     */
    public function edit($id)
    {
        try {
            $data['title'] = \config('constants.TITLE_UPDATE_USER');
            $data['validationMessages'] = User::$validationMessages;
            //$data['user'] = User::findOrFail($id);
            $column = ['users.id', 'short_codes.code', 'users.name', 'users.email', 'users.phone_number', 'users.is_deleted', 'users.user_type'];
            $data['user'] = User::select($column)
                ->join('short_codes', 'short_codes.id', '=', 'users.short_code_id')
                ->where('is_deleted', 0)
                ->where('is_admin', 0)->first();
            /* Render the user edit form */
            return view('admin.user.add-update', $data);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('user.index')->with('error_msg', \Config::get('contants.COMMON_ERROR'));
        } catch (\Exception $ex) {
            return redirect()->route('user.index')->with('error_msg', $ex->getMessage());
        }
    }

    /*
     * Name: update
     * Created By: SIPL
     * Created Date: 08-May-2018
     * Purpose: update the user data
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $validator = \Validator::make($data, User::validationRulesForUser($id), User::$validationMessages);
            if ($validator->fails()) {
                /* Show error message */
                return redirect()->route('user.edit', $id)->withErrors($validator)->withInput();
            }
            $user = User::findOrFail($id);
            $user->short_code_id = 1; //$request->input('short_code');
            $user->name = $request->input('name');
            $user->phone_number = $request->input('phone_number');
            $user->user_type = $request->input('user_type');
            $user->updated_at = date('Y-m-d H:i:s');
            /* Save user details */
            if ($user->save()) {
                return redirect()->route('user.index')->with('success_msg', \config('constants.SUCCESS_RECORD_UPDATED_SUCCESSFULLY'));
            } else {
                return redirect()->route('user.index')->with('error_msg', config('app.messages.default_error'));
            }
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('user.index')->with('error_msg', \Config::get('contants.COMMON_ERROR'));
        } catch (\Exception $ex) {
            return redirect()->route('user.edit', $id)->with('error_msg', $ex->getMessage());
        }
    }
}
