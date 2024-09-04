<?php

namespace App\Http\Controllers;

use App\Models\Judgement;
use Illuminate\Http\Request;

class TeamJudgementController extends Controller
{
    // 顯示隊伍難度評分紀錄表頁面
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $query = Judgement::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $judgements = $query->orderBy('updated_at', 'desc')->paginate(10);

        return view('teamJudgement', compact('judgements'));
    }

    // 處理表單提交，進行勾選項目的操作
    public function store(Request $request)
    {
        $selected = $request->input('selected', []);

        // 在這裡處理選擇的項目，例如儲存、刪除等操作
        // 可以根據需要進行相應的操作

        return redirect()->route('teamJudgement')->with('status', '選擇已成功處理！');
    }
}
