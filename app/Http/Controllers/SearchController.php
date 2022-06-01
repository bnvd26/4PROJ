<?php
namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchStudents(Request $request)
    {
        if ($request->ajax()) {
            $output="";
            $students= DB::table('students')
                        ->leftJoin('users', 'students.user_id', '=', 'users.id')
                        ->orWhere('users.first_name', 'like', '%' . $request->search . '%')
                        ->orWhere('users.last_name', 'like', '%' . $request->search . '%')
                        ->get();

            if ($students) {
                foreach ($students as $student) {
                    $campus = Campus::find($student->campus_id);
                    $promotion = Promotion::find($student->promotion_id);

                    $output.='<tr>'.
                    '<td>'.$campus->location.'</td>'.
                    '<td>'.$promotion->year.'</td>'.
                    '<td>'.$student->last_name.'</td>'.
                    '<td>'.$student->first_name.'</td>'.
                    '</tr>';
                }
                return Response($output);
            }
        }
    }

    public function searchSubjects(Request $request)
    {
        if ($request->ajax()) {
            $output="";
            $subjects= DB::table('subjects')
                        ->where('name', 'like', '%' . $request->search . '%')
                        ->get();

            if ($subjects) {
                foreach ($subjects as $subject) {

                    $output.=

                    '<div class="card" style="width: 18rem;margin: 10px">
                    <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
                    <div class="card-body">
              <h5 class="card-title">' . $subject->name . '</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card content.</p>

            </div>
          </div>'
          ;

                }
                return Response($output);
            }
        }
    }
}
