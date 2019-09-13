<?php

namespace App\Http\Controllers;
use App\Book;
use Auth; //tambahkan ini
use Illuminate\Http\Request;

class BookController extends Controller
{
    //tambahkan ini
	//public function book() {
	//	$data = "Data All Book";
		//return response()->json($data, 200);
//	}

//	public function bookAuth() {
	//	$data = "Welcome " . Auth::user()->name;
	//	return response()->json($data, 200);
	//}
	public function index(){
		$data =Book::all();
		return response ($data);
	}
	public function show($id){
		$data = Book::where('id' ,$id)->get();
		return response ($data);
	}
	public function store (Request $request){
		try{
			$data = new Book();
			$data->title = $request->input('title');
			$data->description = $request->input('description');
			$data->save();
			return response()->json([
				'status'  =>'1',
				'message' =>'Tambah data buku berhasil!'
			]);
		}catch(\Exception $e) {
			return response()->json([
				'status'  =>'0',
				'message' =>'Tambah data buku gagal!'
			]);
		}
	}
	public function update(Request $request, $id){
		try{
			$data = Book::where('id', $id)->first();
			$data->title = $request->input('title');
			$data->description = $request->input('description');
			$data->save();
			return response()->json([
				'status'  =>'1',
				'message' =>'Ubah data buku berhasil!'
			]);
		}catch(\Exception $e){
			return response()->json([
				'status'  =>'0',
				'message' =>'Ubah data buku gagal!'
			]);
		}
	}
	public function destroy($id){
		try{
			$data = Book::where('id', $id)->first();
			$data->delete();
			return response()->json([
				'status'  =>'1',
				'message' =>'Hapus data buku berhasil!'
			]);
		} catch(\Exception $e){
			return response()->json([
				'status'  =>'0',
				'message' =>'Ubah data buku gagal!'
			]);
		}
	}
}
