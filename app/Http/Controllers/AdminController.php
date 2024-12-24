<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Hiển thị form đăng nhập
    public function login()
    {
        return view('admin.news.login');
    }

    // Xử lý đăng nhập
    public function authenticate(Request $request)
    {
        // Lấy thông tin đăng nhập từ request
        $credentials = $request->only('email', 'password');

        // Kiểm tra thông tin xác thực
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công, chuyển đến trang danh sách tin tức
            return redirect()->route('admin.news.index');
        }

        // Nếu thông tin đăng nhập sai, quay lại trang đăng nhập và thông báo lỗi
        return back()->withErrors(['login' => 'Invalid credentials.']);
    }

    // Đăng xuất
    public function logout()
    {
        Auth::logout(); // Đăng xuất người dùng
        return redirect()->route('admin.login'); // Chuyển về trang đăng nhập
    }

    // Hiển thị danh sách tin tức (admin)
    public function index()
    {
        $news = News::paginate(10); // Lấy tin tức và phân trang
        return view('admin.news.index', compact('news'));
    }

    // Hiển thị form tạo tin tức mới
    public function create()
    {
        return view('admin.news.create');
    }

    // Lưu tin tức mới vào database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        // Tạo tin tức mới
        News::create($request->all());
        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
    }

    // Hiển thị form chỉnh sửa tin tức
    public function edit($id)
    {
        $news = News::findOrFail($id); // Lấy tin tức theo ID
        return view('admin.news.edit', compact('news'));
    }

    // Cập nhật tin tức
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $news = News::findOrFail($id); // Tìm tin tức theo ID
        $news->update($request->all()); // Cập nhật tin tức

        return redirect()->route('admin.news.index')->with('success', 'News updated successfully.');
    }

    // Xóa tin tức
    public function destroy($id)
    {
        $news = News::findOrFail($id); // Lấy tin tức theo ID
        $news->delete(); // Xóa tin tức

        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully.');
    }
}
