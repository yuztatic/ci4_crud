<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\StudentsModel;

class StudentsController extends BaseController
{
    public function index()
    {
       $displayStudents=new StudentsModel();
       $data['students']=$displayStudents->findAll();

        return view('students/list',$data);
    }

    public function createStudent()
    {
        $data['studentNumber']='20000_'.uniqid();
        return view('students/add',$data);
    } 

     public function storeStudent(){
        $insertStudents=new StudentsModel();

       if($img=$this->request->getFile('student_profile')){ 
            if($img->isValid() && !$img->hasMoved()){

              $ImageName=$img->getRandomName();

              $img->move('uploads/',$ImageName);
            }



        }   

      $data=array(
          'student_name' => $this->request->getPost('student_name'),
          'student_id' => $this->request->getPost('student_number'),
          'student_section' => $this->request->getPost('student_section'),
          'student_course' => $this->request->getPost('student_course'),
          'student_batch' => $this->request->getPost('student_batch'),
          'student_grade_level' => $this->request->getPost('student_grade_level'),
          'student_profile' => $ImageName,
      );


      $insertStudents->insert($data);

      return redirect()->to('/students')->with('success', 'Student added successfully');
     }

     public function editStudent()
     {
         return view('students/edit');
     }

     public function updateStudent()
     {
        
     }

     public function deleteStudent()
     {
        
     } 
}
