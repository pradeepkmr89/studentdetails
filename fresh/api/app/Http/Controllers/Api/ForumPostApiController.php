<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfileMaster;
use App\Models\UserEducation;
use App\Models\User;

use App\Models\ForumCategory;
use App\Models\ForumPost;
use App\Models\ForumLikeMaster;
use App\Models\ForumCommentMaster;
use App\Models\ForumCommentReply;
use App\Models\ForumPostSave;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;

class ForumPostApiController extends Controller
{
    public function form_post()
    {
        $data = ForumPost::with([
            "likes",
            "comment",
            "category",
            "comment.commentreply",
        ])
            ->withCount(["likes", "comment"])
            ->get();

        $response = [
            "success" => true,
            "message" => "success",
            "data" => $data,
        ];
        return response()->json($response, 200);
    }

    public function form_post_like(Request $request)
    {
        $data = [];
        $validator = Validator::make($request->all(), [
            "forum_post_id" => "integer",
        ]);

        if ($validator->fails()) {
            $response = [
                "success" => false,
                "message" => $validator->messages(),
            ];
            return response()->json($response, 401);
        }

        $request["user_id"] = Auth::user()->id;
        $data = ForumLikeMaster::create($request->all());
        if ($data) {
            $response = [
                "success" => true,
                "message" => "success",
                "data" => $data,
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                "success" => false,
                "message" => "something went wrong",
            ];
            return response()->json($response);
        }
    }

    public function form_post_comment(Request $request)
    {
        $data = [];
        $validator = Validator::make($request->all(), [
            "forum_post_id" => "integer",
            "comment" => "string",
            "reply_to_user" => "integer",
        ]);

        if ($validator->fails()) {
            $response = [
                "success" => false,
                "message" => $validator->messages(),
            ];
            return response()->json($response, 401);
        }

        $request["user_id"] = Auth::user()->id;
        $data = ForumCommentMaster::create($request->all());
        if ($data) {
            $response = [
                "success" => true,
                "message" => "success",
                "data" => $data,
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                "success" => false,
                "message" => "something went wrong",
            ];
            return response()->json($response);
        }
    }
    public function form_post_comment_reply(Request $request)
    {
        $data = [];
        $validator = Validator::make($request->all(), [
            "forum_comment_master_id" => "integer",
            "comment" => "string",
        ]);

        if ($validator->fails()) {
            $response = [
                "success" => false,
                "message" => $validator->messages(),
            ];
            return response()->json($response, 401);
        }

        $request["user_id"] = Auth::user()->id;
        $data = ForumCommentReply::create($request->all());
        if ($data) {
            $response = [
                "success" => true,
                "message" => "success",
                "data" => $data,
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                "success" => false,
                "message" => "something went wrong",
            ];
            return response()->json($response);
        }
    }

    public function form_post_save(Request $request)
    {
        $data = [];
        $validator = Validator::make($request->all(), [
            "form_post_id" => "integer",
            "user_id" => "integer",
        ]);

        if ($validator->fails()) {
            $response = [
                "success" => false,
                "message" => $validator->messages(),
            ];
            return response()->json($response, 401);
        }

        $userid = Auth::user()->id;
        $request["user_id"] = $userid;
        $data = ForumPostSave::create($request->all());
        if ($data) {
            $response = [
                "success" => true,
                "message" => "Added successfully",
                "data" => $data,
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                "success" => false,
                "message" => "something went wrong",
            ];
            return response()->json($response);
        }
    }
    
    public function get_saved_form_post(Request $request){
        
        $userid = Auth::user()->id;
        $data = ForumPostSave::where('user_id', $userid)->with('forumpost')->get();
        if ($data) {
            $response = [
                "success" => true,
                "message" => "successfully",
                "data" => $data,
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                "success" => false,
                "message" => "something went wrong",
            ];
            return response()->json($response);
        }
        
    }
}
