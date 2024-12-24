<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // Hiển thị danh sách các bài báo
    public function index()
    {
        $news = News::latest()->paginate(10); // Phân trang 10 bài viết mỗi trang
        return view('news.index', compact('news'));
    }

    // Hiển thị chi tiết một bài báo
    public function show($id)
    {
        $newsItem = News::findOrFail($id);
        return view('news.show', compact('newsItem'));
    }

    // Xử lý tìm kiếm
    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input (mặc định là rỗng)
        $query = $request->input('q', '');

        // Khởi tạo query
        $news = News::query();

        // Nếu có từ khóa tìm kiếm, áp dụng điều kiện lọc
        if (!empty($query)) {
            $news = $news->where('title', 'like', "%$query%")
                ->orWhere('description', 'like', "%$query%");
        }

        // Lấy danh sách bài viết tìm được (phân trang 10 bài mỗi trang)
        $news = $news->latest()->paginate(10);

        // Trả về kết quả tìm kiếm cùng từ khóa tìm kiếm (để giữ lại trong form)
        return view('news.index', compact('news', 'query'));
    }
}
