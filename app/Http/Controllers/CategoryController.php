<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller {
	private $htmlSelect;
	public function __construct() {
		$this->htmlSelect = '';
	}

	public function index() {
		return view('category.index');
	}

	public function create() {
		$data = Category::all();
		/*foreach ($data as $value) {
			            if ($value['parent_id'] == 0) {
			                echo "<option>".$value['name']."</option>";
		*/
		//return view('category.add');
		$htmlOption = $this->categoryRecusive(0);
		return view('category.add', compact('htmlOption'));
	}
	function categoryRecusive($id, $text = '') {

		$data = Category::all();
		foreach ($data as $value) {
			if ($value['parent_id'] == $id) {
				$this->htmlSelect .= "<option>" . $text . $value['name'] . "</option>";
				$this->categoryRecusive($value['id'], $text . '-');
			}
		}
		return $this->htmlSelect;
	}
}
