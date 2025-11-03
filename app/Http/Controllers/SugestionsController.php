<?php

namespace App\Http\Controllers;

use App\Sugestion;
use Illuminate\Http\Request;

class SugestionsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$Sugestions = Sugestion::get();
        return view('sugestions.index', compact('Sugestions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('sugestions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$data = $request->all();
        $request->validate([
            'name' => 'required|unique:sugestions,name',
            'status' => 'required',
        ]);
        //$data['sequence'] = Department::max('sequence') + 1;
        $sugestions = Sugestion::create($data);
        if ($sugestions) {
            $message = "You have successfully created";
            return redirect()->route('sugestions.index', [])
                ->with('flash_success', $message);

        } else {
            $message = "Something wrong!! Please try again";
            return redirect()->route('sugestions.index', [])
                ->with('flash_danger', $message);
        }
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$sugestions = Sugestion::findOrFail($id);
		return view('sugestions.edit', compact('sugestions'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$data = $request->except('_method', '_token');
		$request->validate([
			'name' => 'required|unique:sugestions,name,' . $id,
			'status' => 'required',
		]);

		$sugestions = Sugestion::where('id', $id)->update($data);
		if ($sugestions) {
			$message = "You have successfully updated";
			return redirect()->route('sugestions.index', [])
				->with('flash_success', $message);

		} else {
			$message = "Nothing changed!! Please try again";
			return redirect()->route('sugestions.index', [])
				->with('flash_warning', $message);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$msg = $this->checkUses($id, 'organization_id', 'User');
		if ($msg != 'no') {
			return $msg;
		}
		$sugestions = Sugestion::destroy($id);
		if ($sugestions) {
			$message = "You have successfully deleted";
			return redirect()->route('sugestions.index', [])
				->with('flash_success', $message);
		} else {
			$message = "Something wrong!! Please try again";
			return redirect()->route('sugestions.index', [])
				->with('flash_danger', $message);
		}
	}

	public function download() {
        return (new DepartmentExport())->download('department.xlsx');
    }

	
}

