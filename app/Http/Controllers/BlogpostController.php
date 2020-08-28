<?php

namespace Bulkly\Http\Controllers;

use Illuminate\Http\Request;


use Bulkly\User;
use Bulkly\RssAutoPost;
use Bulkly\SocialPostGroups;
use Bulkly\SocialPosts;
use Bulkly\SocialAccounts;
use Bulkly\BufferPosting;

class BlogpostController extends Controller
{
    public function bufferPost(){

    	//return only 100 data 

    	/*$data = SocialPostGroups::all();
    	foreach ($data as $key => $value) {
    		dd($value->posts[0]->group_id);
    	}*/
    	

    	$buffer_data = BufferPosting::limit(100)->paginate(10);
    	return view('pages.buffer-post', compact('buffer_data'));

    }

    public function bufferPostSearch(Request $request){
    	
    	//return response()->json($request->all());

    	$post_search = $request->search_name;
    	$search_date = $request->search_date;
    	$search_group = intval($request->search_group);

    	$timestamp = strtotime($search_date);
 
		$new_date = date("Y-m-d", $timestamp);
  

    	//2019-01-03

    	$buffer_data = BufferPosting::where('post_text', 'like', '%' . $post_search . '%')
			   ->orwhere('created_at', 'like', '%' . $new_date . '%')
			   ->orwhere('created_at', $search_date)
			   ->orwhere("group_id", $search_group)
			   ->orderBy("id", 'desc')
			   ->paginate(10)
			   ->withPath('?search=' . $post_search.'&date='.$search_date.'&group_id='.$search_group);

			   //dd($buffer_data);
		return view('pages.buffer-post', compact('buffer_data'));

    }


}
