<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    public function list()
    {
    	$slides = Slide::all();
    	return view('admin.slide.list', ['slides' => $slides]);
    }

    public function get_add()
    {
    	return view('admin.slide.add');
    }

    public function add(Request $request)
    {
    	$slide = new Slide;
    	$slide->name = $request->name;
    	$slide->content = $request->content;
    	$slide->link = $request->link;
    	if ($request->hasFile('img')) {
    		$file = $request->file('img');
    		$name = $file->getClientOriginalName();
    		$image = str_random(4) . '_' . $name;
    		while (file_exists('upload/slide/'.$image)) {
    			$image = str_random(4) . '_' . $name;
    		}
    		$file->move('upload/slide', $image);
    		$slide->img = $image;
    	} else {
    		$slide->img = '';
    	}
    	$slide->save();
    	return redirect('admin/slide/them')->with('note', 'Them slide moi thanh cong!');
    }

    public function get_edit($id)
    {
    	$slide = Slide::find($id);
    	return view('admin.slide.edit', ['slide' => $slide]);
    }

    public function edit($id)
    {
    	$slide = Slide::find($id);
    	$slide->name = $request->name;
    	$slide->content = $request->content;
    	$slide->link = $request->link;
    	if ($request->hasFile('img')) {
    		$file = $request->file('img');
    		$name = $file->getClientOriginalName();
    		$image = str_random(4) . '_' . $name;
    		while (file_exists('upload/slide/'.$image)) {
    			$image = str_random(4) . '_' . $name;
    		}
    		$file->move('upload/slide', $image);
    		if (file_exists("upload/slide/".$slide->img)) {
                unlink("upload/slide/".$slide->img);
            }
    		$slide->img = $image;
    	} else {
    		$slide->img = '';
    	}
    	$slide->save();
    	return redirect('admin/slide/them')->with('note', 'Them slide moi thanh cong!');
    }
}
