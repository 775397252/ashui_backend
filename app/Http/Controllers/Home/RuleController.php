<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller as LaravelController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RuleController extends LaravelController{
    public function index() {
        return view('home.rule.index');
    }
}
?>