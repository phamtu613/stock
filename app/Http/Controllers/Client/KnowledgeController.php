<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryKnowledge;
use App\Models\Knowledge;
use App\Models\BannerKnowledge;

class KnowledgeController extends Controller
{
	public function index($id = 13)
	{
		$idCategoryKnowledge = $id;

		// Banner
		$banner = BannerKnowledge::first();

		$nameCate = CategoryKnowledge::find($id)->name;
		// dd($nameCate);

		// list cate knowledge
		$cateKnowledges = CategoryKnowledge::orderBy('position', 'asc')->get();

		// list knowledge
		$knowledges = Knowledge::where('cate_knowledge_id', '=', $id)
			->select('id', 'title', 'slug', 'description', 'thumbnail', 'created_at', 'num_view')
			->orderBy('id', 'desc')
			->paginate(8);


		return view('client.pages.knowledge', compact('cateKnowledges', 'knowledges', 'idCategoryKnowledge', 'banner', 'nameCate'));
	}
}
