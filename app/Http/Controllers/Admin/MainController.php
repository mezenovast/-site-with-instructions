<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Instruction;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){

        $instruction_count = Instruction::where('status', 1)->count();
        $user_count = User::all()->count();
        $complaint_count = Complaint::all()->count();
        $inquiry_count = Instruction::where('status', 0)->count();

        return view('admin.home.index', compact(['instruction_count','user_count','complaint_count', 'inquiry_count']));
    }
}
