<?php 

namespace App\Http\Controllers\Api;


//pembuatan helper
/**
 * 
 */
class ResponseFormatter
{
	protected static $response = [
		'meta' => [
			'code' => 200,
			'status' => 'success',
			'massage' => null
		],
		'data' => null
	];

	//biar bisa mgisi database secara langsung
	public static function success($data = null, $massage = null)
	{	
		// menyimpan massage di function success (di bawah ini) untuk di kirim ke protected static di atas
		//kalau menngunakan static (.. static) menggunakan self
		self::$response['meta']['massage'] = $massage;
		self::$response['data'] = $data;
	
		//di dalam larafel sudah ada json
		return response()->json(self::$response, self::$response['meta']['code']);
	}

	//jika data eror
	//akan di arahkan ke 404(default)
	public static function error($data = null, $massage = null, $code = 404)
	{	
		self::$response['meta']['status'] = 'error';
		self::$response['meta']['code'] = $code;
		self::$response['meta']['massage'] = $massage;
		self::$response['data'] = $data;
	
		//di dalam larafel sudah ada json
		return response()->json(self::$response, self::$response['meta']['code']);
	}

}